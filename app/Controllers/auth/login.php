<?php
require 'app/Database/connect.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $errors = [];

    if (empty($errors)) {
        try {
            $sql = "SELECT * FROM user_registration WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();

                // Verify password
                if (password_verify($password, $user['password'])) {
                    // Clear any previous errors
                    if (isset($_SESSION['errors'])) {
                        unset($_SESSION['errors']);
                    }

                    // Set user session
                    $_SESSION['user'] = [
                        'user_id' => $user['user_id'],
                        'username' => $user['username'],
                        'first_name' => $user['first_name'],
                        'last_name' => $user['last_name'],
                        'role' => $user['role']
                    ];

                    // Prevent caching of login pages
                    header("Cache-Control: no-cache, no-store, must-revalidate");
                    header("Pragma: no-cache");
                    header("Expires: 0");

                    // Redirect based on role
                    $redirect = $user['role'] === 'admin' ? '/admin/dashboard' : '/user/medical-history';
                    header('Location: ' . BASE_URL . $redirect);
                    exit();
                } else {
                    $errors['login'] = "Invalid username or password.";
                }
            } else {
                $errors['login'] = "User not found.";
            }
        } catch (Exception $e) {
            $errors['database'] = "Database error: " . $e->getMessage();
            error_log("Login Exception: " . $e->getMessage());
        }
    }

    // If there are errors, store them in session and redirect
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: ' . BASE_URL . '/');
        exit();
    }
}

$title = 'Login';
$icon = 'public/images/login.png';
$style = 'public/styles/style.css';

require 'app/Views/log/index.view.php';

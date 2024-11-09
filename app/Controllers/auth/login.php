<?php

// session_start();
require 'app/Database/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $errors = [];


    // Kabahol nga matabo naka required to, ano ko mango? padungag dungag lang linya ka code.
    // if (empty($username) || empty($password)) {
    //     $errors['login'] = "Please enter username and password."; 

    // }

    if(empty($errors)) {
        try {
            $sql = "SELECT * FROM user_registration WHERE username = ? AND role = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $username, $role);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();

                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'first_name' => $user['first_name'],
                        'last_name' => $user['last_name'],
                        'role' => $user['role'],
                    ];

                    // Basta kung ano role mo pag sign up, te kung mag log in ka ma redirect based sa imo role e.
                    header("Cache-Control: no-cache, no-store, must-revalidate");
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    $redirect = $user['role'] === 'admin' ? '/admin/dashboard' : '/user/dashboard';
                    header(header: 'Location: ' . BASE_URL . $redirect);
                    exit();
                } else {
                    $errors['login'] = "Invalid password or role.";
                } 
            } else {
                $errors['login'] = "Diin mo na nakwa nga username ya?";
            }
        } catch (Exception $e) {
            $errors['database'] = "Database error: " . $e->getMessage();
            error_log("Exception: " . $e->getMessage());
        }
    }

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

<?php

session_start();

require 'app/Database/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $errors = [];


    // Kabahol nga matabo naka required to, ano ko mango? padungag dungag lang linya ka code.
    // if (empty($username) || empty($password)) {
    //     $errors['login'] = "Please enter username and password."; 

    // }

    if(empty($errors)) {
        try {
            $sql = "SELECT * FROM user_registration WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $username);
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
                    $redirect = $user['role'] === 'admin' ? '/admin/dashboard' : '/user/dashboard';
                    header('Location: ' . BASE_URL . $redirect);
                    exit();
                } else {
                    $errors['login'] = "Invalid username or password.";
                } 
            } else {
                $errors['login'] = "Invalid username or password.";
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

<?php

session_start();
require 'app/Database/connect.php';
require 'app/Core/Validator.php';

use Core\Validator;

define('BASE_URL', '/Cloud Based Projects/Project');

$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm-password'];
$role = $_POST['role'];

$errors = [];

// Check password if it matches the confirm password
if ($password !== $confirm_password) {
    $errors['password'] = "Passwords do not match.";
}

// Check if password is at least 8 characters long
if (!Validator::minLength($password, 8)) {
    $errors['password_length'] = "Password must be at least 8 characters long.";
}

// Check if username already exists
try {
    $sql = "SELECT * FROM user_registration WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $errors['username'] = "Username already taken.";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user_registration (user_id, first_name, last_name, username, password, role, created_at) 
                VALUES (NULL, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssss', $first_name, $last_name, $username, $hashed_password, $role);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Registration successful!";
            header('Location: ' . BASE_URL . '/');
            exit();
        } else {
            $errors['database'] = "Failed to create account: " . $conn->error;
            error_log("Database Error: " . $conn->error); 
        }
    }
} catch (Exception $e) {
    $errors['database'] = "Database error: " . $e->getMessage();
    error_log("Exception: " . $e->getMessage());
}

// If there are errors, store them in the session and redirect back to the form
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: ' . BASE_URL .  '/register');
    exit();
}

if (isset($stmt)) {
    $stmt->close();
}

$conn->close();

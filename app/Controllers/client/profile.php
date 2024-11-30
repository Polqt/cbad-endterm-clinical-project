<?php

require_once 'app/Database/connect.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
    header('Location: ' . BASE_URL . '/');
    exit();
}

// Fetch fresh user data from database to ensure latest information
try {
    $user_id = $_SESSION['user']['user_id'];
    $sql = "SELECT * FROM user_registration WHERE user_id = ? AND role = 'user'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // User not found
        session_unset();
        session_destroy();
        header('Location: ' . BASE_URL . '/');
        exit();
    }

    // Update session with fresh data
    $user = $result->fetch_assoc();
    $_SESSION['user'] = [
        'user_id' => $user['user_id'],
        'username' => $user['username'],
        'first_name' => $user['first_name'],
        'last_name' => $user['last_name'],
        'role' => $user['role']
    ];
} catch (Exception $e) {
    // Log the error
    error_log("Profile Page Error: " . $e->getMessage());

    // Redirect with an error
    $_SESSION['error'] = "An error occurred while fetching your profile.";
    header('Location: ' . BASE_URL . '/user/dashboard');
    exit();
}

$title = 'User Profile';
$icon = BASE_URL . '/public/images/user.png';
$user_logo = BASE_URL . '/public/images/user.png';

require 'app/Views/client/profile.view.php';

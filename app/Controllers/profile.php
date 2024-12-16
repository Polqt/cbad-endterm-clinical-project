<?php

require 'app/Database/connect.php';

// Determine allowed roles based on the route
$allowed_roles = [
    '/admin/profile' => ['admin'],
    '/user/profile' => ['user']
];


try {
    $user_id = $_SESSION['user']['user_id'];
    $sql = "SELECT * FROM user_registration WHERE user_id = ? AND role = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $_SESSION['user']['role']);
    $stmt->execute();
    $result = $stmt->get_result();


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
    header('Location: ' . BASE_URL . '/');
    exit();
}

$title = ucfirst($user['role']) . ' Profile';
$icon = BASE_URL . '/public/images/';
$user_logo = BASE_URL . '/public/images/' . ($user['role'] === 'admin' ? 'manager.png' : 'user.png');

require 'app/Views/profile.view.php';

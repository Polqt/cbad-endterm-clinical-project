<?php

require 'app/Database/connect.php';

$title = 'Medical History';
$icon = BASE_URL . '/public/images/user.png';
$user_logo = BASE_URL . '/public/images/user.png';

$user_id = $_SESSION['user_id'] ?? null;

// if (!$user_id) {
//     header('Location: ' . BASE_URL . '/');
//     exit();
// }

$search = isset($_POST['search']) ? $_POST['search'] : '';
$records = [];

if ($search) {
    $searchTerm = "%$search%";
    $sql = "SELECT * FROM patient_registration 
            WHERE user_id = ? AND 
            (diagnosis LIKE ? OR prescribed_medication LIKE ? OR checkup_date LIKE ?)
            ORDER BY checkup_date ASC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $user_id, $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM patient_registration WHERE user_id = ? ORDER BY checkup_date ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
}

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
}

require 'app/Views/client/medical_history.view.php';

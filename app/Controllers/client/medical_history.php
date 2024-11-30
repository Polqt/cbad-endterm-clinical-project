<?php
require 'app/Database/connect.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
    header('Location: ' . BASE_URL . '/');
    exit();
}

$user_id = $_SESSION['user']['user_id'];

// More debugging
error_log("Current User ID: " . $user_id);

$records = [];
$search = isset($_POST['search']) ? trim($_POST['search']) : '';

try {
    if ($search) {
        // Search query with prepared statement
        $searchTerm = "%$search%";
        $sql = "SELECT * FROM patient_registration 
                WHERE user_id = ? AND 
                (diagnosis LIKE ? OR prescribed_medication LIKE ? OR checkup_date LIKE ?)
                ORDER BY checkup_date DESC";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isss", $user_id, $searchTerm, $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        // Fetch all records for user
        $sql = "SELECT * FROM patient_registration WHERE user_id = ? ORDER BY checkup_date DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
    }

    // Fetch records
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }

    // Debugging: Log records found
    error_log("Records found: " . count($records));
} catch (Exception $e) {
    // Log database errors
    error_log("Database Error in Medical History: " . $e->getMessage());
    $records = []; // Ensure records is empty
}

function getStatusBadgeClass($status)
{
    return match ($status) {
        'Active' => 'bg-success',
        'Discharged' => 'bg-warning',
        'Deceased' => 'bg-danger',
        'Transferred' => 'bg-info',
        default => 'bg-secondary'
    };
}

$title = 'Medical History';
$icon = BASE_URL . '/public/images/user.png';
$user_logo = BASE_URL . '/public/images/user.png';

require 'app/Views/client/medical_history.view.php';

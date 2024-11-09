<?php

$title = 'Admin Dashboard';
$icon = BASE_URL . '/public/images/manager.png';
$user_logo = BASE_URL . '/public/images/manager.png';

require 'app/Database/connect.php';

// Fetch total patients
$totalPatientsQuery = "SELECT COUNT(*) as total FROM patient_registration";
$totalPatients = $conn->query($totalPatientsQuery)->fetch_assoc()['total'];

// Fetch status counts
$statusQuery = "SELECT status, COUNT(*) as count FROM patient_registration GROUP BY status";
$statusResult = $conn->query($statusQuery);
$statusCounts = [];
while ($row = $statusResult->fetch_assoc()) {
    $statusCounts[$row['status']] = $row['count'];
}

// Fetch gender distribution
$genderQuery = "SELECT gender, COUNT(*) as count FROM patient_registration GROUP BY gender";
$genderResult = $conn->query($genderQuery);
$genderCounts = [];
while ($row = $genderResult->fetch_assoc()) {
    $genderCounts[strtolower($row['gender'])] = $row['count'];
}

// Fetch recent patients
$recentPatientsQuery = "
    SELECT 
        id,
        first_name,
        last_name,
        diagnosis,
        status,
        created_at
    FROM patient_registration 
    ORDER BY created_at ASC 
    LIMIT 5";
    
$recentPatients = $conn->query($recentPatientsQuery);


// Helper function for status badge classes
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

require 'app/Views/admin/dashboard.view.php';

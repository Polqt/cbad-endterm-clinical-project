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

// Fetch disease prevalence by month
$diseasePrevalenceQuery = "
    SELECT 
        DATE_FORMAT(created_at, '%Y-%m') AS month, 
        diagnosis, 
        COUNT(*) AS count
    FROM patient_registration
    GROUP BY month, diagnosis
    ORDER BY month, count DESC
";
$diseasePrevalenceResult = $conn->query($diseasePrevalenceQuery);

$diseasePrevalenceData = [];
while ($row = $diseasePrevalenceResult->fetch_assoc()) {
    $diseasePrevalenceData[] = $row;
}

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

$diseaseQuery = "
        SELECT 
            diagnosis, 
            COUNT(*) as count 
        FROM patient_registration 
        WHERE status = 'Active' 
        GROUP BY diagnosis 
        ORDER BY count DESC 
        LIMIT 10
    ";
$diseaseResult = $conn->query($diseaseQuery);

$diagnoses = [];
$counts = [];

while ($row = $diseaseResult->fetch_assoc()) {
    $diagnoses[] = $row['diagnosis'];
    $counts[] = $row['count'];
}

require 'app/Views/admin/dashboard.view.php';
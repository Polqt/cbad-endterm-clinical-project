<?php

require 'app/Database/connect.php';

$title = 'Patient Records';
$icon = BASE_URL . '/public/images/manager.png';
$user_logo = BASE_URL . '/public/images/manager.png';

$search = isset($_POST['search']) ? $_POST['search'] : '';
$patients = [];
$searchNotFound = false;

if ($search) {
    $searchTerm = "%$search%";
    $sql = "SELECT * FROM patient_registration WHERE 
            first_name REGEXP ? OR 
            last_name REGEXP ? OR 
            CONCAT(first_name, ' ', last_name) REGEXP ? OR 
            age REGEXP ? OR 
            gender REGEXP ? OR 
            diagnosis REGEXP ? OR 
            prescribed_medication REGEXP ? OR 
            status REGEXP ? OR 
            checkup_date REGEXP ?
            ORDER BY id ASC"; 

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", 
        $search, $search, $search, 
        $search, $search, $search, 
        $search, $search, $search
    );
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM patient_registration ORDER BY id ASC"; 
    $result = $conn->query($sql);
}

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $patients[] = $row;
    }

    // Check if no patients found
    $searchNotFound = (count($patients) === 0 && !empty($search));
}

if (isset($_SESSION['success_message'])) {
    $success = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

function getStatusBadgeClass($status)
{
    return match ($status) {
        'Active' => 'bg-success text-white',
        'Discharged' => 'bg-warning text-dark',
        'Deceased' => 'bg-danger text-white',
        'Transferred' => 'bg-info text-white',
        default => 'bg-secondary text-white'
    };
}

require 'app/Views/admin/patient_records.view.php';

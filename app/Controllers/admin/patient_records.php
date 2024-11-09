<?php

require 'app/Database/connect.php';

$title = 'Patient Records';
$icon = BASE_URL . '/public/images/manager.png';
$user_logo = BASE_URL . '/public/images/manager.png';


$search = isset($_POST['search']) ? $_POST['search'] : '';
$patients = [];

if ($search) {
    $searchTerm = "%$search%";
    $sql = "SELECT * FROM patient_registration WHERE 
            first_name LIKE ? OR 
            last_name LIKE ? OR 
            diagnosis LIKE ? 
            ORDER BY id ASC"; 

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
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
}

if (isset($_SESSION['success_message'])) {
    $success = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

require 'app/Views/admin/patient_records.view.php';

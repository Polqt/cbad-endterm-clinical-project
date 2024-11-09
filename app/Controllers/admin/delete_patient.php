<?php

require 'app/Database/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get patient ID
    $patient_id = $_POST['patient_id'];

    // Prepare the delete query
    $sql = "DELETE FROM patient_registration WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $patient_id);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Patient record deleted successfully!";
    } else {
        $_SESSION['error_message'] = "Error deleting patient record: " . $conn->error;
    }

    $stmt->close();

    header("Location: patient-records");
    exit();
}

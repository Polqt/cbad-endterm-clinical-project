<?php

require 'app/Database/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_id = $_POST['patient_id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $status = $_POST['status'];
    $diagnosis = $_POST['diagnosis'];
    $medication = $_POST['medication'];
    $checkupDate = $_POST['checkupDate'];


    $sql = "UPDATE patient_registration SET 
            first_name = ?,
            last_name = ?,
            age = ?,
            gender = ?,
            status = ?,
            diagnosis = ?,
            prescribed_medication = ?,
            checkup_date = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssisssssi",
        $firstName,
        $lastName,
        $age,
        $sex,
        $status,
        $diagnosis,
        $medication,
        $checkupDate,
        $patient_id
    );

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Patient information updated successfully!";
    } else {
        $_SESSION['error_message'] = "Error updating patient information: " . $conn->error;
    }

    $stmt->close();

    header('Location: ' . BASE_URL . '/admin/patient-records');
    exit();

}
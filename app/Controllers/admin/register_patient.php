<?php
// In register_patient.php Controller:
require 'app/Database/connect.php';

$title = 'Register Patient';
$icon = BASE_URL . '/public/images/';
$user_logo = BASE_URL . '/public/images/manager.png';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $sql = "INSERT INTO patient_registration (
            first_name, 
            last_name, 
            age, 
            gender, 
            diagnosis, 
            prescribed_medication, 
            checkup_date
        ) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param(
                "ssissss",
                $_POST['firstName'],
                $_POST['lastName'],
                $_POST['age'],
                $_POST['sex'],  
                $_POST['diagnosis'],
                $_POST['medication'],
                $_POST['checkupDate']
            );

            if ($stmt->execute()) {
                session_start();
                $_SESSION['success_message'] = "Patient registered successfully!";
                header("Location: /Cloud Based Projects/Project/admin/patient-records");
                exit();
            } else {
                throw new Exception("Error executing statement: " . $stmt->error);
            }
        } else {
            throw new Exception("Error preparing statement: " . $conn->error);
        }
    } catch (Exception $e) {
        $error = "Registration failed: " . $e->getMessage();
    }
}

require 'app/Views/admin/register_patient.view.php';

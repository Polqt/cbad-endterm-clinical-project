<?php
require 'app/Database/connect.php';

$title = 'Register Patient';
$icon = BASE_URL . '/public/images/';
$user_logo = BASE_URL . '/public/images/manager.png';

// Fetch all users with role 'user' for the dropdown
$users_query = "SELECT user_id, username, first_name, last_name FROM user_registration WHERE role = 'user'";
$users_result = $conn->query($users_query);
$users = [];

if ($users_result) {
    while ($row = $users_result->fetch_assoc()) {
        $users[] = $row;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Updated SQL query to include user_id
        $sql = "INSERT INTO patient_registration (
            user_id,
            first_name, 
            last_name, 
            age, 
            gender, 
            diagnosis, 
            prescribed_medication, 
            checkup_date,
            status
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Active')";

        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param(
                "ississss",
                $_POST['userId'],      // Add user_id parameter
                $_POST['firstName'],
                $_POST['lastName'],
                $_POST['age'],
                $_POST['sex'],
                $_POST['diagnosis'],
                $_POST['medication'],
                $_POST['checkupDate']
            );

            if ($stmt->execute()) {
                $_SESSION['success_message'] = "Patient registered successfully!";
                header("Location: " . BASE_URL . "/admin/patient-records");
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

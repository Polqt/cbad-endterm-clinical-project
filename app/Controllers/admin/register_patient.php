<?php
require 'app/Database/connect.php';

$title = 'Register Patient';
$icon = BASE_URL . '/public/images/';
$user_logo = BASE_URL . '/public/images/manager.png';

// Check if user exists before patient registration
function validateUserExists($conn, $firstName, $lastName)
{
    $sql = "SELECT user_id FROM user_registration 
            WHERE first_name = ? 
            AND last_name = ? 
            AND role = 'user'";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $firstName, $lastName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
        return $userData['user_id'];
    }

    return false;
}

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
        // First, icheck if the user exists
        $userId = validateUserExists($conn, $_POST['firstName'], $_POST['lastName']);

        if ($userId === false) {
            throw new Exception("No user account found for this patient. Please create a user account first.");
        }

        // Check if user exists, then ma proceed sa patient registration
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
                $userId,              
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
        $error = $e->getMessage();
    }
}

require 'app/Views/admin/register_patient.view.php';

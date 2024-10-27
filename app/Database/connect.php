<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "clinic_management_system";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "Connected successfully";
}

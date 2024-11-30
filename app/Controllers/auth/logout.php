<?php
define('BASE_URL', '/Cloud Based Projects/Project');

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Set cache control headers
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

header('Location: ' . BASE_URL . '/');
exit();

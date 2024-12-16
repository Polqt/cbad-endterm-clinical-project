<?php
session_start();
define('BASE_URL', '/Cloud Based Projects/Project');

$_SESSION = [];

session_destroy();

session_regenerate_id(true);

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

header('Location: ' . BASE_URL . '/');
exit();

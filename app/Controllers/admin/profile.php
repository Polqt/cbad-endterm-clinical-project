<?php

require_once 'app/Database/connect.php';

$user = $_SESSION['user'];

$title = 'Profile';
$icon = BASE_URL . '/public/images/';
$user_logo = BASE_URL . '/public/images/manager.png';

require 'app/Views/admin/profile.view.php';

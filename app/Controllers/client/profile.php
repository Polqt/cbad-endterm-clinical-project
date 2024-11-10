<?php

require_once 'app/Database/connect.php';

$user = $_SESSION['user'];

$title = 'Client Dashboard';
$icon = BASE_URL . '/public/images/user.png';
$user_logo = BASE_URL . '/public/images/user.png';


require 'app/Views/client/profile.view.php';

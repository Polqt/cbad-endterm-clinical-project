<?php

// return [
//     '/' => 'app/Controllers/log/index.php',
//     '/register' => 'app/Controllers/log/register.php',
//     '/admin/dashboard' => 'app/Controllers/admin/dashboard.php',
//     '/user/dashboard' => 'app/Controllers/client/dashboard.php',
// ];

// Login Routes
$router->get('/', 'app/Controllers/log/index.php');
$router->get('/register', 'app/Controllers/log/register.php');

// Admin Routes
$router->get('/admin/dashboard', 'app/Controllers/admin/dashboard.php');


// Client/User Routes
$router->get('/user/dashboard', 'app/Controllers/client/dashboard.php');

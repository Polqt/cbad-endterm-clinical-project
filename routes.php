<?php

// return [
//     '/' => 'app/Controllers/log/index.php',
//     '/register' => 'app/Controllers/log/register.php',
//     '/admin/dashboard' => 'app/Controllers/admin/dashboard.php',
//     '/user/dashboard' => 'app/Controllers/client/dashboard.php',
// ];

// Login Routes
$router->get('/', 'app/Controllers/log/index.php');
$router->post('/', 'app/Controllers/log/index.php');
$router->get('/register', 'app/Controllers/log/register.php');
$router->post('/register', 'app/Controllers/log/store.php'); 

// Admin Routes
$router->get('/admin/dashboard', 'app/Controllers/admin/dashboard.php');
$router->get('/admin/services', 'app/Controllers/admin/services.php');
$router->get('/admin/history', 'app/Controllers/admin/history.php');

// Client/User Routes
$router->get('/user/dashboard', 'app/Controllers/client/dashboard.php');
$router->get('/user/services', 'app/Controllers/client/services.php');
$router->get('/user/history', 'app/Controllers/client/history.php');

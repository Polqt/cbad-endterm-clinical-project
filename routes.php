<?php

// return [
//     '/' => 'app/Controllers/log/index.php',
//     '/register' => 'app/Controllers/log/register.php',
//     '/admin/dashboard' => 'app/Controllers/admin/dashboard.php',
//     '/user/dashboard' => 'app/Controllers/client/dashboard.php',
// ];

// Login Routes
$router->get('/', 'app/Controllers/auth/login.php');
$router->post('/', 'app/Controllers/auth/login.php');
$router->get('/register', 'app/Controllers/auth/register.php');
$router->post('/register', 'app/Controllers/auth/store.php');

// Admin Routes
$router->get('/admin/dashboard', 'app/Controllers/admin/dashboard.php');
$router->get('/admin/patient-records', 'app/Controllers/admin/patient_records.php');
$router->get('/admin/register-patient', 'app/Controllers/admin/register_patient.php');
$router->get('/admin/profile', 'app/Controllers/admin/profile.php');

// Client/User Routes
$router->get('/user/dashboard', controller: 'app/Controllers/client/dashboard.php');
$router->get('/user/medical-history', 'app/Controllers/client/medical_history.php');
$router->get('/user/profile', 'app/Controllers/client/profile.php');

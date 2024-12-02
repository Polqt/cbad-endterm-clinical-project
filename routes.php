<?php

// return [
//     '/' => 'app/Controllers/log/index.php',
//     '/register' => 'app/Controllers/log/register.php',
//     '/admin/dashboard' => 'app/Controllers/admin/dashboard.php',
//     '/user/dashboard' => 'app/Controllers/client/dashboard.php',
// ];

require_once 'app/Middleware/Auth.php';

//Login Routes
$router->get('/', 'app/Controllers/auth/login.php');
$router->post('/', 'app/Controllers/auth/login.php');
$router->get('/register', 'app/Controllers/auth/register.php');
$router->post('/register', 'app/Controllers/auth/store.php');

// Admin Routes with adminAuth middleware
$router->get('/admin/dashboard', 'app/Controllers/admin/dashboard.php', [Auth::class, 'checkAdmin']);
$router->get('/admin/patient-records', 'app/Controllers/admin/patient_records.php', [Auth::class, 'checkAdmin']);
$router->get('/admin/register-patient', 'app/Controllers/admin/register_patient.php', [Auth::class, 'checkAdmin']);
$router->post('/admin/register-patient', 'app/Controllers/admin/register_patient.php', [Auth::class, 'checkAdmin']);
$router->get('/admin/profile', 'app/Controllers/admin/profile.php', [Auth::class, 'checkAdmin']);
$router->post('/admin/update-patient', 'app/Controllers/admin/update_patient.php', [Auth::class, 'checkAdmin']);
$router->post('/admin/delete-patient', 'app/Controllers/admin/delete_patient.php', [Auth::class, 'checkAdmin']);

// Client/User Routes with userAuth middleware
$router->get('/user/dashboard', 'app/Controllers/client/dashboard.php', [Auth::class, 'checkUser']);
$router->get('/user/medical-history','app/Controllers/client/medical_history.php', [Auth::class, 'checkUser']);
$router->get('/user/profile', 'app/Controllers/client/profile.php', [Auth::class, 'checkUser']);


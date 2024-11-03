<?php

session_start();

if (isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
    header('Location: '. BASE_URL . '/');
    exit();
};

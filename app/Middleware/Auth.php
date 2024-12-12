<?php
class Auth
{
    public static function checkAuth()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            self::redirectToLogin();
        }
    }

    public static function checkAdmin()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            self::redirectToLogin();
        }
    }

    public static function checkUser()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] == 'client') {
            self::redirectToLogin();
        }
    }

    private static function redirectToLogin()
    {
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
        header('Location: ' . BASE_URL . '/');
        exit();
    }
}

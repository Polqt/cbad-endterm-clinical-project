<?php
class Auth
{
    public static function checkAuth()
    {
        session_start();

        // Check if user is not logged in
        if (!isset($_SESSION['user'])) {
            // Set cache control headers to prevent back button from showing cached pages
            header("Cache-Control: no-cache, no-store, must-revalidate");
            header("Pragma: no-cache");
            header("Expires: 0");

            header('Location: ' . BASE_URL . '/');
            exit();
        }
    }

    public static function checkAdmin()
    {
        session_start();

        // Check if user is not logged in or not an admin
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Cache-Control: no-cache, no-store, must-revalidate");
            header("Pragma: no-cache");
            header("Expires: 0");

            header('Location: ' . BASE_URL . '/');
            exit();
        }
    }

    public static function checkUser()
    {
        session_start();

        // Check if user is not logged in or not a regular user
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
            header("Cache-Control: no-cache, no-store, must-revalidate");
            header("Pragma: no-cache");
            header("Expires: 0");

            header('Location: ' . BASE_URL . '/');
            exit();
        }
    }
}

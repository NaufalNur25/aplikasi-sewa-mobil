<?php

namespace App\Middleware;

class Authentication
{
    public static function check(?String $session = null)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user']) && isset($_COOKIE['remember_user'])) {
            $cookieData = json_decode($_COOKIE['remember_user'], true);

            if (is_array($cookieData) && isset($cookieData['email'])) {
                $_SESSION['user'] = $cookieData;
            }
        }

        if (!isset($_SESSION['user'])) {
            header('Location: /');
            exit;
        }
    }


    public static function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        if (isset($_COOKIE['remember_user'])) {
            setcookie('remember_user', '', time() - 3600, "/");
        }

        session_destroy();
        header("Location: /");
        exit;
    }
}

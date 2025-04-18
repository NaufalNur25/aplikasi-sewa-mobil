<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\Controller;
use App\Controllers\DashboardController;
use App\Middleware\Authentication;

$request_uri = $_SERVER['REQUEST_URI'];

$authController = new AuthController();
$dashboardController = new DashboardController();

session_start();

switch ($_SERVER['REQUEST_URI']) {
    case '/loginAction':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->loginAction();
        }
        break;

    case '/registerAction':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->registerAction();
        }
        break;

    case '/dashboard':
        Authentication::check();
        $dashboardController->index();
        break;

    case '/':
        if (isset($_SESSION['user'])) {
            header("Location: /dashboard");
            exit;
        }
        $authController->login();
        break;

    case '/register':
        if (isset($_SESSION['user'])) {
            header("Location: /dashboard");
            exit;
        }
        $authController->register();
        break;

    case '/logout':
        Authentication::logout();
        break;

    default:
        http_response_code(404);
        Controller::notFound();
        break;
}

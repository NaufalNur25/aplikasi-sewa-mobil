<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\Controller;
use App\Controllers\DashboardController;
use App\Controllers\SewaController;
use App\Middleware\Authentication;

$request_uri = $_SERVER['REQUEST_URI'];

$authController = new AuthController;
$dashboardController = new DashboardController;
$sewaController = new SewaController;

session_start();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
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
        if (isset($_GET['user']) && $_GET['user'] == 'guest') {
            $dashboardController->index();
        } else {
            Authentication::check();
            $dashboardController->index();
        }

        break;

    case '/landing':
        $dashboardController->landing();
        break;

    case '/sewa-mobil':
        if (isset($_GET['mobil'])) {
            $sewaController->detail($_GET['mobil']);
        } else {
            echo "Mobil tidak ditemukan!";
        }
        break;

    case '/sewa-mobil/proses':
        $sewaController->process();
        break;

    case '/':
        header("Location: /landing");
        exit;
        break;

    case '/login':
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

<?php

namespace App\Controllers;

use App\Middleware\Authentication;

class Controller
{
    public function index()
    {
        Authentication::check();

        echo "Welcome to the Dashboard!";
    }

    public function loadView(String $name)
    {
        include __DIR__ . "/../../public/pages/" . $name . ".php";
    }

    public static function notFound()
    {
        include __DIR__ . '/../../public/pages/404.php';
    }
}

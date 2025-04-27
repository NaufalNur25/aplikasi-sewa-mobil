<?php

namespace App\Controllers;

use App\Middleware\Authentication;

/**
 * Nama: Naufal Nur Hafizh
 * NPM: 223111015
 */
class Controller
{
    public function index()
    {
        Authentication::check();

        echo "Welcome to the Dashboard!";
    }

    public function view(String $name, array $data = [])
    {
        extract($data);

        include __DIR__ . "/../../public/pages/" . $name . ".php";
    }

    public static function notFound()
    {
        include __DIR__ . '/../../public/pages/404.php';
    }
}

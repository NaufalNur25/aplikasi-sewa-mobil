<?php

namespace App\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $this->loadView("Dashboard");
    }
}

<?php

namespace App\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $this->view("Dashboard");
    }

    public function landing()
    {
        $this->view('Landing');
    }
}

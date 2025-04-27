<?php

namespace App\Controllers;

/**
 * Nama: Naufal Nur Hafizh
 * NPM: 223111015
 */
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

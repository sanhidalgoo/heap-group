<?php

// Authors: Juan Sebastián Díaz

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('userspace.home.index');
    }
}

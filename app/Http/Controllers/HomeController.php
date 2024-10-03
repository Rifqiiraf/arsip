<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('layouts.app'); // Pastikan ada view 'home.blade.php'
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMenuController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}

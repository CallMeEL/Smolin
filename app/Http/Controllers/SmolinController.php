<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmolinController extends Controller
{
    public function index()
    {
        return view('beranda.home');
    }
}

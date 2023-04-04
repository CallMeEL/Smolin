<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;

class SmolinController extends Controller
{
    public function index()
    {
        //show motor data that available
        $motors = Motor::where('status', 'available')->get();

        return view('beranda.home', compact('motors'));
    }

    public function filter()
    {
        //show motor data based on the filter that user want

    }
}

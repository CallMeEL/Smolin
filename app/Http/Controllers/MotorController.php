<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MotorController extends Controller
{

    public function create()
    {
        return view('admin.create-motor');
    }

}

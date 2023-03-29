<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
use App\Models\User;

class AdminMenuController extends Controller
{
    public function index()
    {
        $totalMotor = Motor::count();

        $totalUser = User::where('role_id', '2')->count();

        $totalSewa = Motor::where('status', 'unavailable')->count();

        return view('admin.dashboard', compact('totalMotor', 'totalUser', 'totalSewa'));
    }

}

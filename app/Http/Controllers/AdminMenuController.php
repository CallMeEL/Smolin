<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
use App\Models\User;
use App\Models\Invoice;
use App\Models\RentLog;

class AdminMenuController extends Controller
{
    public function index()
    {
        $totalMotor = Motor::count();

        $totalUser = User::where('role_id', '2')->count();

        $totalSewa = Motor::where('status', 'unavailable')->count();

        return view('admin.dashboard', compact('totalMotor', 'totalUser', 'totalSewa'));
    }

    public function verifiedClientOrder()
    {
        // Menampilkan table invoice, motor, user, dan rentlog
        $invoices = Invoice::join('motors', 'motors.id', '=', 'invoices.motor_id')
            ->join('users', 'users.id', '=', 'invoices.user_id')
            ->join('rent_logs', 'rent_logs.invoice_id', '=', 'invoices.id')
            ->get();

        return view('admin.client-order', compact('invoices'));
    }

}

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
            // Dimana rent_date setelah hari ini
            ->where('invoices.rent_date', '>', date('Y-m-d'))
            // Dan payment_status != paid
            ->where('invoices.payment_status', '!=', 'paid')
            ->get();

        return view('admin.client-order', compact('invoices'));
    }

    public function detailOrderClient(Invoice $invoice)
    {
        // Detail Invoice dari table invoice, motor, user, dan rentlog dicari berdasarkan id Invoice
        $invoices = Invoice::join('motors', 'motors.id', '=', 'invoices.motor_id')
            ->join('users', 'users.id', '=', 'invoices.user_id')
            ->join('rent_logs', 'rent_logs.invoice_id', '=', 'invoices.id')
            ->where('invoices.id', $invoice->id)
            ->get([
                'invoices.id',
                'invoices.invoice_id',
                'invoices.user_id',
                'invoices.motor_id',
                'invoices.rent_date',
                'invoices.return_date',
                'invoices.total_price',
                'invoices.payment_status',
                'invoices.payment_proof',
                'motors.nama_motor',
                'motors.tipe_motor',
                'motors.gambar_motor',
                'motors.harga_motor',
                'users.name',
                'users.email',
                'users.phone_number',
                'users.no_ktp',
                'rent_logs.rent_date',
                'rent_logs.return_date',
                'rent_logs.actual_return_date',
            ])
            ->first();

        return view('admin.detail-order-client', compact('invoices'));
    }

    public function confirmOrderAdmin(Request $request, Invoice $invoice)
    {
        // Mengupdate invoice sesuai id menjadi 'paid'
        Invoice::where($invoice->id)
            ->update([
                'payment_status' => 'paid',
            ]);


        return redirect()->route('admin.order');
    }

}

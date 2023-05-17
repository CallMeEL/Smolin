<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
use App\Models\User;
use App\Models\Invoice;
use App\Models\RentLog;
use Illuminate\Support\Facades\Storage;

class AdminMenuController extends Controller
{
    public function index()
    {
        $totalMotor = Motor::count();

        $totalUser = User::where('role_id', '2')->count();

        $totalSewa = Motor::where('status', 'unavailable')->count();

        // Show table RentLog dari yang terbaru dan digabung dengan users.name ; motors.nama_motor
        $rentLogs = RentLog::join('users', 'users.id', '=', 'rent_logs.user_id')
            ->join('motors', 'motors.id', '=', 'rent_logs.motor_id')
            ->orderBy('rent_logs.id', 'desc')
            ->get([
                'rent_logs.id',
                'rent_logs.user_id',
                'rent_logs.motor_id',
                'rent_logs.invoice_id',
                'rent_logs.rent_date',
                'rent_logs.return_date',
                'rent_logs.actual_return_date',
                'users.name',
                'motors.nama_motor',
            ]);

        return view('admin.dashboard', compact('totalMotor', 'totalUser', 'totalSewa', 'rentLogs'));
    }

    public function verifiedClientOrder()
    {
        // Menampilkan table invoice, motor, user, dan rentlog
        $invoices = Invoice::join('motors', 'motors.id', '=', 'invoices.motor_id')
            ->join('users', 'users.id', '=', 'invoices.user_id')
            ->join('rent_logs', 'rent_logs.invoice_id', '=', 'invoices.id')
            // Dimana rent_date setelah hari ini
            ->where('invoices.rent_date', '>=', date('Y-m-d'))
            // Dan payment_status != paid
            ->where('invoices.payment_status', '!=', 'paid')
            ->get();

        return view('admin.client-order', compact('invoices'));
    }

    public function detailOrderClient(Invoice $invoice)
    {
        // Jika payment_proof null, maka ditendang ke halaman admin.order
        if ($invoice->payment_proof == null) {
            return redirect()->route('admin.order');
        }
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
            ->first()
            ->update([
                'payment_status' => 'paid',
            ]);


        return redirect()->route('admin.order');
    }

    public function rejectOrderAdmin(Request $request, Invoice $invoice)
    {
        // Menghapus gambar payment_proof
        if ($request->oldPaymentProof){
            Storage::delete($request->oldPaymentProof);
        }

        // Mengupdate payment_proof menjadi null dan menghapus gambar payment_proof lalu payment_status menjadi unpaid
        Invoice::where($invoice->id)
            ->update([
                'payment_proof' => null,
                'payment_status' => 'unpaid',
            ]);

        return redirect()->route('admin.order');
    }

    public function returnMotorAdmin()
    {
        // Menampilkan table invoice, motor, user, dan rentlog
        $invoices = Invoice::join('motors', 'motors.id', '=', 'invoices.motor_id')
            ->join('users', 'users.id', '=', 'invoices.user_id')
            ->join('rent_logs', 'rent_logs.invoice_id', '=', 'invoices.id')
            // Dimana rent_date >= hari ini
            ->where('invoices.rent_date', '>=', date('Y-m-d'))
            // Dimana payment_status paid
            ->where('invoices.payment_status', '=', 'paid')
            // Dimana status unavailable
            ->where('motors.status', '=', 'unavailable')
            // Dimana actual_return_date = null
            ->where('rent_logs.actual_return_date', '=', null)
            ->get();

        return view('admin.return-motor', compact('invoices'));
    }

    public function updateReturnMotorAdmin()
    {
        // Mengupdate actual_return_date menjadi hari ini
        RentLog::where('actual_return_date', null)
            ->update([
                'actual_return_date' => date('Y-m-d'),
            ]);

        // Mengupdate status motor menjadi available
        Motor::where('status', 'unavailable')
            ->update([
                'status' => 'available',
            ]);

        return redirect()->route('admin.return');
    }

}

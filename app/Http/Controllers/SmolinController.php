<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Motor;

class SmolinController extends Controller
{
    public function index()
    {
        // Jika ada motor yang disewa pada tanggal hari dan berstatus paid pada invoice maka status motor unavailable
        // $update = Motor::all();
        // foreach ($update as $u) {
        //     $invoice = DB::table('invoices')
        //         ->where('motor_id', $u->id)
        //         ->where('rent_date', date('Y-m-d'))
        //         ->where('payment_status', 'paid')
        //         ->first();
        //     if ($invoice) {
        //         $u->status = 'unavailable';
        //         $u->save();
        //     }
        // }

        // Jika ada motor yang disewa pada hari setelah rent_date(invoices), payment_status paid(invoices), dan actual_return_date == null(rent_logs), maka status motor unavailable
        $update2 = Motor::all();
        foreach ($update2 as $u2) {
            $rent_log = DB::table('rent_logs')
                ->join('invoices', 'invoices.id', '=', 'rent_logs.invoice_id')
                ->where('invoices.motor_id', $u2->id)
                ->where('invoices.payment_status', 'paid')
                ->where('rent_logs.actual_return_date', null)
                ->first();
            if ($rent_log) {
                $u2->status = 'unavailable';
                $u2->save();
            }
        }

        $motors = Motor::where('status', 'available');

        if (request('motor')){
            $motors->where('nama_motor', 'like', '%' . request('motor') . '%');
        }

        if (request('max')){
            $motors->where('harga_motor', '<=', request('max'));
        }

        if (request('transmisi')){
            $motors->where('tipe_motor', request('transmisi'));
        }

        return view('beranda.home', [
            "motors" => $motors->get()
        ]);
    }

}

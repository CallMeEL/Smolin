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
        $update = Motor::all();
        foreach ($update as $u) {
            $invoice = DB::table('invoices')
                ->where('motor_id', $u->id)
                ->where('rent_date', date('Y-m-d'))
                ->where('payment_status', 'paid')
                ->first();
            if ($invoice) {
                $u->status = 'unavailable';
                $u->save();
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

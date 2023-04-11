<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Motor;

class SmolinController extends Controller
{
    public function index()
    {
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

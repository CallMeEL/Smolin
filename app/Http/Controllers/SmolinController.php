<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Motor;

class SmolinController extends Controller
{
    public function index()
    {
        //show motor data that available
        $motors = Motor::where('status', 'available')->get();

        return view('beranda.home', compact('motors'));
    }

    public function filter(Request $request)
    {
        $query = Motor::query();

        if (request('search')){
            $query->where('nama_motor', 'like', '%' . request('search') . '%');
        }

        //Kembali ke home dengan filter
        $motors = $query->get();
        return view('beranda.home', compact('motors'));
    }
}

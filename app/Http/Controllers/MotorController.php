<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
use App\Models\Rent;

class MotorController extends Controller
{

    public function create()
    {
        return view('admin.create-motor');
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'nama_motor' => 'required',
            'tipe_motor' => 'required',
            'gambar_motor' => 'image|file|max:4096',
            'harga_motor' => 'required|numeric',
        ]);

        $validateData['gambar_motor'] = $request->file('gambar_motor')->store('motor-images');

        Motor::create($validateData);
        $request->session()->flash('success', 'Data Berhasil Ditambahkan!');
        return redirect('/motor');

    }

    public function show(Motor $motor)
    {
        $result = Motor::find($motor->id);
        if ($result->status == 'available') {
            return view('beranda.sewa-motor', compact('result'));
        } else {
            return redirect('/');
        }

    }

}

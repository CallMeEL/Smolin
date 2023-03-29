<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;

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



}

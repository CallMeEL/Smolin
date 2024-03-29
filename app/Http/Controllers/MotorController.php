<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
use App\Models\RentLog;
use App\Models\Invoice;
use Illuminate\Support\Facades\Storage;

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

    public function rent(Request $request, Motor $motor)
    {
        $validateData = $request->validate([
            'rent_date' => 'required|date',
            'return_date' => 'required|date',
        ]);

        // Jika pengisian tanggal sewa lebih besar dari tanggal kembali
        if ($validateData['rent_date'] > $validateData['return_date']) {
            $request->session()->flash('error', 'Tanggal Sewa tidak boleh lebih dari Tanggal Kembali!');
            return redirect('/motor/' . $motor->id);
        }

        // Jika tanggal sewa adalah kemarin maka tidak bisa
        if ($validateData['rent_date'] < date('Y-m-d')) {
            $request->session()->flash('error', 'Tanggal Sewa tidak boleh sebelum hari ini!');
            return redirect('/motor/' . $motor->id);
        }

        // Jika tanggal booking sewa pada tanggal yang sama, maka tidak bisa menyewa
        $rentLog = RentLog::where('motor_id', $motor->id)
            ->where('rent_date', $validateData['rent_date'])
            ->where('return_date', $validateData['return_date'])
            ->first();
        if ($rentLog) {
            $request->session()->flash('error', 'Tanggal Sewa dan Tanggal Kembali sudah ada!');
            return redirect('/motor/' . $motor->id);
        }

        // Jika sewa dan kembali di tanggal yang sama, maka tidak bisa menyewa
        if ($validateData['rent_date'] == $validateData['return_date']) {
            $request->session()->flash('error', 'Tanggal Sewa dan Tanggal Kembali tidak boleh sama!');
            return redirect('/motor/' . $motor->id);
        }

        $validateData['motor_id'] = $motor->id;
        $validateData['user_id'] = auth()->user()->id;


        //Menghitung total harga per hari
        $validateData['total_price'] = $motor->harga_motor * (strtotime($validateData['return_date']) - strtotime($validateData['rent_date'])) / (60 * 60 * 24);
        Invoice::create([
            //ID dibuat berdasarkan tanggal hari ini dan random 8 digit angka, misalnya INV-1204202388888888
            'invoice_id' => 'INV-' . date('dmY') . rand(10000000, 99999999),
            'motor_id' => $motor->id,
            'user_id' => auth()->user()->id,
            'total_price' => $validateData['total_price'],
            'rent_date' => $validateData['rent_date'],
            'return_date' => $validateData['return_date'],
        ]);

        //invoice_id di renllog = id pada invoice
        $validateData['invoice_id'] = Invoice::where('motor_id', $motor->id)
            ->where('user_id', auth()->user()->id)
            ->where('total_price', $validateData['total_price'])
            ->where('rent_date', $validateData['rent_date'])
            ->where('return_date', $validateData['return_date'])
            ->first()->id;

        RentLog::create($validateData);

        $request->session()->flash('success', 'Silahkan melakukan pembayaran pada menu Order');
        return redirect('/');

    }

    public function table()
    {
        $motorDatas = Motor::all();
        return view('admin.data-motor', compact('motorDatas'));
    }

    public function edit(Motor $motor)
    {
        $result = Motor::find($motor->id);
        return view('admin.edit-motor', compact('result'));
    }

    public function update(Request $request, Motor $motor)
    {
        $validateData = $request->validate([
            'nama_motor' => 'required',
            'tipe_motor' => 'required',
            'gambar_motor' => 'image|file|max:4096',
            'harga_motor' => 'required|numeric',
        ]);

        if($request->file('gambar_motor')){
            if($request->oldMotorImage){
                Storage::delete($request->oldMotorImage);
            }
            $validateData['gambar_motor'] = $request->file('gambar_motor')->store('motor-images');
        }

        Motor::where('id', $motor->id)->update($validateData);
        $request->session()->flash('success', 'Data Berhasil Diubah!');
        return redirect()->route('motor.table');
    }

    public function destroy(Request $request, Motor $motor)
    {
        Motor::destroy($motor->id);
        // Hapus gambar motor yang ada di storage/app/public/motor-images
        Storage::delete($motor->gambar_motor);

        $request->session()->flash('success', 'Data Berhasil Dihapus!');
        return redirect()->route('motor.table');
    }

}

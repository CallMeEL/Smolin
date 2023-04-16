<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use Illuminate\Http\Request;
use App\Models\Motor;
use App\Models\RentLog;

class InvoiceController extends Controller
{
    /**
     * Menampilkan Invoice dari User.
     */
    public function index()
    {
        // Jika ada tanggal yang kurang dari tanggal sekarang, update invoices payment_status menjadi 'late'
        $invoices = Invoice::where('user_id', auth()->user()->id)->get();
        foreach ($invoices as $invoice) {
            if ($invoice->rent_date < date('Y-m-d')) {
                $invoice->payment_status = 'late';
                $invoice->save();
            }
        }

        //Join tabel invoice, dan motor
        $invoices = Invoice::join('motors', 'motors.id', '=', 'invoices.motor_id')
            ->where('user_id', auth()->user()->id)
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
            ]);

        return view('beranda.order', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //Join tabel invoice, motor, dan user
        // $result = Invoice::join('motors', 'motors.id', '=', 'invoices.motor_id')
        //     ->where('invoices.id', $invoice->id)
        //     ->get([
        //         'invoices.id',
        //         'invoices.invoice_id',
        //         'invoices.user_id',
        //         'invoices.motor_id',
        //         'invoices.rent_date',
        //         'invoices.return_date',
        //         'invoices.total_price',
        //         'invoices.payment_status',
        //         'invoices.payment_proof',
        //         'motors.nama_motor',
        //         'motors.tipe_motor',
        //         'motors.gambar_motor',
        //     ])
        //     ->first();

            $result = Invoice::join('motors', 'motors.id', '=', 'invoices.motor_id')
            ->join('users', 'users.id', '=', 'invoices.user_id')
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
            ])
            ->first();

        return view('beranda.payment', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //Menghapus invoice berdasarkan Id
        Invoice::destroy($invoice->id)
            ? session()->flash('success', 'Invoice berhasil dihapus!')
            : session()->flash('error', 'Invoice gagal dihapus!');
        //Menghapus rent logs berdasarkan id Invoice
        RentLog::where('invoice_id', $invoice->id)->delete();
        // RentLog::where('return_date', $invoice->return_date)
        //     ->where('rent_date', $invoice->rent_date)
        //     ->where('motor_id', $invoice->motor_id)
        //     ->where('user_id', $invoice->user_id)
        //     ->delete();
        // Return to /order/{invoice} and next to /order
        return back();
    }

    /**
     * Mengunggah bukti pembayaran
     */
    public function upload(Request $request, Invoice $invoice)
    {
        // Validasi file image, lalu menyimpannya pada storage/payment-images, lalu bah payment_status menyadi waiting
        $validateData = $request->validate([
            'payment_proof' => 'image|file|max:4096',
        ]);

        $validateData['payment_proof'] = $request->file('payment_proof')->store('payment-images');
        $validateData['payment_status'] = 'waiting';
        if ($validateData) {
            //Mengupdate invoice berdasarkan Id
            Invoice::where('id', $invoice->id)->update($validateData);
        }
        // Kembali ke halaman order
        return redirect()->route('order');
    }
}

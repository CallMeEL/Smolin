<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Motor;
use App\Models\RentLog;

class InvoiceController extends Controller
{
    /**
     * Menampilkan Invoice dari User.
     */
    public function index()
    {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
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
        //Menghapus rent logs berdasarkan return_date rent_date motor_id dan user_id yang sama dengan Invoice
        RentLog::where('return_date', $invoice->return_date)
            ->where('rent_date', $invoice->rent_date)
            ->where('motor_id', $invoice->motor_id)
            ->where('user_id', $invoice->user_id)
            ->delete();
        // Return to /order/{invoice} and next to /order
        return back();
    }
}

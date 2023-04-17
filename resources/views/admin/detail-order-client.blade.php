@extends('admin.layout')
@section('title', 'Detail Client Order')
@section('menuOrderAdmin', 'active')

@section('content')

{{-- Header Client Order --}}
<div class="container">
    <div class="row">
        <div class="col-sm-1 my-4">
            <a href="{{ route('admin.order') }}" class="btn btn-warning">
                <i class="bi bi-arrow-90deg-left"></i>
            </a>
        </div>
        <div class="col-sm-11 my-4">
            <h3 class="text-capitalize text-center">Detail Client Order Smolin
            </h3>
        </div>

        <hr>

    </div>

    {{-- Detail Isi Invoice --}}
    <div class="row content-justify-center">
    <div class="col-2"></div>
    <div class="col-8">

    <div class="card mb-5">
        <div class="card-header">
            <h3 class="text-capitalize text-center">{{ $invoices->invoice_id }}</h3>
        </div>
        <div class="card-body">

            {{-- Detail User --}}
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="text-capitalize">Detail User</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th class="col-sm-6" scope="row">Nama</th>
                            <td>: {{ $invoices->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">No. Telepon</th>
                            <td>: {{ $invoices->phone_number }}</td>
                        </tr>
                        <tr>
                            <th scope="row">No. KTP</th>
                            <td>: {{ $invoices->no_ktp }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <hr>

            {{-- Detail Motor --}}
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="text-capitalize">Detail Motor</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th class="col-sm-6" scope="row">Nama Motor</th>
                            <td>: {{ $invoices->nama_motor }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Transmisi</th>
                            <td>: {{ $invoices->tipe_motor }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Harga Sewa</th>
                            <td>: Rp. {{ number_format($invoices->harga_motor, 2) }}/hari</td>
                        </tr>
                        {{-- Gambar Motor --}}
                        <tr>
                            <th scope="row">Gambar Motor
                                <br>
                                <br>
                                <img src="{{ asset('storage/' . $invoices->gambar_motor) }}" alt="gambar motor"
                                    width="100px" style="aspect-ratio: 1/1" class="mx-4">
                            </th>
                            <td>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <hr>

            {{-- Detail Transaksi --}}
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="text-capitalize">Detail Transaksi</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th class="col-sm-6" scope="row">Tanggal Sewa</th>
                            <td>: {{ date('d-m-Y', strtotime($invoices->rent_date)) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal Kembali</th>
                            <td>: {{ date('d-m-Y', strtotime($invoices->return_date)) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Total Harga</th>
                            <td>: Rp. {{ number_format($invoices->total_price, 2) }}</td>
                        </tr>
                        {{-- Gambar Bukti Pembayaran --}}
                        <tr>
                            <th scope="row">Bukti Pembayaran
                                <br>
                                <br>
                                <img src="{{ asset('storage/' . $invoices->payment_proof) }}" alt="gambar motor"
                                    width="100px" class="mx-4">
                            </th>
                            <td>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <form action="{{ route('admin.confirm', $invoices->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success float-right btn-block mb-2"><strong>Konfirmasi Pembayaran</strong></button>
                    </div>
                </form>
                {{-- Tidak di Confirm, maka foto dihapus --}}
                <form action="{{ route('admin.reject', $invoices->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="oldPaymentProof" value="{{ $invoices->payment_proof }}">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger float-right btn-block"><strong>Tolak Pembayaran</strong></button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    </div>
    </div>

</div>

@endsection


@extends('beranda.layout')
@section('title', 'Order Smolin')
@section('menuOrder', 'active')

@section('content')
<link rel="stylesheet" href="{{ 'assets/order-menu.css' }}">

<div class="container-fluid banner-auth">
    {{-- Alert --}}
    @if (session('success'))
        <div class="alert bg-success text-white alert-dismissible my-2 fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('error'))
        <div class="alert bg-danger text-white alert-dismissible my-2 fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <br>
    <h2 class="text-center"><strong>Your Invoices goes here~</strong></h2>
</div>

<div class="container-fluid p-5 bannercolor">

        @foreach ($invoices as $invoice)

        <div class="row my-2 text-white content-justify-center">
            <div class="col-md-1"></div>

            {{-- Informasi mengenai Invoice --}}
            <div class="col-md-10 align-items-center transparent-form-profile border-grey border-rounded">
                <div class="row">
                    {{-- Gambar Motor --}}
                    <div class="col-md-3">
                        <img class="img-ratio-1-1 my-2 border-rounded" src="{{ asset('storage/' . $invoice->gambar_motor) }}" alt="">
                    </div>

                    {{-- Informasi Invoice --}}
                    <div class="col-md-7">
                        <h1>{{ $invoice->invoice_id }}</h1>
                        <hr>
                        <h4><strong>{{ $invoice->nama_motor }}</strong></h4>
                        <p>Tgl Sewa : <strong>{{ date('d-m-Y', strtotime($invoice->rent_date)) }}</strong> hingga <strong>{{ date('d-m-Y', strtotime($invoice->return_date)) }}</strong></p>
                        <p>Total : <strong>Rp. {{ number_format($invoice->total_price, 2) }}</strong></p>
                        <p>Transmisi : <strong>{{ $invoice->tipe_motor }}</strong></p>
                    </div>

                    {{-- Tombol Pembayaran, Pembatalan, Tanda Lunas--}}
                    <div class="col-md-2 d-flex align-items-center">
                        <div class="container-fluid d-grid gap-3">
                            <a href="" class="btn btn-primary btn-block"><strong>Pay</strong></a>
                            <button type="button" class="btn btn-danger btn-block" data-bs-toggle="modal" data-bs-target="#{{ $invoice->invoice_id }}"><strong>Cancel</strong></button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="modal" id="{{ $invoice->invoice_id }}">
            <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">{{ $invoice->nama_motor }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                Apakah anda yakin untuk membatalkan?
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                <form action="{{ route('order.destroy', $invoice->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </form>
                </div>

            </div>
            </div>
        </div>

        @endforeach


</div>


@endsection

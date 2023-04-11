@extends('beranda.layout')
@section('title', 'Home Smolin')
@section('menuHome', 'active')


@section('content')

    @auth
        {{-- Tampilan Home User --}}

        <link rel="stylesheet" href="{{ 'assets/home-user.css' }}">

        <div class="container-fluid banner-auth">
            {{-- Alert --}}
            @if (session('success'))
                <div class="alert bg-warning text-white alert-dismissible my-2 fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <br>
            <h2 class="text-center"><strong>Silahkan Pilih Motor yang Anda Butuhkan</strong></h2>
        </div>

        <div class="container-fluid">
            <div class="row bannercolor d-flex content-justify-center text-white">

                <div class="col-2"></div>

                <div class="col-8 my-5 transparent-form-profile border-grey border-rounded">
                    <div class="form-floating mb-3 mt-3">

                        <form method="" action="">
                            @csrf
                            <div class="row">

                                {{-- Nama Kendaraan --}}
                                <div class="col-6">
                                    <h4>Nama Kendaraan</h4>

                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="nama_motor" placeholder="Nama Kendaraan"
                                            aria-label="Nama Kendaraan" aria-describedby="basic-addon1">
                                    </div>

                                </div>

                                {{-- Transmisi --}}
                                <div class="col-6">
                                    <h4>Transmisi</h4>

                                    <div class="input-group mb-3">
                                        <select class="form-select" id="tipe_motor">
                                            <option selected>--Pilih--</option>
                                            <option value="Bebek">Bebek</option>
                                            <option value="Matic">Matic</option>
                                            <option value="Kopling">Kopling</option>
                                        </select>
                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                {{-- Harga Kisaran --}}
                                <h4>Harga Kisaran</h4>
                                <div class="col-6">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        <input type="text" class="form-control" id="harga_rendah" placeholder="Harga Min"
                                            aria-label="Harga Min" aria-describedby="basic-addon1">
                                    </div>

                                </div>
                                <div class="col-6">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        <input type="text" class="form-control" id="harga_tinggi" placeholder="Harga Max"
                                            aria-label="Harga Max" aria-describedby="basic-addon1">
                                    </div>

                                </div>

                            </div>

                            <p><input type="submit" class="btn colorpink button-press-pink text-white btn-block" name="submit"
                                    value="Search"></p>

                        </form>
                    </div>
                </div>

                <div class="col-2"></div>

                <div class="row my-5">

                    @forelse ($motors as $motor)
                        <div class="col-2 mx-2">
                            <div class="card transparent-form-profile border-grey border-rounded">
                                <img src="{{ asset('storage/' . $motor->gambar_motor) }}" class="card-img-top">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $motor->nama_motor }}</h3>
                                    <p class="card-text">Transmisi: <br> <strong>{{ $motor->tipe_motor }}</strong><br>Harga
                                        Sewa: <br> <strong>Rp. {{ number_format($motor->harga_motor, 2) }} </strong>/hari</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('motor.show', $motor->id) }}"
                                        class="btn colorpink button-press-pink text-white btn-block">Sewa</a>
                                </div>
                            </div>
                        </div>

                    @empty

                        <div class="col-md-12 m-1 transparent-form-profile border-grey border-rounded">
                            <p class="text-center m-2">Tidak ada Data...</p>
                        </div>
                    @endforelse

                </div>

            </div>
        </div>
    @else
    @endauth

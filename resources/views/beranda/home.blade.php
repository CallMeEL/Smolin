@extends('beranda.layout')
@section('title', 'Home Smolin')
@section('menuHome', 'active')


@section('content')

@auth
{{-- Tampilan Home User --}}

<link rel="stylesheet" href="{{ ('assets/home-user.css') }}">

<div class="container-fluid banner-auth">
    <h2 class="text-center"><strong>Silahkan Pilih Motor yang Anda Butuhkan</strong></h2>
</div>

<div class="container-fluid">
<div class="row bg-dark d-flex content-justify-center text-white">

    <div class="col-2"></div>

    <div class="col-8 my-5 transparent-form-profile border-grey border-rounded">
        <div class="form-floating mb-3 mt-3">

                <form method="post" action="">
                    @csrf
                        <div class="row">

                            {{-- Nama Kendaraan --}}
                            <div class="col-6">
                                <h4>Nama Kendaraan</h4>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nama Kendaraan" aria-label="Nama Kendaraan" aria-describedby="basic-addon1">
                                </div>

                            </div>

                            {{-- Transmisi --}}
                            <div class="col-6">
                                <h4>Transmisi</h4>

                                <div class="input-group mb-3">
                                    <select class="form-select" id="inputGroupSelect01">
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
                                    <input type="text" class="form-control" placeholder="Harga Min" aria-label="Harga Min" aria-describedby="basic-addon1">
                                </div>

                            </div>
                            <div class="col-6">

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="text" class="form-control" placeholder="Harga Max" aria-label="Harga Max" aria-describedby="basic-addon1">
                                </div>

                            </div>

                        </div>

                    <p><input type="submit" class="btn colorpink button-press-pink text-white btn-block" name="submit" value="Search"></p>

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
                    <p class="card-text">Transmisi: <br> <strong>{{ $motor->tipe_motor }}</strong><br>Harga Sewa: <br> <strong>Rp. {{ $motor->harga_motor }} /hari</strong></p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('motor.show', $motor->id) }}" class="btn colorpink button-press-pink text-white btn-block">Sewa</a>
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

{{-- Tampilan Home Guest --}}

<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-7">
        <h1 class="mb-2 text-white" style="font-size: 55px"><strong>Kemudahan berkeliling</strong></h1>
        <h1 class="mb-2 text-white" style="font-size: 55px"><strong>dengan Smolin!</strong></h1>
        <br>
        <br>
        <div class="row text-center">
            <div class="col-sm-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#3EC1C9"
                    class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                    <path
                        d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                </svg>
                <h4>Terpercaya</h4>
            </div>
            <div class="col-sm-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#FC5285" class="bi bi-heart-fill"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                </svg>
                <h4>Praktis</h4>
            </div>
            <div class="col-sm-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#FBE205" class="bi bi-cash"
                    viewBox="0 0 16 16">
                    <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                    <path
                        d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                </svg>
                <h4>Murah</h4>
            </div>
        </div>
        <br>
        <br>
        <br>
        <a href="/login">
            <button type="button" class="btn btn-info btn-lg text-white">
                <strong>Sewa Sekarang!</strong>
            </button>
        </a>
    </div>
    <div class="col-md-3">
        <img style="width: 100%" src="{{ ('img/motor_header.png') }}" alt="">
    </div>
</div>

@endauth



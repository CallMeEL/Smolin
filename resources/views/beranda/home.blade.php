@extends('beranda.layout')
@section('title', 'Home Smolin')
@section('menuHome', 'active')


@section('content')
<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-7">
        <h1 class="mb-2 display-2 text-white"><strong>Kemudahan berkeliling</strong></h1>
        <br>
        <h1 class="mb-2 display-2 text-white"><strong>dengan Smolin!</strong></h1>
        <br>
        <br>
        <a href="#layanan">
            <button type="button" class="btn btn-info btn-lg text-white">
            <strong>Sewa Sekarang!</strong>
            </button>
        </a>
    </div>
    <div class="col-md-3">
        <img style="width: 250px" src="{{ ('img/motor_header.png') }}" alt="">
    </div>
</div>
@endsection
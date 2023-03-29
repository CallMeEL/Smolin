@extends('admin.layout')
@section('title', 'Add Motor')
@section('menuCreateMotor', 'active')

@section('content')

<div class="container">

{{-- Alert --}}
@if (session('success'))
    <div class="alert bg-success text-white alert-dismissible my-2 fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Form Tambah Motor --}}
<form action="{{ route('motor.store') }}" method="post" enctype="multipart/form-data">

    @csrf
    <div class="card my-3">

        <div class="card-header">
            <h3 class="card-title">Tambah Motor</h3>
        </div>

        <div class="card-body">

            <div class="row">

                {{-- Nama Motor --}}
                <div class="col-6">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control @error('nama-motor') is-invalid @enderror" id="nama_motor" placeholder="Nama Motor" name="nama_motor" autofocus required value="{{ old('nama_motor') }}">
                        <label for="nama_motor">Nama Motor</label>
                        {{-- Error Message --}}
                        @error('nama_motor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Tipe Motor --}}
                <div class="col-6">
                    <div class="form-floating mb-3 mt-3">
                        <select class="form-control @error('tipe_motor') is-invalid @enderror" name="tipe_motor" id="tipe_motor" value="{{ old('tipe_motor') }}">
                            <option value="">--Pilih--</option>
                            <option value="Bebek">Bebek</option>
                            <option value="Matic">Matic</option>
                            <option value="Kopling">Kopling</option>
                        </select>
                        <label for="tipe_motor">Tipe Motor</label>
                        {{-- Error Message --}}
                        @error('tipe_motor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- Harga Sewa --}}
            <div class="row">
                <div class="col-8">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control @error('harga_motor') is-invalid @enderror" id="harga_motor" placeholder="Harga Sewa" name="harga_motor" required value="{{ old('harga_motor') }}">
                        <label for="harga_motor">Harga Sewa/hari</label>
                        {{-- Error Message --}}
                        @error('harga_motor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Gambar --}}
            <div class="row">
                <div class="col-8">
                    <div class="mb-3 mt-3">
                        <label for="gambar_motor" >Gambar Motor :</label>
                        <input type="file" class="form-control" id="gambar_motor" placeholder="Gambar Motor" name="gambar_motor" accept="image/gif, image/jpeg, image/png" required>
                        {{-- Error Message --}}
                        @error('gambar_motor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

        </div>

        <div class="card-footer">

            {{-- Button --}}
            <div class="mb-3 mt-3 justify-content-left">
                <button class="btn btn-primary me-md-2" type="submit">Tambah</button>
                <button class="btn btn-warning" type="reset">Reset</button>
            </div>

        </div>

    </div>


</form>

</div>

@endsection

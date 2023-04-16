@extends('admin.layout')
@section('title', 'Motor Edit')
@section('menuTableMotor', 'active')

<head>
    {{-- Javascript --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
</head>

@section('content')

<div class="container">

{{-- Form Tambah Motor --}}
<form action="{{ route('motor.update', $result->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="card my-3">

        <div class="card-header">
            <h3 class="card-title">Edit Motor {{ $result->nama_motor }}</h3>
        </div>

        <div class="card-body">

            <div class="row">

                {{-- Nama Motor --}}
                <div class="col-6">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control @error('nama-motor') is-invalid @enderror" id="nama_motor" placeholder="Nama Motor" name="nama_motor"
                        autofocus required value="{{ old('nama_motor', $result->nama_motor) }}">
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
                        <select class="form-control @error('tipe_motor') is-invalid @enderror" name="tipe_motor" id="tipe_motor">
                            <option value="">--Pilih--</option>
                            <option value="Bebek" {{ old('tipe_motor', $result->tipe_motor) == 'Bebek' ? 'selected' : '' }}>Bebek</option>
                            <option value="Matic" {{ old('tipe_motor', $result->tipe_motor) == 'Matic' ? 'selected' : '' }}>Matic</option>
                            <option value="Kopling" {{ old('tipe_motor', $result->tipe_motor) == 'Kopling' ? 'selected' : '' }}>Kopling</option>
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
                        <input type="text" class="form-control @error('harga_motor') is-invalid @enderror" id="harga_motor" placeholder="Harga Sewa" name="harga_motor"
                        required value="{{ old('harga_motor', $result->harga_motor) }}">
                        <label for="harga_motor">Harga Sewa/hari</label>
                        {{-- Error Message --}}
                        @error('harga_motor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Gambar Motor --}}
            <div class="row">
                <div class="col-8">
                    <div class="form-floating mb-3 mt-3">
                        <label for="gambar_motor">Gambar Motor:</label><br>
                        <input type="hidden" name="oldMotorImage" value="{{ $result->gambar_motor }}">

                        @if ($result->gambar_motor)
                            <img src="{{ asset('storage/' . $result->gambar_motor) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif

                        <input type="file" class="form-control @error('gambar_motor') is-invalid @enderror" id="gambar_motor" placeholder="Gambar Motor" name="gambar_motor"
                         onchange="previewImage()">
                        {{-- Error Message --}}
                        @error('gambar_motor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

        </div>

        <div class="card-footer">

            {{-- Button --}}
            <div class="mb-3 mt-3 justify-content-left">
                <button class="btn btn-primary me-md-2" type="submit">Update</button>
                <a href="{{ route('motor.table') }}" class="btn btn-danger">Cancel</a>
            </div>

        </div>

    </div>


</form>

</div>


@endsection
<script>
    function previewImage() {
        const image = document.querySelector('#gambar_motor');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        };
    }
</script>

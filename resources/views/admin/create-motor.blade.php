@extends('admin.layout')
@section('title', 'Add Motor')
@section('menuCreateMotor', 'active')

@section('content')

<div class="container">

{{-- Form Tambah Motor --}}
<form action="#" method="post">

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
                        <input type="text" class="form-control" id="nama_motor" placeholder="Nama Motor" name="nama_motor" autofocus required>
                        <label for="nama_motor">Nama Motor</label>
                    </div>
                </div>

                {{-- Tipe Motor --}}
                <div class="col-6">
                    <div class="form-floating mb-3 mt-3">
                        <select class="form-control" name="tipe_motor" id="tipe_motor">
                            <option value="">--Pilih--</option>
                            <option value="Bebek">Bebek</option>
                            <option value="Matic">Matic</option>
                            <option value="Kopling">Kopling</option>
                        </select>
                        <label for="tipe_motor">Tipe Motor</label>
                    </div>
                </div>

            </div>

            {{-- Harga Sewa --}}
            <div class="row">
                <div class="col-8">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="harga_motor" placeholder="Harga Sewa" name="harga_motor" required>
                        <label for="Harga_motor">Harga Sewa</label>
                    </div>
                </div>
            </div>

            {{-- Gambar --}}
            <div class="row">
                <div class="col-8">
                    <div class="mb-3 mt-3">
                        <label for="gambar_motor" >Gambar Motor :</label>
                        <input type="file" class="form-control" id="gambar_motor" placeholder="Gambar Motor" name="gambar_motor" accept="image/gif, image/jpeg, image/png" required>
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

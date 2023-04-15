@extends('admin.layout')
@section('title', 'Table Motor')
@section('menuTableMotor', 'active')

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

@section('content')

<div class="container">

    {{-- Data Motor --}}

    <div class="row mt-5">
        <div class="col-md-12">
            <h3 class="text-capitalize">Data Motor</h3>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <table id="tabel_motor" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Motor</th>
                        <th scope="col">Transmisi</th>
                        <th scope="col">Harga (Harian)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($motorDatas as $m)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $m->nama_motor }}</td>
                            <td>{{ $m->tipe_motor }}</td>
                            <td>Rp. {{ number_format($m->harga_motor, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
<script>
    $(document).ready( function () {
        $('#tabel_motor').DataTable();
    } );
</script>

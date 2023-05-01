@extends('admin.layout')
@section('title', 'Daftar Pengguna')
@section('menuUserTable', 'active')

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12 mt-4">
            <h3 class="text-capitalize">Daftar Pengguna</h3>
        </div>
    </div>

    <hr>

    {{-- Table User --}}

    <div class="card">
        <div class="card-body">

            <div class="row mt-3">
                <div class="col-md-12">
                    <table id="tabel_user" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Pengguna</th>
                                <th scope="col">Email</th>
                                <th scope="col">No. HP</th>
                                <th scope="col">No. KTP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $u)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->phone_number }}</td>
                                    <td>{{ $u->no_ktp }}</td>
                                </tr>
                            @empty

                            @endforelse
                    </table>
                </div>
            </div>

        </div>
    </div>


</div>

@endsection

<script>
    $(document).ready( function () {
        $('#tabel_user').DataTable();
    } );
</script>


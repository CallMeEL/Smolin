@extends('admin.layout')
@section('title', 'Pengembalian Motor')
@section('menuReturn', 'active')

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

@section('content')

<div class="container">

    {{-- Header Return Motor --}}
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-4">
                <h3 class="text-capitalize text-center">Cek Pengembalian Motor</h3>
            </div>
        </div>
    </div>

    <hr>

    {{-- Table Return Motor --}}
    <div class="card">
        <div class="card-body">

            <div class="container">
                <div class="row">
                    <div class="col-sm-12 mt-4">
                        <table class="table table-striped table-bordered" id="returnTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Peminjam</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Nama Motor</th>
                                    <th scope="col">Tanggal Pinjam</th>
                                    <th scope="col">Tanggal Kembali</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Return</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $i)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $i->name }}</td>
                                        <td>{{ $i->phone_number }}</td>
                                        <td>{{ $i->nama_motor }}</td>
                                        <td>{{ $i->rent_date }}</td>
                                        <td>{{ $i->return_date }}</td>
                                        <td>
                                            {{-- Jika unavailable maka muncul tanda dipinjam --}}
                                            @if ($i->status == 'unavailable')
                                                <span class="badge bg-danger">Belum Kembali</span>
                                            @else
                                                <span class="badge bg-success">Tersedia</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#{{ $i->id }}"><i class="bi bi-arrow-left-right"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection

{{-- Modal Apakah Motor Sudah Kembali --}}
@foreach ($invoices as $modal)

<div class="modal fade" id="{{ $modal->id }}">
    <div class="modal-dialog">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Motor : {{ $modal->nama_motor }}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            Apakah motor sudah kembali?
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <form action="{{ route('admin.update.return', $modal->id) }}" method="POST">
                @method('PUT')
                @csrf
                <button type="submit" class="btn btn-success">Sudah Kembali</button>
            </form>
        </div>

    </div>
    </div>
</div>

@endforeach


<script>
    $(document).ready( function () {
        $('#returnTable').DataTable();
    } );
</script>

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
    {{-- Alert --}}
    @if (session('success'))
    <div class="alert bg-success text-white alert-dismissible my-2 fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- Data Motor --}}

    <div class="row">
        <div class="col-md-12 mt-4">
            <h3 class="text-capitalize">Data Motor</h3>
        </div>
    </div>

    <hr>

    <div class="row mt-3">
        <div class="col-md-12">
            <table id="tabel_motor" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Motor</th>
                        <th scope="col">Transmisi</th>
                        <th scope="col">Harga (Harian)</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Edit</th>
                        <th scope="col" class="text-center">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($motorDatas as $m)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $m->nama_motor }}</td>
                            <td>{{ $m->tipe_motor }}</td>
                            <td>Rp. {{ number_format($m->harga_motor, 2) }}</td>
                            <td>
                                @if ($m->status == 'available')
                                    Available <i class="bi bi-check-circle-fill text-success"></i>
                                @else
                                    Unavailable <i class="bi bi-x-circle-fill text-danger"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('motor.edit', $m->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                            </td>
                            <td class="text-center">
                                {{-- <form action="{{ route('motor.destroy', $m->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form> --}}
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#{{ $m->id }}"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@forelse ($motorDatas as $m)

{{-- Modal for Delete --}}
<div class="modal" id="{{ $m->id }}">
    <div class="modal-dialog">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">{{ $m->nama_motor }}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            Apakah anda yakin untuk menghapus?
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
        <form action="{{ route('motor.destroy', $m->id) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
        </form>
        </div>

    </div>
    </div>
</div>

@empty

@endforelse

@endsection
<script>
    $(document).ready( function () {
        $('#tabel_motor').DataTable();
    } );
</script>

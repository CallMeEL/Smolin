@extends('admin.layout')
@section('title', 'Client Order')
@section('menuOrderAdmin', 'active')

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

@section('content')

    {{-- Alert --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Header Client Order --}}
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-4">
                <h3 class="text-capitalize text-center">Client Order Smolin</h3>
            </div>
        </div>
    </div>

    <hr>

    {{-- Table Invoice --}}

    <div class="row">
        <div class="col-sm-12">
            <table id="table_invoice" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No. Telp</th>
                        <th scope="col">Motor</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Bukti Pembayaran</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $inv)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $inv->name }}</td>
                            <td>{{ $inv->phone_number }}</td>
                            <td>{{ $inv->nama_motor }}</td>
                            <td>{{ date('d-m-Y', strtotime($inv->rent_date)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($inv->return_date)) }}</td>
                            <td>Rp. {{ number_format($inv->total_price, 2) }}</td>
                            <td>
                                {{-- Jika bukti pembayaran !null maka ada icon jam, dan jika null maka icon silang --}}
                                @if ($inv->payment_proof != null)
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                @else
                                    <i class="bi bi-x-circle-fill text-danger"></i>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.detail-order', $inv->id) }}" class="btn btn-sm btn-primary
                                    @if ($inv->payment_proof != null)
                                    @else
                                        disabled
                                    @endif">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>

@endsection
<script>
    $(document).ready(function() {
        $('#table_invoice').DataTable();
    });
</script>

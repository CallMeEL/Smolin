@extends('admin.layout')
@section('title', 'Pengembalian Motor')
@section('menuReturn', 'active')

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

@section('content')

    {{-- Header Return Motor --}}
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-4">
                <h3 class="text-capitalize text-center">Cek Pengembalian Motor</h3>
            </div>
        </div>
    </div>

@endsection
<script>
    $(document).ready( function () {
        $('').DataTable();
    } );
</script>

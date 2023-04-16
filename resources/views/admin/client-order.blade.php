@extends('admin.layout')
@section('title', 'Client Order')
@section('menuOrderAdmin', 'active')

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

@section('content')

    {{-- Header Client Order --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h3 class="text-capitalize text-center">Client Order Smolin</h3>
            </div>
        </div>
    </div>

    <hr>

    {{-- Table Client Order --}}

@endsection
<script>
    $(document).ready(function() {
        $('#table_invoice').DataTable();
    });
</script>

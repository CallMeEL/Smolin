@extends('admin.layout')
@section('title', 'Admin Dashboard')
@section('menuDashboard', 'active')

@section('content')

    <div class="container">
        {{-- Header --}}
        <div class="row">
            <div class="col-md-12 m-2">

                <h3 class="text-capitalize">Selamat Datang, {{ auth()->user()->name }}</h3>

            </div>
        </div>
        {{-- Card Info --}}
        <div class="row justify-content-center">

            <div class="col-sm-4">
                <div class="card bg-primary text-white">
                    <div class="card-body text-end">
                        <div class="row">

                            <div class="col-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                    class="bi bi-bicycle" viewBox="0 0 16 16">
                                    <path
                                        d="M4 4.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1v.5h4.14l.386-1.158A.5.5 0 0 1 11 4h1a.5.5 0 0 1 0 1h-.64l-.311.935.807 1.29a3 3 0 1 1-.848.53l-.508-.812-2.076 3.322A.5.5 0 0 1 8 10.5H5.959a3 3 0 1 1-1.815-3.274L5 5.856V5h-.5a.5.5 0 0 1-.5-.5zm1.5 2.443-.508.814c.5.444.85 1.054.967 1.743h1.139L5.5 6.943zM8 9.057 9.598 6.5H6.402L8 9.057zM4.937 9.5a1.997 1.997 0 0 0-.487-.877l-.548.877h1.035zM3.603 8.092A2 2 0 1 0 4.937 10.5H3a.5.5 0 0 1-.424-.765l1.027-1.643zm7.947.53a2 2 0 1 0 .848-.53l1.026 1.643a.5.5 0 1 1-.848.53L11.55 8.623z" />
                                </svg>
                            </div>

                            <div class="col-8">
                                <h4 class="card-title">Jumlah Motor</h4>
                                <p class="card-text">{{ $totalMotor }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card bg-success text-white">
                    <div class="card-body text-end">
                        <div class="row">

                            <div class="col-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                    class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                </svg>
                            </div>

                            <div class="col-8">
                                <h4 class="card-title">Pengguna</h4>
                                <p class="card-text">{{ $totalUser }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card bg-warning">
                    <div class="card-body text-end">
                        <div class="row">

                            <div class="col-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                    class="bi bi-dash-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                </svg>
                            </div>

                            <div class="col-8">
                                <h4 class="card-title">Motor Disewa</h4>
                                <p class="card-text">{{ $totalSewa }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>


@endsection

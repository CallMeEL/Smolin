<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Motor {{ $result->nama_motor }}</title>
    <link rel="stylesheet" href="{{ asset('assets/beranda.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body class="banner-auth">

    <!-- Navbar -->
    <nav class="navbar fixed-top blur navbar-expand-lg shadow-5-strong">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <strong class="text-white">Smolin</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav navbar-right ms-auto mb-2 mb-lg-0">

                    @auth
                        {{-- Menu Admin --}}
                        @can('admin')
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('admin') }}">Admin</a>
                            </li>
                        @endcan
                        {{-- Menu Home --}}
                        <li class="nav-item">
                            <a class="nav-link text-white @yield('menuHome')" aria-current="page"
                                href="{{ route('home') }}">Home</a>
                        </li>
                        {{-- Menu Order --}}
                        <li class="nav-item">
                            <a class="nav-link text-white @yield('menuOrder')" aria-current="page" href="{{ route('order') }}">Order</a>
                        </li>
                        {{-- Menu Profile --}}
                        <li class="nav-item">
                            <a class="nav-link text-white @yield('menuProfile')" aria-current="page" href="/profile">Profile</a>
                        </li>
                        {{-- Menu Contact --}}
                        <li class="nav-item">
                            <a class="nav-link text-white @yield('menuContact')" aria-current="page" href="#">Contact</a>
                        </li>
                        {{-- Tombol Logout --}}
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn alert-transparent-background text-white">Logout</button>
                            </form>
                        </li>

                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row align-items-center">

            {{-- Alert --}}
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible my-2 show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card transparent-form-profile border-grey border-rounded">
                <div class="card-header">
                    {{-- Gambar Motor --}}
                    <h1 class="card-title">
                        <img src="{{ asset('storage/' . $result->gambar_motor) }}" alt="gambar motor"
                            class="border-rounded" style="width: 125px">
                        <strong>{{ $result->nama_motor }}</strong>
                    </h1>
                </div>
                <div class="card-body">
                    {{-- Transmisi --}}
                    <h3 class="card-title">
                        Transmisi : <strong>{{ $result->tipe_motor }}</strong>
                    </h3>
                    {{-- Harga --}}
                    <h3 class="card-title">
                        Harga : <strong>{{ number_format($result->harga_motor, 2) }} /hari</strong>
                    </h3>
                </div>
                <div class="card-footer">
                    {{-- Tombol Sewa --}}
                    <form action="" method="POST">
                        @csrf
                        {{-- Tanggal Sewa dan Tanggal Kembali --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="rent_date" placeholder="Tanggal Sewa"
                                        name="rent_date" value="{{ date('Y-m-d') }}">
                                    <label for="rent_date">Tanggal Sewa</label>
                                </div>
                                {{-- Error Message --}}
                                @error('rent_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="return_date"
                                        placeholder="Tanggal Kembali" name="return_date" value="{{ date('Y-m-d') }}">
                                    <label for="return_date">Tanggal Kembali</label>
                                </div>
                                {{-- Error Message --}}
                                @error('return_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="card-footer d-flex content-justify-center">
                                <div class="col-1"></div>
                                <a href="{{ route('home') }}" class="btn btn-danger col-4"><strong>Kembali</strong></a>
                                <div class="col-2"></div>
                                <button type="submit" class="btn btn-success col-4"><strong>Sewa</strong></button>
                                <div class="col-1"></div>
                            </div>
                    </form>
                </div>

            </div>

        </div>

</body>
<footer class="container-fluid text-center pt-5 pb-5">
    All Rights Reserved &copy; 2023
</footer>

</html>

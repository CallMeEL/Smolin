<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ url('assets/admin-menu.css') }}">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="#"><strong>Smolin</strong></a>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            {{-- Logout --}}
            <li class="nav-item">
                <a class="btn text-white" href="/"><strong>Home</strong></a>
            </li>
            <li class="nav-item">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger text-white"><strong>Logout</strong></button>
                </form>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <h3 class="text-center text-white">Menu Admin</h3>

                        <div class="sb-sidenav-menu-heading">Menu</div>

                        <a class="nav-link @yield('menuDashboard')" href="{{ route('admin') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link @yield('menuOrderAdmin')" href="{{ route('admin.order') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-cash-stack"></i></div>
                            Client Order
                        </a>

                        <a class="nav-link @yield('menuReturn')" href="{{ route('admin.return') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-stack"></i></div>
                            Return Motor
                        </a>

                        <div class="sb-sidenav-menu-heading">Vehicle</div>

                        <a class="nav-link @yield('menuCreateMotor')" href="{{ route('motor') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-plus-circle-fill"></i></div>
                            Tambah Motor
                        </a>

                        <a class="nav-link @yield('menuTableMotor')" href="{{ route('motor.table') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-table"></i></div>
                            Data Motor
                        </a>

                    </div>
                </div>

                {{-- Login Admin Information --}}
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{ auth()->user()->name }}
                </div>

            </nav>
        </div>

        <div id="layoutSidenav_content" style="background-color: rgb(235, 235, 235)">
            <main>

                @yield('content')

            </main>

        </div>
    </div>
</body>
</html>

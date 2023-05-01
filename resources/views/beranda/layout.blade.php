<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ url('img/icon.png') }}" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ 'assets/beranda.css' }}">
</head>

<body>
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
                            <a class="nav-link text-white @yield('menuOrder')" aria-current="page"
                                href="{{ route('order') }}">Order</a>
                        </li>
                        {{-- Menu Profile --}}
                        <li class="nav-item">
                            <a class="nav-link text-white @yield('menuProfile')" aria-current="page" href="/profile">Profile</a>
                        </li>
                        {{-- Menu Contact --}}
                        <li class="nav-item">
                            <a class="nav-link text-white @yield('menuContact')" aria-current="page" href="#contact">Contact</a>
                        </li>
                        {{-- Tombol Logout --}}
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn alert-transparent-background text-white">Logout</button>
                            </form>
                        </li>
                    @else
                        {{-- Menu Home --}}
                        <li class="nav-item">
                            <a class="nav-link text-white @yield('menuHome')" aria-current="page"
                                href="{{ route('home') }}">Home</a>
                        </li>
                        {{-- Menu Order --}}
                        <li class="nav-item">
                            <a class="nav-link text-white @yield('menuOrder')" aria-current="page"
                                href="{{ route('order') }}">Order</a>
                        </li>
                        {{-- Menu Profile --}}
                        <li class="nav-item">
                            <a class="nav-link text-white @yield('menuProfile')" aria-current="page" href="/profile">Profile</a>
                        </li>
                        {{-- Menu Contact --}}
                        <li class="nav-item">
                            <a class="nav-link text-white @yield('menuContact')" aria-current="page" href="#contact">Contact</a>
                        </li>
                        {{-- Tombol Login --}}
                        <li class="nav-item">
                            <a class="btn transparent-background text-white" aria-current="page"
                                href="/login"><strong>Login</strong></a>
                        </li>

                    @endauth

                </ul>
            </div>
        </div>
    </nav>
    <!-- Content -->

    @auth

        @yield('content')
    @else
        <div class="container-fluid banner">
            <div class="container-fluid top">

                {{-- Tampilan Home Guest --}}

                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-7">
                        <h1 class="mb-2 text-white" style="font-size: 55px"><strong>Kemudahan berkeliling</strong></h1>
                        <h1 class="mb-2 text-white" style="font-size: 55px"><strong>dengan Smolin!</strong></h1>
                        <br>
                        <br>
                        <div class="row text-center">
                            <div class="col-sm-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#3EC1C9"
                                    class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                </svg>
                                <h4>Terpercaya</h4>
                            </div>
                            <div class="col-sm-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#FC5285"
                                    class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                </svg>
                                <h4>Praktis</h4>
                            </div>
                            <div class="col-sm-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#FBE205"
                                    class="bi bi-cash" viewBox="0 0 16 16">
                                    <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                    <path
                                        d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                                </svg>
                                <h4>Murah</h4>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <a href="/login">
                            <button type="button" class="btn btn-info btn-lg text-white">
                                <strong>Sewa Sekarang!</strong>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <img style="width: 100%" src="{{ 'img/motor_header.png' }}" alt="">
                    </div>
                </div>

            </div>
        </div>

    @endauth


    <div class="container-fluid text-white pt-5" id="contact" style="background-color: #2a2d2f">
        <div class="row d-flex justify-content-center align-items-start font-poppins pb-5">

            <div class="col-md-3">
                <div class="title">SMOLIN</div>
                <div class="box-footer-caret"></div>
                <div class="content">
                    <ul class="no-bullet-list">
                        <li>
                            <a href="" class="text-decoration-none no-bullet-list">Tentang Kami</a>
                        </li>
                        <li>
                            <a href="" class="text-decoration-none no-bullet-list">Bantuan</a>
                        </li>
                        <li>
                            <a href="" class="text-decoration-none no-bullet-list">Syarat dan Ketentuan</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="title">CONTACT</div>
                <div class="box-footer-caret"></div>
                <a href="https://wa.me/6281291829575" class="no-bullet-list">
                    <i style="font-size: 30px" class="bi bi-whatsapp"></i>
                </a>
                <div class="text-white">

                </div>
            </div>

            <div class="col-md-3">
                <div class="title">SOCIAL MEDIA</div>
                <div class="box-footer-caret"></div>
                <a href="https://www.instagram.com/roften.um/" class="no-bullet-list">
                    <i style="font-size: 30px" class="bi bi-instagram"></i>
                </a>
                <div class="text-white">

                </div>
            </div>

        </div>

        <br>

        <div class="row text-end">
            <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Made with ❤️ by PSI Group 8 Teknik Informatika B 2021</p>
        </div>
    </div>
    {{-- Footer --}}
    <footer class="container-fluid text-center text-white bg-dark pt-5 pb-5">
        All Rights Reserved &copy; 2023
    </footer>
</body>

</html>

@extends('beranda.layout')
@section('title', 'Home Smolin')
@section('menuHome', 'active')


@section('content')

    @auth
        {{-- Tampilan Home User --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ 'assets/home-user.css' }}">
        <div class="row content-justify-center">

            <div class="col-md-5 m-5 transparent-form-profile border-grey border-rounded">
                <div class="form-floating mb-3 mt-3">

                    <h4>Cari Kota Tujuan</h4>
                    <p><input type="kota" class="form-control transparent-input" id="kota" name="kota" autofocus
                            required></p>
                    <form method="post" action="#">
                        @csrf


                        <h4>Merek Kendaraan</h4>
                        <div class="form-group">
                            <select id="merek" name="merek[]" class="form-control" multiple="multiple">
                                <option value=""></option>
                                <option value="Matic">Honda</option>
                                <option value="Bebek">Yamaha</option>
                                <option value="Kopling">Kawasaki</option>
                            </select>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $("#merek").select2({
                                    placeholder: "Silahkan Pilih Merek Kendaraan"
                                });
                            });
                        </script>

                        <h4>Jenis Kendaraan</h4>
                        <div class="form-group">
                            <select id="jenis" name="jenis[]" class="form-control" multiple="multiple">
                                <option value=""></option>
                                <option value="Matic">Matic</option>
                                <option value="Bebek">Bebek</option>
                                <option value="Kopling">Kopling</option>
                            </select>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $("#jenis").select2({
                                    placeholder: "Silahkan Pilih Jenis Kendaraan"
                                });
                            });
                        </script>

                        <h4>Harga Kendaraan</h4>
                        <div class="form-group">
                            <select id="harga" name="harga[]" class="form-control" multiple="multiple">
                                <option value=""></option>
                                <option value="50k">0-50k</option>
                                <option value="100k">50k-100k</option>
                                <option value="150k">100k-150o</option>
                            </select>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $("#harga").select2({
                                    placeholder: "Silahkan Pilih Harga Kisaran Kendaraan"
                                });
                            });
                        </script>

                        <br>
                        <p><input type="submit" class="btn colorpink button-press-pink text-white btn-block" name="submit"
                                value="Cari sekarang!"></p>

                    </form>
                </div>
            </div>

            <div class="col-md-5">

                @forelse ($motors as $motor)
                    <div class="row">

                        <div class="col-md-10 m-5 transparent-form-profile border-grey border-rounded center">

                            <div class="row">

                                <div class="col-4">
                                    <img src="{{ asset('storage/' . $motor->gambar_motor) }}" class="border-rounded mt-3"
                                        style="width: 150px">
                                </div>

                                <div class="col-6 mx-2 mt-1">
                                    <h4>{{ $motor->nama_motor }}</h4>
                                    <p>Transmisi: <br> <strong>{{ $motor->tipe_motor }}</strong><br>Harga Sewa: <br> <strong>Rp.
                                            {{ $motor->harga_motor }} /hari</strong></p>
                                </div>



                            </div>
                            {{-- <div class="col-md-4 m-1 transparent-form-profile border-grey border-rounded">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-center">Pilih Tanggal</h4>
                        <form method="post" action="">{{-- {{ route('motor.show', $motor->id) }} --}}
                            {{-- @csrf
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control transparent-input" id="rent_date" name="rent-date"  required>
                                <label for="rent_date">Tanggal Mulai</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control transparent-input" id="return_date" name="return_date" required>
                                <label for="return_date">Tanggal Selesai</label>
                            </div>
                            <p><input type="submit" class="btn colorpink button-press-pink text-white btn-block"
                            name="submit" value="Booking"></p>
                        </form>
                    </div>
                </div>
            </div> --}}

                        </div>

                    @empty

                        <div class="row">

                            <div class="col-md-11 m-1 transparent-form-profile border-grey border-rounded">
                                <p class="text-center m-2">Tidak ada Data...</p>
                            </div>

                        </div>
                @endforelse

            </div>

        </div>
    @else
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#FBE205" class="bi bi-cash"
                            viewBox="0 0 16 16">
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

    @endauth



@endsection

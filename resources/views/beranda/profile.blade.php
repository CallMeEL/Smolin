@extends('beranda.layout')
@section('title', 'Profile Smolin')
@section('menuProfile', 'active')

@section('content')

<div class="container-fluid banner">
    <div class="container-fluid top">

@if (session('success'))
    <div class="alert alert-transparent-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container">
    <div class="row text-black justify-content-center align-items-center">
        <div class="col-md-8 transparent-form-profile border-grey border-rounded">
{{--Head--}}
                <br>
                <h2><strong>My Profile</strong></h2>
                <br>
                <form action="{{ route('profile.update') }}" method="POST">
                    @method("put")
                    @csrf
{{--Full Name--}}
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control transparent-input @error('name') is-invalid @enderror" id="name" placeholder="Enter fullName" name="name" required value="{{ old('name', Auth::user()->name) }}">
                        <label for="fullName">Name</label>
                        {{-- Error Message --}}
                                @error('name')
                                    <div class="alert alert-transparent-background">{{ $message }}</div>
                                @enderror
                    </div>
{{--Phone Number--}}
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control transparent-input @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Enter phoneNumber" name="phone_number" required value="{{ old('phone_number', Auth::user()->phone_number) }}">
                        <label for="phone_number">Phone Number</label>
                        {{-- Error Message --}}
                                @error('phone_number')
                                    <div class="alert alert-transparent-background">{{ $message }}</div>
                                @enderror
                    </div>
{{--Email--}}
                    <div class="form-floating mb-3 mt-3">
                        <input type="email" class="form-control transparent-input @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" required value="{{ old('email', Auth::user()->email) }}" disabled>
                        <label for="email"><p class="text-white">Email</p></label>
                        {{-- Error Message --}}
                                @error('email')
                                    <div class="alert alert-transparent-background">{{ $message }}</div>
                                @enderror
                    </div>
{{--No KTP--}}
                    <div class="form-floating mb-3 mt-3">
                        <input type="no_ktp" class="form-control transparent-input @error('no_ktp') is-invalid @enderror" id="no_ktp" placeholder="No. KTP" name="no_ktp" required value="{{ old('no_ktp', Auth::user()->no_ktp) }}">
                        <label for="no_ktp"><p class="text-white">No. KTP</p></label>
                        {{-- Error Message --}}
                                @error('no_ktp')
                                    <div class="alert alert-transparent-background">{{ $message }}</div>
                                @enderror
                    </div>
{{--Button--}}
                    <div class="d-grid">
                    <button type="submit" class="btn colorpink button-press-pink text-white btn-block"><strong>Update Profile</strong></button>
                    </div>
                    <br>
                </form>
        </div>
    </div>
</div>

    </div>
</div>

@endsection

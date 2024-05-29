@extends('layout.root')

@section('title', 'Login')

@section('body')
<body>
    <style>
        .text-purple {
            color: #6358DC;
        }

        .img-particle {
            position: absolute;
            left: 25px;
            top: 25px;
        }

        a {
            color: #384A65;
            text-decoration: none;
        }

        .btn-login-submit {
            background: #384A65;
            border-color: #384A65;
        }

        .btn-login-submit:hover {
            background: #384A65;
            border-color: #384A65;
        }
    </style>
    <!-- Page Content -->
    <div class="container mt-5">
        <img src="{{ asset('assets/images/particle-login.png') }}" class="img-particle" alt="Particle">
        <div class="row align-items-center">
            <div class="col-md-4">
                <h1 class="text-center mb-5">Welcome to <span class="text-purple fw-bold">InMasjid</span></h1>
                <form class="row p-5" action="/login" method="post">
                    @csrf
                    <div class="col-12 form-group mb-2">
                        <label class="form-label fw-medium" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter email">
                    </div>
                    <div class="col-12 form-group">
                        <label class="form-label fw-medium" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Enter pasword">
                    </div>
                    <div class="col-12 form-group mb-3">
                        <button type="submit" class="btn btn-primary btn-login-submit btn-lg mt-3 w-100 d-flex justify-content-between">Login <img src="{{ asset('assets/images/arrow-right.png') }}" alt="Right"></button>
                    </div>
                    <div class="text-center">
                        <span>Don’t have an account? <a href="{{ url('register') }}" class="fw-medium">Register</a> </span>
                    </div>
                </form>
            </div>
            <div class="col-md-8 text-center">
                <img src="{{ asset('assets/images/login-register.png') }}" width="90%" alt="Login">
            </div>
        </div>


        {{-- <div class="container-sm m-auto p-5" style="max-width: 600px">
            <div class="row align-items-center justify-content-center p-auto gap-3">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('loginError')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ asset('assets/images/MySpareLogs.png') }}" style="width: 316px;">
                    <h2 class="fs-2">Welcome Back!</h2>
                </div>
                <form class="row g-3" action="/login" method="post">
                    @csrf
                    <div class="col-12 form-group">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Masukkan Email MySpareLog anda">
                    </div>
                    <div class="col-12 form-group">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Masukkan Password MySpareLog anda">
                    </div>
                    <div class="col-12 form-group">
                        <button type="submit" class="btn btn-primary btn-lg mt-3 w-100">Log In</button>
                    </div>
                </form>
            </div>
        </div> --}}


        {{-- @include('layout.footer') --}}
    </div>
</body>
@endsection
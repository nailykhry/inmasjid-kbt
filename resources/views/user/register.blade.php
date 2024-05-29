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
            left: 20px;
            top: 20px;
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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <img src="{{ asset('assets/images/particle-login.png') }}" class="img-particle" alt="Particle">
        <div class="row align-items-center">
            <div class="col-md-4">
                <h1 class="text-center mb-1">Welcome to <span class="text-purple fw-bold">InMasjid</span></h1>
                <form class="row p-5" method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="col-12 form-group mb-2">
                        <label class="form-label fw-medium" for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control form-control-lg"
                            placeholder="Enter your name">
                    </div>
                    <div class="col-12 form-group mb-2">
                        <label class="form-label fw-medium" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg"
                            placeholder="Enter email">
                    </div>
                    <div class="col-12 form-group mb-2">
                        <label class="form-label fw-medium" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg"
                            placeholder="Enter pasword">
                    </div>
                    <div class="col-12 form-group">
                        <label class="form-label fw-medium" for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control form-control-lg" placeholder="Enter confirm pasword">
                    </div>
                    <div class="col-12 form-group mb-3">
                        <button type="submit"
                            class="btn btn-primary btn-login-submit btn-lg mt-3 w-100 d-flex justify-content-between">Register
                            <img src="{{ asset('assets/images/arrow-right.png') }}" alt="Right"></button>
                    </div>
                    <div class="text-center">
                        <span>Already have an account? <a href="{{ url('login') }}" class="fw-medium">Log In</a> </span>
                    </div>
                </form>
            </div>
            <div class="col-md-8 text-center">
                <img src="{{ asset('assets/images/login-register.png') }}" width="90%" alt="Login">
            </div>
        </div>
    </div>
</body>
@endsection
@extends('layout.root')
@section('title', 'title')

<style>
    .bg-blue-light-gradient {
        background: linear-gradient(90.21deg, #0E73B9 27.53%, #2FB6E9 66.07%);
    }
</style>

@section('body')

    <body class="">
        <div class="navbar py-3 bg-white bg-blue-light-gradient">
            <div class="container-fluid gap-3">
                <button href="#" data-bs-target="#sidebar" data-bs-toggle="collapse"
                    class="border rounded-3 text-decoration-none btn btn-lg">
                    <i onclick="toggleSidebar(this)" class="fa-solid fa-bars text-white"></i>
                </button>
                <nav class="navbar navbar-expand-lg navbar-light fw-bold w-auto">
                    <div class="container-fluid ">
                        <a class="navbar-brand" href="#"></a>
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav jusity-content-center  mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="page" href="{{url('/')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('my-inventories')}}">Iklan Saya</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('profile')}}">Profil</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div></div>



            </div>

        </div>
        @yield('content')
    </body>
@endsection

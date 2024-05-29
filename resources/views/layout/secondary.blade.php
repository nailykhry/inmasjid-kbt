@extends('layout.root')
@section('title', 'title')
@section('body')
  <body>
    <!-- Navbar -->
    <nav class="navbar py-3 bg-white fixed-top">
      <div class="container-fluid d-lg-none d-sm-flex justify-content-lg-between">
        
        <a class="navbar-brand" href="/">
          <img src="{{ asset('assets/images/MySpareLogs.png') }}" width="200px">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
           
          </span>
        </button>

        <div class="offcanvas offcanvas-end bg-white" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <a class="navbar-brand" href="/">
              <img src="{{ asset('assets/images/MySpareLogs.png') }}" width="200px">
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            </button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav d-grid gap-4 fs-2">
              
              <li class="nav-item px-2">
                <a class="nav-link text-dark text-lg" href="/chat">
                  <i class="fa-regular fa-message"></i>
                  Messages
                </a>
              </li>
              <li class="nav-item px-2">
                <a class="nav-link text-dark" href="/activity">
                  <i class="fa-solid fa-clock-rotate-left"></i>
                  Activity
                </a>
              </li>
              @auth
              <li class="nav-item px-2">
                <a class="nav-link text-dark" href="/profileSettings">
                  <i class="fa-regular fa-circle-user"></i>
                  Profile Settings
                </a>
              </li>
              @endauth
              <li class="nav-item">
                <div class="d-grid gap-2">
                  <a class="btn btn-primary" href="/ads">
                    Pasang Iklan <i class="fa-solid fa-plus"></i>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
        
      </div>

      <div class="container-fluid d-none d-lg-flex justify-content-around">
        
        <a class="navbar-brand" href="/">
          <img src="{{ asset('assets/images/MySpareLogs.png') }}" width="200px">
        </a>

        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon d-lg-none"><i class="fa-solid fa-bars"></i></span>
        </button>
        
        <form class="w-50" action="{{ route('inventories.search') }}" method="GET">
            <div class="input-group input-group-lg d-flex" style="background-color: #F0F0F0">
              <input name="search" type="text" class="form-control border-end-0 border-dark" placeholder="Cari nama barang..." style="background-color: #F0F0F0">
              <button type="submit" class="btn btn-outline-secondary border-start-0 border-dark">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </div>
        </form>

        <ul class="navbar-nav d-flex flex-row justify-content-around align-items-center w-25">
            <li class="nav-item">
              <a class="nav-link text-dark" href="/chat">
              <i class="fa-regular fa-message fa-2x"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="/activity">
                <i class="fa-solid fa-clock-rotate-left fa-2x"></i>
              </a>
            </li>
            @auth
            <li class="nav-item">
              <a class="nav-link text-dark" href="/profileSettings">
                <i class="fa-regular fa-circle-user fa-2x"></i>
              </a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link fs-5 text-decoration-underline" href="/login">
                Login
              </a>
            </li>    
            @endauth
            <li class="nav-item">
              <a class="btn btn-primary rounded-pill" href="/ads">
                Pasang Iklan <i class="fa-solid fa-plus"></i>
              </a>
            </li>     
        </ul>

      </div>
    </nav>

@yield('content')

@include('layout.footer')

  <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
</body>
@endsection
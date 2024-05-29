@extends('layout.main')

@section('title', 'Activity')

@section('css')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  
@endsection

@section('content')
<div class="pt-5"></div>
    <div class="checkout">
        <h2>
            Activity
        </h2>
    </div>

  <!-- Tabs navs -->
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-underline d-flex" role="tablist">
                    <li class="nav-item flex-fill fs-5 fw-medium">
                        <a class="nav-link text-secondary active" href="#" id="pesanan-keluar-tab" data-bs-toggle="tab" data-bs-target="#pesanan-keluar" type="button" href="#pesanan-keluar" role="tab" aria-controls="pesanan-keluar" aria-selected="true">
                        Pesanan Keluar
                        </a>
                    </li>
                    <li class="nav-item flex-fill fs-5 fw-medium">
                        <a class="nav-link text-secondary" id="pesanan-masuk-tab" data-bs-toggle="tab" data-bs-target="#pesanan-masuk" type="button" href="#pesanan-masuk" role="tab" aria-controls="pesanan-masuk" aria-selected="false">
                        Pesanan Masuk
                        </a>
                    </li>
                </ul>
                <div class="tab-content px-4 py-4 border border-1 border-secondary-subtle">
                    <div class="tab-pane fade show active" id="pesanan-keluar" role="tabpanel" aria-labelledby="pesanan-keluar-tab">
                        <div class="d-flex flex-column flex-lg-row justify-content-between gap-5">
                        
                            <div class="d-flex flex-column gap-4"> 
                                <div class="card shadow" style="min-width:450px; max-width: 700px">
                                    <div class="row g-0">
                                        <div class="col-lg-6 col-md-12">
                                            <img src="{{asset('storage/inventories/Tangki bbm 10.jpg')}}" class="w-100 h-100 rounded-start" alt="...">
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                        <div class="card-body">
                                            <h5 class="card-title">Tangki Timbun BBM</h5>
                                            <p class="card-text mb-0">Tanjung Priok, Jakarta</p>
                                            <p class="card-text mb-0">Terminal Nilam</p>
                                            <div class="d-flex justify-content-between">
                                                <div class="card-text">
                                                    <p class="mb-0">Order at : </p>
                                                    <p class="mb-0">18 Juli 2023  15.00</p>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow" style="min-width:450px; max-width: 700px">
                                    <div class="row g-0">
                                        <div class="col-lg-6 col-md-12">
                                            <img src="{{asset('storage/inventories/Tangki bbm 10.jpg')}}" class="w-100 h-100 rounded-start" alt="...">
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                        <div class="card-body">
                                            <h5 class="card-title">Tangki Timbun BBM</h5>
                                            <p class="card-text mb-0">Tanjung Priok, Jakarta</p>
                                            <p class="card-text mb-0">Terminal Nilam</p>
                                            <div class="d-flex justify-content-between">
                                                <div class="card-text">
                                                    <p class="mb-0">Order at : </p>
                                                    <p class="mb-0">18 Juli 2023  15.00</p>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-sm d-flex flex-column align-items-center gap-3">
                                <div class="card shadow">
                                    <div class="card-body d-flex flex-column p-5 gap-3 my-3">
                                        <div class="d-flex w-100 px-3">
                                            <i class="fa-solid fa-bag-shopping fs-1"></i>
                                            <div class="d-flex flex-column w-100 ms-3">
                                                <h5 class="mb-0">
                                                Status Pemesanan
                                                </h5>
                                                <p class="mb-0">On Delivery</p>
                                            </div>
                                        </div>
                                        
                                        <div class="form-check px-5">
                                            <input class="form-check-input me-4 rounded-5" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1" checked disabled>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <h5 class="mb-0">
                                                Pengajuan Diterima
                                                </h5>
                                                <p class="mb-0">15.00, 18 Juli 2023</p>
                                            </label>
                                        </div>
                                        <div class="form-check px-5">
                                            <input class="form-check-input me-4 rounded-5" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1" checked disabled>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <h5 class="mb-0">
                                                Pengajuan Disetujui
                                                </h5>
                                                <p class="mb-0">15.30, 18 Juli 2023</p>
                                            </label>
                                        </div>
                                        <div class="form-check px-5">
                                            <input class="form-check-input me-4 rounded-5" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <h5 class="mb-0">Barang Dikirim</h5>
                                                <p class="mb-0"></p>
                                            </label>
                                        </div>
                                        <div class="form-check px-5">
                                            <input class="form-check-input me-4 rounded-5" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <h5 class="mb-0">Barang Diterima</h5>
                                                <p class="mb-0"></p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-outline-primary w-50 my-1 align-self-center">
                                    Cancel Pesanan
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pesanan-masuk" role="tabpanel" aria-labelledby="pesanan-masuk-tab">
                        <div class="d-flex flex-column flex-lg-row justify-content-between gap-5">
                            <div class="d-flex flex-column gap-4"> 
                                <div class="card shadow" style="min-width:450px; max-width: 700px">
                                    <div class="row g-0">
                                        <div class="col-lg-6 col-md-12">
                                            <img src="{{asset('storage/inventories/Tangki bbm 10.jpg')}}" class="w-100 h-100 rounded-start" alt="...">
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                        <div class="card-body">
                                            <h5 class="card-title">Tangki Timbun BBM</h5>
                                            <p class="card-text mb-0">Tanjung Priok, Jakarta</p>
                                            <p class="card-text mb-0">Terminal Nilam</p>
                                            <div class="d-flex justify-content-between">
                                                <div class="card-text">
                                                    <p class="mb-0">Order at : </p>
                                                    <p class="mb-0">18 Juli 2023  15.00</p>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow" style="min-width:450px; max-width: 700px">
                                    <div class="row g-0">
                                        <div class="col-lg-6 col-md-12">
                                            <img src="{{asset('storage/inventories/Tangki bbm 10.jpg')}}" class="w-100 h-100 rounded-start" alt="...">
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                        <div class="card-body">
                                            <h5 class="card-title">Tangki Timbun BBM</h5>
                                            <p class="card-text mb-0">Tanjung Priok, Jakarta</p>
                                            <p class="card-text mb-0">Terminal Nilam</p>
                                            <div class="d-flex justify-content-between">
                                                <div class="card-text">
                                                    <p class="mb-0">Order at : </p>
                                                    <p class="mb-0">18 Juli 2023  15.00</p>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-sm d-flex flex-column align-items-center gap-3">
                                <div class="card shadow">
                                    <div class="card-body d-flex flex-column p-5 gap-3 my-3">
                                        <div class="d-flex w-100 px-3">
                                            <i class="fa-solid fa-bag-shopping fs-1"></i>
                                            <div class="d-flex flex-column w-100 ms-3">
                                                <h5 class="mb-0">
                                                Status Pemesanan
                                                </h5>
                                                <p class="mb-0">On Delivery</p>
                                            </div>
                                        </div>
                                        
                                        <div class="form-check px-5">
                                            <input class="form-check-input me-4 rounded-5" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1" checked disabled>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <h5 class="mb-0">
                                                Pengajuan Diterima
                                                </h5>
                                                <p class="mb-0">15.00, 18 Juli 2023</p>
                                            </label>
                                        </div>
                                        <div class="form-check px-5">
                                            <input class="form-check-input me-4 rounded-5" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1" checked disabled>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <h5 class="mb-0">
                                                Pengajuan Disetujui
                                                </h5>
                                                <p class="mb-0">15.30, 18 Juli 2023</p>
                                            </label>
                                        </div>
                                        <div class="form-check px-5">
                                            <input class="form-check-input me-4 rounded-5" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <h5 class="mb-0">Barang Dikirim</h5>
                                                <p class="mb-0"></p>
                                            </label>
                                        </div>
                                        <div class="form-check px-5">
                                            <input class="form-check-input me-4 rounded-5" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <h5 class="mb-0">Barang Diterima</h5>
                                                <p class="mb-0"></p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-outline-primary w-50 my-1 align-self-center">
                                    Cancel Pesanan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
  <script>
    function toggleContent(contentNumber) {
      const contentClass = document.getElementsByClassName('content');
      
      const contentElement = document.getElementById(`content-${contentNumber}`);

      for (let i = 0; i < contentClass.length; i++) {
        if (contentClass[i].classList.contains('active') && i+1 !== contentNumber){
          contentClass[i].classList.remove('active');
        }
      }

      if (contentElement) {
        contentElement.classList.toggle('active');
      }
    }
  </script>

<!-- Link ke Bootstrap JS, Popper.js, dan jQuery -->
@endsection
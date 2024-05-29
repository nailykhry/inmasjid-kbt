@extends('layout.main')

@section('title', 'Pengaju')

@section('content')

    <!-- Page Content -->
    <!-- Information Here -->
    <div style="margin-top: 100px"></div>
        <div class="text-black p-4 px-5" style="background-color:#2FB6E9;">
            <h2 class="mb-0">
                {{$inventory->nama}} 
            </h2>
        </div>
        
        <!-- Information Ends Here -->
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                @foreach ($inventoryImages as $image)
                    <div class="carousel-item active">
                        <img src="{{asset('storage/inventories/'.$image->filename)}}" class="d-block w-100" style="max-height: 600px; object-fit: contain">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-black" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-black" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container-sm my-5">
            <h2 style="font-weight: bold">{{$inventory->nama}} </h2>
            <p style="margin-top: -5px">{{$inventory->lokasi}} </p>
            <button class="btn btn-primary d-iniline-block border border-1 border-dark rounded-5 px-3 py-1 text-capitalize">
                {{$inventory->kondisi}}  
            </button>
        </div>
        
        <div class="container-sm border border-1 border-secondary my-5">
            <div class="row">
                <div class="col-lg-8 col-sm-12  border-end border-secondary p-4">
                    <div class="row g-5">
                        <div class="col-lg-4 col-sm-6">
                            <div class="d-flex gap-3">
                                <i class="fa-regular fa-circle-user fs-2"></i>
                                <div class="d-flex flex-column">
                                    <h5 class="mb-0 text-secondary">PIC</h5>
                                    <p class="fw-semibold mb-0">{{$inventory->pic_name}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="d-flex gap-3">
                                <i class="fa-solid fa-location-dot fs-2"></i>
                                <div class="d-flex flex-column">
                                    <h5 class="mb-0 text-secondary">Location</h5>
                                    <p class="fw-semibold mb-0">{{$inventory->lokasi}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="d-flex gap-3">
                                <i class="fa-solid fa-border-all fs-2"></i>
                                <div class="d-flex flex-column">
                                <button class="btn btn-primary d-iniline-block border border-1 border-dark rounded-5 px-3 py-1 text-capitalize">
                                    {{$inventory->kondisi}}  
                                </button>
                                    <p class="fw-semibold mb-0">Layak pakai</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="d-flex gap-3">
                                <i class="fa-solid fa-phone fs-2"></i>
                                <div class="d-flex flex-column">
                                    <h5 class="mb-0 text-secondary">No. PIC</h5>
                                    <p class="fw-semibold mb-0">{{$inventory->pic_phone}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="d-flex gap-3">
                                <i class="fa-solid fa-circle-info fs-2"></i>
                                <div class="d-flex flex-column">
                                    <h5 class="mb-0 text-secondary">Status</h5>
                                    <p class="fw-semibold mb-0 text-capitalize">{{$inventory->status}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="d-flex gap-3">
                                <i class="fa-solid fa-box-archive fs-2"></i>
                                <div class="d-flex flex-column">
                                    <h5 class="mb-0 text-secondary">Stok : {{$inventory->stok}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 p-5 d-flex flex-column gap-5">
                    <a class="btn btn-primary rounded-4 py-3 fs-5" href="/checkout/{{$inventory->id}}">
                        + Request
                    </a>
                    <div class="d-flex gap-3">
                        <i class="fa-regular fa-circle-user fs-2"></i>
                        <div class="d-flex flex-column">
                            <h5 class="mb-0 text-secondary">PIC</h5>
                            <p class="fw-semibold mb-0">{{$inventory->pic_name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-sm border border-1 border-secondary my-5"></div>
            
        <div class="container-sm mb-5">
            <h2 style="font-weight: bold">Deskripsi</h2>
            <article class="border p-2" style="min-height: 180px">
                {{$inventory->deskripsi}}
            </article>
        </div>

    </div>

    @endsection
@extends('layout.main')

@section('title', 'Pemilik')

@section('content')

<!-- Page Content -->
<!-- Information Here -->
<div style="margin-top: 100px"></div>
<div class="text-black p-4 px-5" style="background-color:#FF6D2C;">
    <h2 class="mb-0">
        {{$item->item_name}}
    </h2>
</div>
<!-- Information Ends Here -->
<div id="carouselExample" class="carousel slide mt-5">
    <div class="carousel-inner">
        @if (count($item['itemImages']) > 0)
        <div class="carousel-item active">
            <img src="{{Storage::url($item['itemImages'][0]['image_path'])}}" class="d-block w-100"
                style="max-height: 600px; object-fit: contain">
        </div>
        @foreach ($item['itemImages'] as $index => $image)
        <div class="carousel-item">
            <img src="{{ Storage::url($image['image_path']) }}" class="d-block w-100"
                style="max-height: 600px; object-fit: contain">
        </div>
        @endforeach
        @else

        <img src="{{ asset('assets/images/image dummy.png') }}" width="100px" height="301px"
            class="card-img-top rounded-0" alt="product-image">
        @endif
    </div>


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

<div class="container-sm d-flex my-3 justify-content-between">
    <div>
        <h2 style="font-weight: bold">{{$item->item_name}}</h2>
        <p style="margin-top: -5px">{{$item->location}}</p>
        <button class="btn btn-primary d-iniline-block border border-1 border-dark rounded-5 px-3 py-1 text-capitalize">
            {{$item->category}}
        </button>
    </div>
    <div>
        {{-- <a href="/item/edit/{{$item->id}}" class="btn btn-warning btn-lg rounded-5">Edit Iklan</a> --}}
    </div>
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
                            <p class="mb-0">{{$item->pic_name}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="d-flex gap-3">
                        <i class="fa-solid fa-location-dot fs-2"></i>
                        <div class="d-flex flex-column">
                            <h5 class="mb-0 text-secondary">Lokasi</h5>
                            <p class="mb-0">{{$item->location}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="d-flex gap-3">
                        <i class="fa-solid fa-border-all fs-2"></i>
                        <div class="d-flex flex-column">
                            <h5 class="mb-0 text-secondary">Kategori</h5>
                            <p class="mb-0">Barang {{$item->category}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="d-flex gap-3">
                        <i class="fa-solid fa-phone fs-2"></i>
                        <div class="d-flex flex-column">
                            <h5 class="mb-0 text-secondary">No. PIC</h5>
                            <p class="fw-bold mb-0">{{$item->pic_phone}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 p-5">

            <a href="{{ route('chat.show', $item['user_id']) }}" class="btn btn-warning rounded-4 fs-2">Chat PIC</a>

        </div>
    </div>
</div>

<div class="container-sm border border-1 border-secondary my-5"></div>

<div class="container-sm mb-5">
    <h2 style="font-weight: bold">Deskripsi</h2>
    <article class="border p-2" style="min-height: 180px">
        {{$item->description}}
    </article>
</div>

</div>

@endsection
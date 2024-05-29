@extends('layout.main')

@section('title', 'Home')

@section('content')

<style>
    .banner {
        padding: 300px 0px;
        background-image: url('{{ asset(' assets/images/bannerLandingPage.jpeg')}}');
        background-size: 100% 100%;
        /* Use 100% for both width and height */
        background-repeat: no-repeat;
        background-position: center center;
    }

    .banner-textbox {
        background-color: rgba(129, 212, 245, 0.5);
        border: solid 2px #5EA7C3;
        right: 50px;
        width: 40%;
    }

    @media screen and (max-width: 768px) {
        .banner {
            padding: 200px 0px;
        }

        .banner-textbox {
            background-color: rgba(129, 212, 245, 0.5);
            border: solid 2px #5EA7C3;
            width: 90%;
            left: 0;
            right: 0;
            margin-left: auto;
            margin-right: auto;

        }
    }

    .bg-warning {
        background: #FF6D2C !important;
    }

    a {
        text-decoration: none;
    }

    .active>.page-link,
    .page-link.active {
        background: #FF6D2C !important;
    }
</style>


<!-- Banner Ends Here -->
<div class="pt-5 mt-5" id="mainContent">

    <div class="container py-5 text-center">
        <h1 class="fw-bold">DAFTAR BARANG</h1>
    </div>
    <div class="bg-warning mt-5">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="text-white">Search result:</h5>
                </div>
                <div class="col-md-6 text-end"><button class="btn btn-light btn-lg rounded-pill"><span
                            class="badge rounded-pill text-bg-warning bg-warning text-white">1</span> Filter</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row row-cols-xl-4 row-cols-md-2 row-cols-sm-1 pt-3 mb-4 g-3 mt-3">
            @foreach ($items as $item)
            <div class="col">
                <a href="#" style="height:100%">
                    <div class="card my-2 rounded-0" style="background-color:#F4F5F7; height:100%">
                        @php
                        $imagePath = isset($item['itemImages']) && count($item['itemImages']) > 0
                        ? Storage::url($item['itemImages'][0]['image_path'])
                        : asset('assets/images/image dummy.png');
                        @endphp

                        <img src="{{ $imagePath }}" width="285px" height="301px" class="card-img-top rounded-0"
                            alt="product-image">


                        <div class="card-body">
                            <span class="d-flex gap-2">
                                <h4 class="card-title fw-medium">{{ $item['item_name'] }}</h4>
                            </span>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $item['description'] }} | Barang {{
                                $item['category']
                                }}
                            </h6>


                            <div class="btn btn-warning text-white rounded-pill mt-2 px-4">Klaim</div>
                            <p class="text-end mb-0 mt-2">{{ $item['updated_at']->format('d F Y') }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>

        <div class="d-flex justify-content-center">
            <nav aria-label="...">
                <ul class="pagination pagination-lg">
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">1</span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

@include('layout.footer2')
@endsection
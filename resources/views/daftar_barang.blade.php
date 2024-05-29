@extends('layout.main')

@section('title', 'Home')

@section('content')

    <style>
        .banner {
            padding: 300px 0px;
            background-image: url({{ asset('assets/images/bannerLandingPage.jpeg') }});
            background-size: 100% 100%; /* Use 100% for both width and height */
            background-repeat: no-repeat;
            background-position: center center;
        }

        .banner-textbox{
            background-color: rgba(129, 212, 245, 0.5);
            border: solid 2px #5EA7C3;
            right: 50px;
            width: 40%;
        }

        @media screen and (max-width: 768px) {
            .banner {
                padding: 200px 0px;
            }

            .banner-textbox{
                background-color: rgba(129, 212, 245, 0.5);
                border: solid 2px #5EA7C3;
                width: 90%;
                left:0;
                right:0;
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

        .active>.page-link, .page-link.active {
            background: #FF6D2C !important;
        }
    </style>


    <!-- Banner Ends Here -->
    <div class="pt-5 mt-5" id="mainContent">
        {{-- @if (!$inventories->isEmpty())
            <h2 style="font-weight: bold">Newest</h2>
        @endif --}}

        <div class="container py-5 text-center">
            <h1 class="fw-bold">DAFTAR BARANG</h1>
        </div>
        <div class="bg-warning mt-5">
            <div class="container py-4">
                <div class="row align-items-center">
                    <div class="col-md-6"><h5 class="text-white">Search result:</h5></div>
                    <div class="col-md-6 text-end"><button class="btn btn-light btn-lg rounded-pill"><span class="badge rounded-pill text-bg-warning bg-warning text-white">1</span> Filter</button></div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row row-cols-xl-4 row-cols-md-2 row-cols-sm-1 pt-3 mb-4 g-3 mt-3">
                @for ($i = 1; $i <= 16; $i++)
                    <div class="col">
                        <a href="#" style="height:100%">
                        <div class="card my-2 rounded-0" style="background-color:#F4F5F7; height:100%">
                            <img src="{{ asset('assets/images/image dummy.png') }}" width="285px" height="301px" class="card-img-top rounded-0" alt="product-image">
                            <div class="card-body">
                                <span class="d-flex gap-2">
                                    <h4 class="card-title fw-medium">Lorem ipsum</h4>
                                    {{-- @if ($item->pic_id == auth()->id())
                                        <p class="mb-0">(Owned)</p>
                                    @endif --}}
                                </span>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Lorem Ipsum | @if ($i % 2 == 0) Barang Ditemukan @else Barang Hilang @endif</h6>
                                <div class="btn btn-warning text-white rounded-pill mt-2 px-4">Klaim</div>
                                <p class="text-end mb-0 mt-2">{{ date('d F Y') }}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                @endfor

                {{-- @foreach ($inventories as $item)
                    <div class="col">
                        <a href="/inventory/{{$item->id}}" style="height:100%">
                        <div class="card my-2 rounded-0" style="background-color:#F4F5F7; height:100%">
                            <img src="{{ asset('images/inventories/'.$item->foto) }}" width="285px" height="301px" class="card-img-top rounded-0" alt="product-image">
                            <div class="card-body">
                                <span class="d-flex gap-2">
                                    <h5 class="card-title mb-2">{{$item->nama}}</h5>
                                    @if ($item->pic_id == auth()->id())
                                        <p class="mb-0">(Owned)</p>
                                    @endif
                                </span>
                                <h6 class="card-subtitle mt-3 mb-2 text-body-secondary">{{$item->lokasi}}</h6>
                                <div class="btn btn-primary rounded-pill mt-2 px-4">{{$item->kondisi}}</div>
                                <p class="text-end mb-0 mt-2">{{$item->created_at}}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach --}}
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
        {{-- @if (!$inventories->isEmpty() && count($inventories) <= 8 && $showMore == false)
            <div class="d-grid gap-2 col-4 mx-auto my-5">
                <a href="/all" class="btn btn-outline-primary" type="button">Show More</a>
            </div>
        @endif --}}
    </div>

    @include('layout.footer2')
@endsection

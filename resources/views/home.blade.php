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

    .container-home {
        border-radius: 20px;
        background: #FFC501;
    }

    .f-71 {
        font-size: 71px;
    }

    .list-margin-card {
        margin: 0 -85px;
    }

    .card {
        border-radius: 20px;
    }

    .bg-purple {
        background: #BEC0FB;
    }

    .bg-yellow {
        background: #F6F193;
    }

    .bg-pink {
        background: #FFE6E6;
    }

    .img-btn {
        cursor: pointer;
    }

    a {
        text-decoration: none;
    }
</style>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="container mt-5 container-home">
    <div class="text-center py-5">
        <h1 class="fw-bold f-71">Explore categories</h1>
    </div>
    <div class="row pb-5 list-margin-card">
        <div class="col-md-4 d-flex align-items-stretch">
            <a class="card bg-purple border border-0 flex-grow-1 m-4" href="{{ route('lost-founds.create') }}">
                <div class="card-body">
                    <img src="{{ asset('assets/images/icon-create.png') }}" class="mb-4" alt="Plus" width="75px">
                    <h4 class="card-title fw-bold px-5 py-3 mb-0">Create a post</h4>
                    <p class="card-text fw-bold text-black px-5 py-3">Report yout lost/found item and let them know</p>
                </div>
            </a>
        </div>
        <div class="col-md-4 d-flex align-items-stretch">
            <a class="card bg-yellow border border-0 flex-grow-1 m-4" href="{{ route('lost-founds.index') }}">
                <div class="card-body">
                    <h4 class="card-title fw-bold text-end">Lost & found items</h4>
                    <img src="{{ asset('assets/images/item-list.png') }}" alt="Plus" width="250px">
                    <p class="card-text fw-bold text-black text-center">Go through the lost and found items</p>
                </div>
            </a>
        </div>
        <div class="col-md-4 d-flex align-items-stretch">
            <a class="card bg-pink border border-0 flex-grow-1 m-4" href="{{ route('maps') }}">
                <div class="card-body">
                    <h4 class="card-title fw-bold text-end">Search on map</h4>
                    <p class="card-text fw-bold text-black text-end">Search for items on location near you</p>
                    <img src="{{ asset('assets/images/search.png') }}" alt="Search" width="250px">
                </div>
            </a>
        </div>
    </div>
    <div class="row py-5 px-3">
        <div class="col-md-6">
            <img src="{{ asset('assets/images/button/button.png') }}" class="img-btn" alt="Button">
            <img src="{{ asset('assets/images/button/button-1.png') }}" class="img-btn" alt="Button 1">
            <img src="{{ asset('assets/images/button/button-2.png') }}" class="img-btn" alt="Button 2">
            <img src="{{ asset('assets/images/button/button-3.png') }}" class="img-btn" alt="Button 3">
            <img src="{{ asset('assets/images/button/button-4.png') }}" class="img-btn" alt="Button 4">
        </div>
        <div class="col-md-6 text-end">
            <img src="{{ asset('assets/images/button/button-left.png') }}" alt="Button Left">
            <img src="{{ asset('assets/images/button/button-right.png') }}" alt="Button Right">

        </div>
    </div>
</div>

{{-- <div style="height: 85vh;" class="banner d-flex justify-content-end align-items-center">
    <div class="p-5 position-absolute banner-textbox">
        <h4>About Us</h4>
        <h2>About Our <br>Service</h2>
        <p>We offer a wide range of heavy equpiment, especially for ports, that can relocated according to your needs.
        </p>
        <button class="btn btn-light rounded-0 border border-2 border-dark p-3"><a href="#mainContent"
                style="color:black">Explore More</a></button>
    </div>

</div> --}}

<!-- Banner Ends Here -->
{{-- <div class="container-lg pt-5 mt-5" id="mainContent">
    @if (!$inventories->isEmpty())
    <h2 style="font-weight: bold">Newest</h2>
    @endif

    <div class="row row-cols-xl-4 row-cols-md-2 row-cols-sm-1 pt-3 mb-4 g-3">
        @foreach ($inventories as $item)
        <div class="col">
            <a href="/inventory/{{$item->id}}" style="height:100%">
                <div class="card my-2 rounded-0" style="background-color:#F4F5F7; height:100%">
                    <img src="{{ asset('images/inventories/'.$item->foto) }}" width="285px" height="301px"
                        class="card-img-top rounded-0" alt="product-image">
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
        @endforeach
    </div>
    @if (!$inventories->isEmpty() && count($inventories) <= 8 && $showMore==false) <div
        class="d-grid gap-2 col-4 mx-auto my-5">
        <a href="/all" class="btn btn-outline-primary" type="button">Show More</a>
</div>
@endif
</div> --}}


@include('layout.footer')
@endsection
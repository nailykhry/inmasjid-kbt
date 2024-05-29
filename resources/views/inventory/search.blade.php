@extends('layout.main')

@section('title', 'Product')

@section('content')

<style>
        .banner {
            padding-top: 400px;
            background-image: url({{ asset('assets/images/walp.jpg') }});
            background-size: cover; /* Use 100% for both width and height */
            background-repeat: no-repeat;
            background-position: center center;
        }
        @media screen and (max-width: 768px) {
            .banner {
                padding: 200px 0px;
            }
        }
    </style>
    <div class="banner">
    </div>
    <div style="background-color:#0E73B9;color:white;height:100px;">
        <div class="container d-flex justify-content-between py-3 align-items-center">
            <h4>
                Search Result : 
            </h4>
            <div class="d-flex gap-3">
                <label for="type">
                    Tipe
                    <select class="form-select" id="type" name="tipe">
                        <option value="All">All</option>
                        @foreach ($types as $type)
                            <option value="{{$type->id}}">{{$type->nama_jenis}}</option>
                        @endforeach
                    </select>
                </label>
                <label for="condition">Kondisi
                    <select class="form-select" id="condition" name="kondisi">
                        <option value="All">All</option>
                        <option value="baru">baru</option>
                        <option value="bekas">bekas</option>
                    </select>       
                </label>
            </div>
        </div>
    </div>

   
    <div class="container mt-3">
        @if ($inventories->isEmpty())
            <h1>Nama barang tidak ditemukan...</h1>
        @else
        <div class="row row-cols-xl-4 row-cols-md-2 row-cols-sm-1">
            @foreach ($inventories as $item)
                <div class="col">
                    <div class="card my-2 rounded-0" style="background-color:#F4F5F7">
                        <img src="{{ asset('storage/inventories/' .$item->foto)}}" width="285px" height="301px" class="card-img-top rounded-0" alt="product-image">
                        <div class="card-body">
                        <h5 class="card-title mb-2">{{$item->nama}}</h5>
                        <h6 class="card-subtitle mt-3 mb-2 text-body-secondary">{{$item->lokasi}}</h6>
                        <div class="btn btn-primary rounded-pill mt-2 px-4">{{$item->kondisi}}</div>
                        <p class="text-end mb-0 mt-2">{{$item->created_at}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>

    <div class="d-flex justify-content-center">
        <div class="btn-group btn-group-lg gap-5 my-5" role="group">
            <button type="button" class="btn btn-secondary">1</button>
            <button type="button" class="btn btn-secondary">2</button>
            <button type="button" class="btn btn-secondary">3</button>
        </div>
    </div>
    

    @endsection
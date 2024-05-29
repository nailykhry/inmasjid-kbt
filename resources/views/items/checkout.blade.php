@extends('layout.main')

@section('title', 'Checkout')

@section('content')

    <!-- Page Content -->
    <!-- Information Here -->
    <div class="bg-blue-white-gradient text-center d-flex align-items-center justify-content-center pt-5" style="height:50vh;">
        <h1>
            Checkout
        </h1>
    </div>
    <!-- Information Ends Here -->

    <h4 class="fw-bold text-center">Order Details</h4>
    <div class="container-md d-flex flex-column gap-3 flex-lg-row justify-content-around my-5">
        <div class="card my-2 rounded-0" style="background-color:#F4F5F7">
            <img src="{{asset('images/inventories/'.$inventory->foto)}}" width="400px" height="300px" class="card-img-top rounded-0" alt="product-image">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title mb-2">{{$inventory->nama}}</h5>
                <h6 class="card-subtitle mt-3 mb-2 text-body-secondary">{{$inventory->lokasi}}</h6>
                <div class="mt-2">
                    <div class="badge bg-primary text-capitalize fs-6 px-4 rounded-pill">
                    {{$inventory->kondisi}}
                    </div>
                </div>
                <p class="text-end mb-0 mt-auto">{{$inventory->created_at}}</p>
            </div>
        </div>

        <div class="border border-1 border-secondary p-4">
            <div class="d-flex gap-5 justify-content-around" style="height: fit-content">
                <div class="d-flex gap-2 mb-3">
                    <div class="d-flex gap-3 bg-secondary-subtle p-3 rounded-4">
                        <i class="fa-regular fa-circle-user fs-2"></i>
                        <div class="d-flex flex-column">
                            <h5 class="fw-bold">PIC</h5>
                            <p class="mb-0">{{$inventory->pic_name}}</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 bg-secondary-subtle p-3 rounded-4">
                        <i class="fa-solid fa-phone fs-2"></i>
                        <div class="d-flex flex-column">
                            <h5 class="fw-bold">Phone</h5>
                            <p class="mb-0">{{$inventory->pic_phone}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <form class="d-flex flex-column gap-4" action="/request" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="inventory_id" value="{{$inventory->id}}">
                <label for="nama">
                    Name
                    <input name="nama_pengaju" id="nama" type="text" class="form-control" value="{{$user->name}}">
                </label>
                <label for="alamat">
                    Request Address
                    <input name="alamat" id="alamat" type="text" class="form-control" value="{{$user->cabang}}">
                </label>
                <label for="stok" class="w-50">
                    Stok
                    <div class="input-group border rounded-3">
                        <button class="btn btn-outline-dark-subtle" type="button" id="button-addon1" onclick="stepDown()">-</button>
                        <input name="stok" id="stok" type="number" value="0" min="0" class="form-control text-center">
                        <button class="btn btn-outline-dark-subtle" type="button" id="button-addon2" onclick="stepUp()">+</button>
                    </div>
                </label>
                <label for="file">
                    Upload File Kebutuhan Relokasi
                    <input name="file_relokasi" id="file" type="file" class="form-control" accept=".pdf">
                </label>
                <button type="submit" class="btn btn-primary btn-lg px-5 py-2 mt-5 rounded-4 w-100">
                    Order
                </button>
            </form>

        </div>
    </div>

    <script>
        function stepUp(){
            var input = document.getElementById("stok");
            input.stepUp();
        }

        function stepDown(){
            var input = document.getElementById("stok");
            input.stepDown();
        }
    </script>

    <style>
        input[type="number"] {
            -webkit-appearance: textfield;
            -moz-appearance: textfield;
            appearance: textfield;
        }
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
        }
    </style>
@endsection

@extends('layout.main')

@section('title', 'Activity')

@section('content')
    <style>
        ul.stepper {
            padding: 0;
            overflow-x: hidden;
            overflow-y: auto;
            counter-reset: section;
        }

        .stepper-vertical {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        ul.stepper li {
            height: -webkit-min-content;
            height: -moz-min-content;
            height: min-content;
        }

        .stepper-vertical li {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
        }

        ul.stepper li a {
            padding: .5rem 1.5rem;
            text-align: center;
            text-decoration: none;
        }

        .stepper-vertical li a {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-item-align: start;
            align-self: flex-start;
        }

        ul.stepper li.active a .circle,
        ul.stepper li.completed a .circle {
            background-color: #4285f4 !important;
        }

        ul.stepper li a .circle {
            display: inline-block;
            width: 1.75rem;
            height: 1.75rem;
            margin-right: 0.5rem;
            line-height: 1.7rem;
            color: #fff;
            text-align: center;
            background-color: #FFFFFF;
            border: 1px solid #4285f4;
            border-radius: 50%;
            padding: 6px;
        }

        .stepper-vertical li a .circle {
            -webkit-box-ordinal-group: 2;
            -ms-flex-order: 1;
            order: 1;
        }

        ul.stepper li.active a .label,
        ul.stepper li.completed a .label {
            font-weight: 600;
            color: rgba(0, 0, 0, 0.87);
        }

        ul.stepper li a .label {
            display: inline-block;
            color: rgba(0, 0, 0, 0.38);
        }

        .stepper-vertical li a .label {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-flow: column nowrap;
            flex-flow: column nowrap;
            -webkit-box-ordinal-group: 3;
            -ms-flex-order: 2;
            order: 2;
            margin-top: 0.2rem;
        }

        .stepper-vertical li:not(:last-child):after {
            position: absolute;
            top: 44%;
            left: 8%;
            width: 1px;
            height: calc(100% - 30px);
            content: "";
            background-color: rgba(0, 0, 0, 0.1);
        }

        .stepper-vertical li .step-content {
            display: block;
            padding-left: 0.94rem;
            margin-top: 0;
            margin-left: 3.13rem;
        }
    </style>
    <div class="pt-5 my-5">
        <div class="checkout">
            <h2 class="text-center">
                {{ $title ?? '' }}
            </h2>
        </div>

        <div class="container my-5">
            <div class="border rounded-top-4 text-center py-2">
                <h3>Pesanan Keluar</h3>
            </div>
            <div class="row row-cols-2 py-5 px-3">

                @foreach ($requests as $request)
                    <div class="col">
                        <a href="/my-requests/{{ $request->id }}" class="text-decoration-none">
                            <div class="card shadow @if ($selected_request && $request->id == $selected_request->id) bg-info @endif"
                                style="max-width: 450px">
                                <div class="row g-0">
                                    <div class="col-lg-6 col-md-12">
                                        <img src="{{ asset('images/inventories/' . $request->inventory->foto) }}"
                                            class="w-100 h-100 rounded-start" alt="...">
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $request->nama_barang }}</h5>
                                            <p class="card-text mb-0">{{ $request->lokasi }}</p>
                                            <p class="card-text mb-0">Jumlah pengajuan : {{ $request->stok }}</p>
                                            <div class="d-flex justify-content-between">
                                                <div class="card-text">
                                                    <p class="mb-0">Order at : </p>
                                                    <p class="mb-0">{{ $request->tanggal_pengajuan }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col">
                        <ul class="stepper stepper-vertical mt-0 pt-0">

                            @foreach ($request->statuses as $key => $status)
                                <li class="completed">
                                    <a href="#!" class="text-decoration-none">
                                        <span class="circle p-0">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        @if ($key == 0)
                                            <span class="label">
                                                Pengajuan {{ $status->status }} (Status Sekarang)
                                            </span>
                                        @else
                                            <span class="label text-dark text-decoration-none">
                                                Pengajuan {{ $status->status }}
                                            </span>
                                        @endif

                                        {{-- <span class="label  {{ $key == 0 && $status == 'ditolak' ? 'bg-success text-light p-2' : '' }}">Pengajuan
                                        {{ $status->status }} {{ $key == 0 ? '(Status Sekarang)' : '' }}</span> --}}
                                    </a>
                                    <div class="step-content">
                                        <p>{{ $status->created_at->isoFormat('dddd,h:m D MMMM Y') }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                @endforeach
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
                if (contentClass[i].classList.contains('active') && i + 1 !== contentNumber) {
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

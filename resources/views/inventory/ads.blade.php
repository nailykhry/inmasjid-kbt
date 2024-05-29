@extends('layout.plain')

@section('title', 'Iklan')


<style>
    .content {
        display: none;
        align-items: center;
        font-weight: 400;
        font-size: 20px;
        color: rgba(102, 102, 102, 1);
        border: 1px solid #ccc;
        height: fit-content;
    }

    .content.active {
        display: flex;
        flex-direction: column;
    }

    .chevron-icon {
        position: absolute;
        right: 10px;
    }
</style>

@section('content')

  <div class="container-sm p-0 my-5">
    <div class="row mb-3">
        <div class="col-12 p-3 d-flex align-items-center rounded-3 fs-4 shadow shadow-lg bg-light">
            Plih Kategori
        </div>
    </div>
    
    <div class="row px-2">
        <div class="col-6 d-flex flex-column p-0 gap-3">
            <div class="btn-group dropend">
                <button type="button" class="p-3 fs-4 d-flex justify-content-between align-items-center btn btn-light text-secondary shadow-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="-1,10">
                    <span><i class="fas fa-screwdriver-wrench"></i> Peralatan Faspel</span>
                </button>
                <div class="dropdown-menu w-100 p-0 m-0 fs-4 border-0">
                    <a class="p-3 dropdown-item mb-3 rounded-3 shadow-sm text-decoration-none text-secondary" href="/ads/create/{{1}}">
                            CC
                    </a>
                    <a class="p-3 dropdown-item mb-3 rounded-3 shadow-sm text-decoration-none text-secondary" href="/ads/create/{{2}}">
                            RTG
                    </a>
                </div>
            </div>
            <div class="btn-group dropend">
                <button type="button" class="p-3 fs-4 d-flex justify-content-between align-items-center btn btn-light text-secondary shadow-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="-1,10">
                    <span><i class="fas fa-toolbox"></i> Instalasi Faspel</span>
                </button>
                <div class="dropdown-menu w-100 p-0 m-0 fs-4 border-0">
                    <a class="p-3 dropdown-item mb-3 rounded-3 shadow-sm text-decoration-none text-secondary" href="/ads/create/{{3}}">
                        Kubikel
                    </a>
                    <a class="p-3 dropdown-item mb-3 rounded-3 shadow-sm text-decoration-none text-secondary" href="/ads/create/{{4}}">
                        Kabel
                    </a>
                </div>
            </div>
            <div class="btn-group dropend">
                <button type="button" class="p-3 fs-4 d-flex justify-content-between align-items-center btn btn-light text-secondary shadow-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="-1,10">
                    <span><i class="fas fa-ship"></i> Fasilitas Pelabuhan</span>
                </button>
                <div class="dropdown-menu w-100 p-0 m-0 rounded-0 fs-4 border-0">
                    <a class="p-3 dropdown-item mb-3 rounded-3 shadow-sm text-decoration-none text-secondary" href="/ads/create/{{5}}">
                        Fender
                    </a>
                    <a class="p-3 dropdown-item mb-3 rounded-3 shadow-sm text-decoration-none text-secondary" href="/ads/create/{{6}}">
                        Bolder
                    </a>
                </div>
            </div>
           
            <a class="p-3 fs-4 d-flex justify-content-between align-items-center btn btn-light text-secondary shadow-sm" href="/ads/create/{{7}}">
                <span><i class="far fa-building"></i> Rumah Tangga & Umum</span>
            </a>
           
            <a class="p-3 fs-4 d-flex justify-content-between align-items-center btn btn-light text-secondary shadow-sm" href="/ads/create/{{8}}">
                <span><i class="far fa-folder"></i> Kearsipan/Keuangan</span>
            </a>
            
        </div>
    </div>
</div>

@endsection
@extends('layout.admin')

@section('title', 'Admin - Inventories')

<style>
    .bg-blue-light-gradient{
        background: linear-gradient(90.21deg, #0E73B9 27.53%, #2FB6E9 66.07%);
    }
</style>

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap" style="height: 85%">
        @include('layout.sidebar')

        <main class="col ps-md-2 pt-2">
            <div class="card border-0 shadow p-4">
                <div class="d-flex gap-2 mb-3">
                    <a href="{{route('admin.inventories.download-excel')}}" class="btn btn-success">Download Excel</a>
                    <a href="/ads" class="btn btn-secondary">Tambah Iklan Barang</a>
                    @if (session('current_session'))
                        <div class="ms-auto d-flex gap-2">
                            <div class="rounded-3 bg-warning-subtle p-2 px-4 ms-auto">
                                <p class="mb-0 fw-semibold">Session Used : {{session('current_session')->username}}</p>
                            </div>
                            <a href="{{route('admin.exit_session')}}" class="btn btn-danger rounded-5">Exit Session</a>
                        </div>
                    @else
                        <div class="rounded-3 bg-warning-subtle p-2 px-4 ms-auto">
                            <p class="mb-0 fw-semibold">No Session Used</p>
                        </div>
                    @endif
                </div>
                <table class="table">
                    <thead>
                        <tr class="table-info">
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kondisi</th>
                            <th>Lokasi</th>
                            <th>PIC</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventories as $inventory)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$inventory->nama}}</td>
                            <td>{{$inventory->kondisi}}</td>
                            <td>{{$inventory->lokasi}}</td>
                            <td>{{$inventory->pic_id}}</td>
                            <td>{{$inventory->stok}}</td>
                            <td>{{$inventory->status}}</td>
                            <td>
                                <div class="d-flex gap-3 justify-content-center">
                                    <button class="btn btn-primary rounded-5 px-4">Edit</button>
                                    <button class="btn btn-danger rounded-5 px-4">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
<script>
    function toggleSidebar(e) {
        e.classList.toggle("fa-xmark")
        e.classList.toggle("fa-bars")
    }
</script>

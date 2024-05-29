@extends('layout.admin')

@section('title', 'Relokasi')

<style>
    .bg-blue-light-gradient{
        background: linear-gradient(90.21deg, #0E73B9 27.53%, #2FB6E9 66.07%);
    }
</style>

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap" style="height: 85%">
        @include('layout.sidebar-user')
        <main class="col ps-md-2 pt-2">
            <div class="card border-0 shadow p-4">
                <div class="d-block mb-3">
                    <h1>{{$title}}</h1>
                </div>
                <div class="d-flex gap-2 mb-3">
                    <a href="{{route('my-inventories.download-excel', ['status' => 'relokasi'])}}" class="btn btn-success">Download Excel</a>
                </div>
                <table class="table">
                    <thead>
                        <tr class="table-info">
                            <th>No</th>
                            <th>Nama Barang</th>
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
                            <td>{{$inventory->stok}}</td>
                            <td>{{$inventory->status}}</td>
                            <td>
                                <div class="d-flex gap-3 justify-content-center">
                                    <button class="btn btn-outline-primary rounded-5 px-4 btn-view" data-img="{{ $inventory->foto }}" data-pic="{{ $inventory->nama_pic }}" data-nama="{{ $inventory->nama }}" data-loc="{{ $inventory->lokasi }}" data-status="{{ $inventory->status }}" data-stok="{{ $inventory->stok }}">View</button>
                                    <form action="{{ url('inventory/delete/'.$inventory->id)}}" method="POST" onsubmit="return confirm('Are you sure?')" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-5 px-4">Hapus</button>
                                    </form>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{asset('assets/images/bannerLandingPage.jpeg')}}" alt="" id="imgBarang" class="img-fluid mb-3">
                <table class="table table-borderless w-100">
                    <tr class="mb-3">
                        <th class="text-muted">PIC</th>
                        <th class="text-end" id="viewPIC"></th>
                    </tr>
                    <tr class="mb-3">
                        <th class="text-muted">Nama Barang</th>
                        <th class="text-end" id="viewNama"></th>
                    </tr>
                    <tr class="mb-3">
                        <th class="text-muted">Lokasi</th>
                        <th class="text-end" id="viewLokasi"></th>
                    </tr>
                    <tr class="mb-3">
                        <th class="text-muted">Status</th>
                        <th class="text-end" id="viewStatus"></th>
                    </tr>
                    <tr class="mb-3">
                        <th class="text-muted">Stok</th>
                        <th class="text-end" id="viewStok"></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function toggleSidebar(e) {
        e.classList.toggle("fa-xmark")
        e.classList.toggle("fa-bars")
    }
    $('.btn-view').click(function (e) {
        e.preventDefault();
        var pic = $(this).data('pic');
        var nama = $(this).data('nama');
        var loc = $(this).data('loc');
        var status = $(this).data('status');
        var stok = $(this).data('stok');
        var img = $(this).data('img');

        $('#imgBarang').attr('src', 'storage/inventories/'+img);
        $('#viewPIC').html(pic);
        $('#viewNama').html(nama);
        $('#viewLokasi').html(loc);
        $('#viewStatus').html(status);
        $('#viewStok').html(stok);

        $('#exampleModal').modal('show');
    });
</script>
@endsection

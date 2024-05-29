@extends('layout.admin')
@section('title', 'Perbarui Status')
@section('content')
    <div class="container my-5">
        <div class="row border border-1 border-secondary-subtle p-3">
            <h5>Perbarui Status</h5>
        </div>
        <form action="/my-inventories/need-actions/{{ $request->id }}/update-status" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row" style="border:1px solid rgba(159, 159, 159, 1);padding:20px">
                <h5>Detail Status</h5>
                <div class="form-group my-3">
                    <label for="my-input">Nama Pengaju</label>
                    <input id="my-input" class="form-control" type="text" name=""
                        value="{{ $request->nama_pengaju }}" readonly>
                </div>
                <div class="form-group my-3">
                    <label for="my-input">Lokasi</label>
                    <input id="my-input" class="form-control" type="text" name="" value="{{ $request->lokasi }}"
                        readonly>
                </div>
                <div class="form-group my-3">
                    <label for="my-input">Inventory</label>
                    <input id="my-input" class="form-control" type="text" name=""
                        value="{{ $request->inventory->nama }}" readonly>
                </div>
                <div class="form-group my-3">
                    <label for="my-input">Status Terakhir</label>
                    <input id="my-input" class="form-control text-uppercase" type="text" name=""
                        value="{{ $request->statuses->first()->status }}" disabled>
                </div>
                <div class="form-group my-3">
                    <label for="my-select">Status Baru</label>
                    <select id="my-select" class="form-control" name="status">
                        <option value="diajukan">DIAJUKAN</option>
                        <option value="disetujui">DISETUJUI</option>
                        <option value="dikirim">DIKIRIM</option>
                        <option value="diterima">DITERIMA</option>
                        <option value="ditolak">DITOLAK</option>
                    </select>
                </div>
            </div>


            <div class="row"
                style="border:1px solid rgba(159, 159, 159, 1);padding:20px;display:flex;justify-content:center">
                <button type="submit" class="btn btn-primary btn-lg" style="width: 278px;">Perbarui Status</button>
            </div>
        </form>
    </div>



@endsection

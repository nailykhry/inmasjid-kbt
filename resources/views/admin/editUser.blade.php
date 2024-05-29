@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid p-3">
    <div class="row">
        @include('layout.sidebar')
        <div class="col card p-5">
            <h1 class="mb-4 fw-bold">Tambah Data User</h1>
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="row g-3">
                @csrf
                @method('PATCH')
                <label for="email" class="col-12 col-lg-6">
                    <h5 class="ms-2">Email</h5>
                    <input id="email" name="email" type="email" class="form-control" value="{{$user->email}}">
                </label>
                <label for="password" class="col-12 col-lg-6">
                    <h5 class="ms-2">Password</h5>
                    <input id="password" name="password" type="text" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                    @error('password')
                    <div id="passwordALert" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <small>*Kosongkan Jika Tidak Diubah</small>
                </label>
                <label for="username" class="col-12 col-lg-6">
                    <h5 class="ms-2">Username</h5>
                    <input id="username" name="username" type="text" class="form-control" value="{{$user->username}}">
                </label>
                <label for="name" class="col-12 col-lg-6">
                    <h5 class="ms-2">Nama</h5>
                    <input id="name" name="name" type="text" class="form-control" value="{{$user->name}}">
                </label>
                <label for="role" class="col-12 col-lg-6">
                    <h5 class="ms-2">Role</h5>
                    <select name="role" id="role" class="form-select">
                        <option value="" class="text-secondary" {{$user->role == ''? 'selected' : ''}}>-- Pilih Role --</option>
                        <option value="admin" {{$user->role == 'admin'? 'selected' : ''}}>Admin</option>
                        <option value="user" {{$user->role == 'user'? 'selected' : ''}}>Regular User</option>
                    </select>
                </label>
                <label for="phone" class="col-12 col-lg-6">
                    <h5 class="ms-2">No. Telepon</h5>
                    <input id="phone" name="phone" type="number" pattern="^(?:0|\(?\+62\)?\s?|08\s?)[1-9](?:[\.\-\s]?\d\d){4}$" class="form-control" value="{{$user->phone}}" required>
                </label>
                <label for="divisi" class="col-12 col-lg-6">
                    <h5 class="ms-2">Divisi</h5>
                    <select name="divisi" id="divisi" class="form-select">
                        <option value="" class="text-secondary">-- Pilih Divisi --</option>
                        <option value="Teknik" @if ($user->divisi == 'Teknik') selected @endif>Teknik</option>
                        <option value="Operasional" @if ($user->divisi == 'Operasional') selected @endif>Operasional</option>
                        <option value="Teknologi Informasi" @if ($user->divisi == 'Teknologi Informasi') selected @endif>Teknologi Informasi</option>
                    </select>
                </label>
                <label for="cabang" class="col-12 col-lg-6">
                    <h5 class="ms-2">Lokasi</h5>
                    <select name="cabang" id="cabang" class="form-select">
                        <option value="" class="text-secondary">-- Pilih Lokasi --</option>
                        <option value="Terminal Nilam" @if ($user->cabang == 'Terminal Nilam') selected @endif>Terminal Nilam</option>
                        <option value="Terminal Jamrud" @if ($user->cabang == 'Terminal Jamrud') selected @endif>Terminal Jamrud</option>
                        <option value="Pelindo Subreg Jawa" @if ($user->cabang == 'Pelindo Subreg Jawa') selected @endif>Pelindo Subreg Jawa</option>
                    </select>
                </label>
                <div class="form-check form-switch px-3">
                    <label class="form-check-label" for="status">
                        <h5>Status</h5>
                    </label>
                    <br>
                    <div class="d-flex">
                        <p>Nonaktif</p>
                            <input class="form-check-input mx-2" name="status" type="checkbox" role="switch" id="status" {{$user->status == 'aktif'? 'checked' : ''}}>
                        <p>Aktif</p>
                    </div>

                </div>
                <button type="submit" class="btn btn-success ms-auto w-25 mt-5">
                    Update
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

<style>
   /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }
</style>

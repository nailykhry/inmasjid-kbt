@extends('layout.admin')

@section('title', 'Profile')

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
                <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="hidden" name="role" value="{{ $user->role }}">
                        <input type="hidden" name="status" value="{{ $user->status }}">
                        <input type="hidden" name="divisi" value="{{ $user->divisi }}">
                        <input type="hidden" name="cabang" value="{{ $user->cabang }}">
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{$user->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleFormControlInput1" value="{{old('password')}}">
                        @error('password')
                        <div id="passwordALert" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <small>*Kosongkan Jika Tidak Diubah</small>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name" value="{{$user->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Username" value="{{$user->username}}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No. Telepon</label>
                        <input id="phone" name="phone" type="number" pattern="^(?:0|\(?\+62\)?\s?|08\s?)[1-9](?:[\.\-\s]?\d\d){4}$" class="form-control" value="{{$user->phone}}" required>
                    </div>
                    <button class="btn btn-lg btn-primary float-end" type="submit">
                        Ubah
                    </button>
                </form>
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

@extends('layout.admin')

@section('title', 'Profile')

<style>
    .bg-blue-light-gradient {
        background: linear-gradient(90.21deg, #0E73B9 27.53%, #2FB6E9 66.07%);
    }

    .header {
        display: flex;
        justify-content: center;
    }
</style>

@section('content')
<h1 class="header m-5">PROFILE</h1>
<div class="container-fluid m-5 row justify-content-center align-items-center">
    <div class="row flex-nowrap" style="height: 85%; width:75%">
        @include('layout.sidebar-user')
        <main class="col ps-md-2 pt-2">
            <div class="card border-0 shadow p-4 row justify-content-center align-items-center">
                <form style="width: 90%" action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleFormControlInput1"
                            placeholder="Username" value="{{$user->username}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="name@example.com" value="{{$user->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="exampleFormControlInput1" value="{{old('password')}}">
                        @error('password')
                        <div id="passwordALert" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <small>*Kosongkan Jika Tidak Diubah</small>
                    </div>

                    <button class="btn btn-lg btn-warning float-end" type="submit">
                        Ubah
                    </button>
                </form>
            </div>
            </ain>
    </div>
</div>
@endsection
<script>
    function toggleSidebar(e) {
        e.classList.toggle("fa-xmark")
        e.classList.toggle("fa-bars")
    }
</script>
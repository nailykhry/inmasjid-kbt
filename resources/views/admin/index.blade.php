@extends('layout.admin')

@section('title', 'Admin Dashboard')

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
                <h1>
                    Hallo, {{$user->name}}
                </h1>
            </div>
            <div class="card border-0 shadow p-4">
                <form>
                    <input type="hidden" value>
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

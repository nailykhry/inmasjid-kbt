@extends('layout.admin')

@section('title', 'Need Action')

<style>
    .bg-blue-light-gradient {
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
                        <h1>{{ $title }}</h1>
                    </div>
                    <div class="d-flex gap-2 mb-3">
                        <a href="{{ url('my-inventories/need-actions-excel') }}" class="btn btn-success">Download Excel</a>
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
                            @foreach ($inventories as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->inventory->nama }}</td>
                                    <td>{{ $row->stok }}</td>
                                    <td>{{ $row->statuses->first()->status }}</td>
                                    <td>
                                        <div class="d-flex gap-3 justify-content-center">
                                            <button class="btn btn-outline-primary rounded-5 px-4 btn-view"
                                                data-id="{{ $row->id }}">View</button>
                                            <form action="{{ url('my-inventories/need-actions/' . $row->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure?')" class="m-0">
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

            </div>
        </div>
    </div>
    <script>
        function toggleSidebar(e) {
            e.classList.toggle("fa-xmark")
            e.classList.toggle("fa-bars")
        }
        $('.btn-view').click(function(e) {
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: `{{ url('my-inventories/need-actions/${id}') }}`,
                cache: false,
                success: function(response) {
                    $('.modal-content').html(response);
                    $('#exampleModal').modal('show');
                }
            });
        });
    </script>
@endsection
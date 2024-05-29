<div class="col-auto px-0">
    <div id="sidebar" class="collapse collapse-horizontal border-end p-3">
        <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start h-100 gap-3 d-flex flex-column"
            style="min-width: 250px;">
            <div class="d-flex gap-3 mb-2">
                <i class="fa-regular fa-circle-user fa-3x"></i>
                <div class="d-flex flex-column">
                    <h5 class="mb-0">{{Auth::user()->user }}</h5>
                    <p class="mb-0">{{ Auth::user()->username }}</p>
                </div>
            </div>
            <a href="/profile" class="list-group-item d-inline-block list-group-item-action border-0 rounded-3">
                <h5 class="mb-0">Account</h5>
            </a>
            <a class="list-group-item d-inline-block list-group-item-action border-0 rounded-3 active"
                data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                aria-controls="collapseExample">
                <h5 class="mb-0">MySpareLog</h5>
            </a>
            <div class="collapse" id="collapseExample">
                <div class="list-group border-0 rounded-0 text-sm-start gap-3">
                    <a href="{{ url('my-inventories') }}"
                        class="list-group-item d-inline-block list-group-item-action border-0 rounded-3 @if (Request::segment(1) == 'my-inventories' && Request::segment(2) == '') active @endif">
                        <h5 class="mb-0">Iklan Saya</h5>
                    </a>
                    <a href="{{ url('my-inventories/need-actions') }}"
                        class="list-group-item d-inline-block list-group-item-action border-0 rounded-3 @if (Request::segment(1) == 'my-inventories' && Request::segment(2) == 'need-actions') active @endif">
                        <h5 class="mb-0">Perlu Tindakan</h5>
                    </a>
                    <a href="{{ url('my-inventories/completed') }}"
                        class="list-group-item d-inline-block list-group-item-action border-0 rounded-3 @if (Request::segment(1) == 'my-inventories' && Request::segment(2) == 'completed') active @endif">
                        <h5 class="mb-0">Selesai</h5>
                    </a>
                    <a href="{{ url('my-inventories/lelang') }}"
                        class="list-group-item d-inline-block list-group-item-action border-0 rounded-3 @if (Request::segment(1) == 'my-inventories' && Request::segment(2) == 'lelang') active @endif">
                        <h5 class="mb-0">Lelang</h5>
                    </a>
                    <a href="{{ url('my-inventories/junk') }}"
                        class="list-group-item d-inline-block list-group-item-action border-0 rounded-3 @if (Request::segment(1) == 'my-inventories' && Request::segment(2) == 'junk') active @endif">
                        <h5 class="mb-0">Sampah</h5>
                    </a>
                </div>
            </div>
            <a class="list-group-item list-group-item-danger d-inline-block list-group-item-action border-0 rounded-3 mt-auto"
                href="/logout">
                <h5 class="mb-0">Logout</h5>
            </a>
        </div>
    </div>
</div>

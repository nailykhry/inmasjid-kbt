<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pesanan {{ $need->nama_pengaju }}</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-2 text-center p-2">
            <span><i class="fa-solid fa-bag-shopping fa-2x"></i></span>
        </div>
        <div class="col">
            <b>Status Pesanan</b>
            <p class="text-muted">{{ $need->status }}</p>
        </div>
    </div>
    <ul class="stepper stepper-vertical">

        @foreach ($need->statuses as $key => $status)
            <li class="{{ $key == 0 ? 'completed' : '' }}">
                <a href="#!">
                    <span class="circle">
                        {{-- @if (isset($status->created_at)) --}}
                        <i class="fa-solid fa-check"></i>
                        {{-- @endif --}}
                    </span>
                    @if ($key == 0 && $status->status == 'ditolak')
                        <span class="label bg-danger text-light p-2">
                            Pengajuan {{ $status->status }} (Status Sekarang)
                        </span>
                    @elseif($key == 0 && $status->status != 'ditolak')
                        <span class="label bg-success text-light p-2">
                            Pengajuan {{ $status->status }} (Status Sekarang)
                        </span>
                    @else
                        <span class="label text-dark">
                            Pengajuan {{ $status->status }}
                        </span>
                    @endif
                    {{-- <span class="label  {{ $key == 0 && $status == 'ditolak' ? 'bg-success text-light p-2' : '' }}">Pengajuan
                        {{ $status->status }} {{ $key == 0 ? '(Status Sekarang)' : '' }}</span> --}}
                </a>
                <div class="step-content">
                    <p>{{ $status->created_at->isoFormat('dddd,h:m D MMMM Y') }}
                    </p>
                </div>
            </li>
        @endforeach

        {{-- <li class="@if (isset($need->tanggal_penerimaan)) completed @endif">
            <a href="#!">
                <span class="circle">
                    @if (isset($need->tanggal_penerimaan))
                        <i class="fa-solid fa-check"></i>
                    @endif
                </span>
                <span class="label">Pengajuan Diterima</span>
            </a>
            <div class="step-content">
                <p>{{ $need->tanggal_penerimaan ? date('d F Y - H:i', strtotime($need->tanggal_penerimaan)) : '-' }}</p>
            </div>
        </li>
        <li class="@if (isset($need->tanggal_persetujuan)) completed @endif">
            <a href="#!">
                <span class="circle">
                    @if (isset($need->tanggal_persetujuan))
                        <i class="fa-solid fa-check"></i>
                    @endif
                </span>
                <span class="label">Pengajuan Disetujui</span>
            </a>
            <div class="step-content">
                <p>{{ $need->tanggal_persetujuan ? date('d F Y - H:i', strtotime($need->tanggal_persetujuan)) : '-' }}
                </p>
            </div>
        </li>
        <li class="@if (isset($need->tanggal_pengiriman)) completed @endif">
            <a href="#!">
                <span class="circle">
                    @if (isset($need->tanggal_pengiriman))
                        <i class="fa-solid fa-check"></i>
                    @endif
                </span>
                <span class="label">Mengirim Barang</span>
            </a>
            <div class="step-content">
                <p>{{ $need->tanggal_pengiriman ? date('d F Y - H:i', strtotime($need->tanggal_pengiriman)) : '-' }}</p>
            </div>
        </li>
        <li class="@if (isset($need->tanggal_diterima)) completed @endif">
            <a href="#!">
                <span class="circle">
                    @if (isset($need->tanggal_diterima))
                        <i class="fa-solid fa-check"></i>
                    @endif
                </span>
                <span class="label">Barang Diterima</span>
            </a>
            <div class="step-content">
                <p>{{ $need->tanggal_diterima ? date('d F Y - H:i', strtotime($need->tanggal_diterima)) : '-' }}</p>
            </div>
        </li> --}}
    </ul>
</div>
<div class="modal-footer">
    <button class="btn btn-outline-primary rounded-5">Cancel Pesanan</button>
    @if ($rejectedStatusExists === true)
        <a href="/my-inventories/need-actions/{{ $need->id }}/edit-status" class="btn btn-danger rounded-5">Telah
            Ditolak</a>
    @else
        <a href="/my-inventories/need-actions/{{ $need->id }}/edit-status"
            class="btn btn-primary rounded-5">Perbarui
            Pesanan</a>
    @endif

</div>

<style>
    ul.stepper {
        padding: 0;
        overflow-x: hidden;
        overflow-y: auto;
        counter-reset: section;
    }

    .stepper-vertical {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    ul.stepper li {
        height: -webkit-min-content;
        height: -moz-min-content;
        height: min-content;
    }

    .stepper-vertical li {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: flex-start;
    }

    ul.stepper li a {
        padding: .5rem 1.5rem;
        text-align: center;
        text-decoration: none;
    }

    .stepper-vertical li a {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-item-align: start;
        align-self: flex-start;
    }

    ul.stepper li.active a .circle,
    ul.stepper li.completed a .circle {
        background-color: #4285f4 !important;
    }

    ul.stepper li a .circle {
        display: inline-block;
        width: 1.75rem;
        height: 1.75rem;
        margin-right: 0.5rem;
        line-height: 1.7rem;
        color: #fff;
        text-align: center;
        background-color: #FFFFFF;
        border: 1px solid #4285f4;
        border-radius: 50%;
        padding: 6px;
    }

    .stepper-vertical li a .circle {
        -webkit-box-ordinal-group: 2;
        -ms-flex-order: 1;
        order: 1;
    }

    ul.stepper li.active a .label,
    ul.stepper li.completed a .label {
        font-weight: 600;
        color: rgba(0, 0, 0, 0.87);
    }

    ul.stepper li a .label {
        display: inline-block;
        color: rgba(0, 0, 0, 0.38);
    }

    .stepper-vertical li a .label {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-flow: column nowrap;
        flex-flow: column nowrap;
        -webkit-box-ordinal-group: 3;
        -ms-flex-order: 2;
        order: 2;
        margin-top: 0.2rem;
    }

    .stepper-vertical li:not(:last-child):after {
        position: absolute;
        top: 44%;
        left: 8%;
        width: 1px;
        height: calc(100% - 30px);
        content: "";
        background-color: rgba(0, 0, 0, 0.1);
    }

    .stepper-vertical li .step-content {
        display: block;
        padding-left: 0.94rem;
        margin-top: 0;
        margin-left: 3.13rem;
    }
</style>

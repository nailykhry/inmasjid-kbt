@extends('layout.root')
@section('body')
<header class="px-5 py-3" style="display: flex;justify-content:space-between;align-items:center;">
    <a href="/"><i class="fa-solid fa-chevron-left fs-4"></i></a>
    <h3 style="font-weight:600">{{$title}}</h3>
    <img src="{{ asset('assets/images/MySpareLogs.png') }}" style="width: 180px; padding-top:8px">
</header>

<form action="{{ url('inventory/update/'. $inventory->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="container my-5">
        <div class="row border border-1 border-secondary-subtle p-3">
            <h5>Kategori</h5>
            <p class="mb-0">{{$type->nama_jenis}}</p>
        </div>
            <div class="row" style="border:1px solid rgba(159, 159, 159, 1);padding:20px">
                <h5>Detail Iklan</h5>
                <p class="mb-1">Kondisi</p>
                <div class="row">
                    <div class="d-flex gap-2 mb-3">
                        <input type="hidden" name="type_id" value="{{$type->id}}">
                        <label>
                            <input type="radio" name="kondisi" value="baru" {{$inventory->kondisi == 'baru' ? 'checked' : ''}}>
                            <div class="btn border rounded-0 border-black">
                                <span>Baru</span>
                            </div>
                        </label>
                        <label>
                            <input type="radio" name="kondisi" value="bekas" {{$inventory->kondisi == 'bekas' ? 'checked' : ''}}>
                            <div class="btn border rounded-0 border-black">
                                <span>Bekas</span>
                            </div>
                        </label>
                    </div>
                </div>
                <label class="my-2">
                    <h5>Judul Iklan*</h5>
                    <input type="text" name="nama" class="form-control" value="{{$inventory->nama}}" required>
                </label>
                <label for="stok" class="w-25 my-2">
                    <h5>On Hand Stock*</h5>
                    <div class="input-group input-group-lg border rounded-3">
                        <button class="btn btn-outline-dark-subtle" type="button" id="button-addon1" onclick="stepDown()">-</button>
                        <input name="stok" id="stok" type="number" value="{{$inventory->stok}}" min="0" class="form-control text-center" required>
                        <button class="btn btn-outline-dark-subtle" type="button" id="button-addon2" onclick="stepUp()">+</button>
                    </div>
                </label>
                <label class="my-2">
                    <h5>Deskripsi</h5>
                    <textarea rows="4" type="text" name="deskripsi" class="form-control mb-3">{{$inventory->deskripsi}}</textarea>
                </label>
                <label class="my-2">
                    <h5>Lokasi*</h5>
                    <input type="text" name="lokasi" class="form-control mb-3" value="{{$pic_data->cabang}}" readonly>
                </label>
            </div>
            <div class="row" style="border:1px solid rgba(159, 159, 159, 1);padding:20px">
                <h5>Unggah Foto Barang</h5>
                <div class="row col-12 g-3" id="imagesPreview">
                    @foreach($inventory->images as $image)
                    <div class="col-3" id="imgInventory-{{$image->id}}">
                        <img src="{{ asset('images/inventories/'.$image->filename) }}" class="img-fluid">
                        <button type="button" class="btn btn-danger" onclick="deleteImg(event, {{$image->id}})">Hapus</button>
                    </div>
                    @endforeach
                </div>
                <div class="row col-3 g-3">
                    <label class="label col-12 m-0" for="images">
                        <input type="file" name="imageFile[]" class="custom-file-input" id="images" accept=".jpg, .jpeg, .png" multiple/>
                        <span class="d-block text-center">
                            <i class="fa-solid fa-camera fa-5x"></i>
                            <h5 class="fw-bold">
                                Tambahkan foto
                            </h5>
                        </span>
                    </label>
                </div>
            </div>
            <div class="row" style="border:1px solid rgba(159, 159, 159, 1);padding:20px">
                <h5 style="padding-bottom: 10px">Data PIC</h5>
                <div class="col-lg-10 col-sm-8">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div style="font-weight:400;font-size:24px;color:rgba(153, 153, 153, 1);padding-bottom:10px">Nama</div>
                            <input type="text" name="nama_pic" class="form-control" value="{{$pic_data->name}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div style="font-weight:400;font-size:24px;color:rgba(153, 153, 153, 1);padding-bottom:10px">No. Telp</div>
                            <input type="text" name="telp_pic" class="form-control" value="{{$pic_data->phone}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="border:1px solid rgba(159, 159, 159, 1);padding:20px;display:flex;justify-content:center">
                <button type="submit" class="btn btn-primary btn-lg" style="width: 278px;">Perbarui Iklan</button>
            </div>
    </div>
</form>
<style>
    input[type="radio"] {
        display: none;
    }
    input[type="radio"]:checked + .btn {
        background-color: #5EA7C3;
        color: #fff;
    }

    .label input[type="file"] {
        position: absolute;
        top: -1000px;
      }
      .label {
        cursor: pointer;
        border: 2px solid #000;
        padding: 5px 15px;
        margin: 5px;
        background: #dddddd;
        display: inline-block;
      }
      .label:hover {
        background: #fff;
      }
      .label:active {
        background: #9fa1a0;
      }
      .label:invalid + span {
        color: #000000;
      }
      .label:valid + span {
        color: #ffffff;
      }

      input[type="number"] {
        -webkit-appearance: textfield;
        -moz-appearance: textfield;
        appearance: textfield;
    }
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
    }
</style>

<script>
    function stepUp(){
        var input = document.getElementById("stok");
        input.stepUp();
    }

    function stepDown(){
        var input = document.getElementById("stok");
        input.stepDown();
    }
</script>

<script >
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function() {
        // Multiple images preview with JavaScript
        const previewImages = (input, imgPreviewPlaceholder) => {

            if (input.files) {
                var filesAmount = input.files.length;

                if (filesAmount > 4){
                    console.log('Maksimal 4 gambar');
                    $(this).val('');
                    return;
                }

                let images = input.files;

                localStorage.setItem('images', JSON.stringify(images));

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        if(filesAmount < 1){
                            $($.parseHTML('<div>')).attr('class', 'col-auto').appendTo(imgPreviewPlaceholder);
                        }
                        $($.parseHTML('<div>')).attr('class', 'col-3').appendTo(imgPreviewPlaceholder);
                        $($.parseHTML('<img>')).attr('src', event.target.result).attr('class', 'img-fluid').appendTo(imgPreviewPlaceholder + ' div:last-child');
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#images').on('change', function() {
            if ($('div#imagesPreview').children().length < 4) {
                previewImages(this, 'div#imagesPreview');
            } else {
                console.log('Maksimal 4 gambar');
                $(this).val('');
            }
        });


    });
    function deleteImg(e, id) {
        e.preventDefault();
        var result = confirm('Are you sure?')
        if (result) {
            $.ajax({
                type: "DELETE",
                url: `{{ url('inventory-image/delete/${id}') }}`,
                cache: false,
                success: function (response) {
                    $('#imgInventory-'+id).remove();
                }
            });
        } else {
            alert('Data is Safe!')
        }
    }
</script>
@include('layout.footer')
@endsection

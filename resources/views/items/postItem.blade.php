@extends('layout.plain')

@section('content')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    #map {
        height: 300px;
    }

    .btn.btn-warning {
        background-color: #FF6D2C !important;
        border-color: #FF6D2C !important;
    }

    .active>.page-link,
    .page-link.active {
        background: #FF6D2C !important;
    }

    .preview-images {
        margin-top: 10px;
    }

    .preview-images img {
        max-width: 100%;
        max-height: 200px;
        margin-bottom: 10px;
    }
</style>

<div class="container my-5 p-5 border rounded-3">
    <form action="{{ route('lost-founds.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="category">Kategori</label>
            <select class="form-control" id="category" name="category">
                <option value="Hilang">Hilang</option>
                <option value="Ditemukan">Ditemukan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="item_name">Nama Barang</label>
            <input type="text" class="form-control" id="item_name" name="item_name" value="">
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" style="min-height: 120px;"></textarea>
        </div>
        <div class="form-group">
            <label for="location">Lokasi</label>
            <div class="input-group">
                <input type="text" class="form-control" id="location" name="location" value="">
                <div class="input-group-append">
                    <button type="button" class="btn btn-warning text-white" onclick="
                        searchLocation()">Cari Lokasi</button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="map">Pin di Peta</label>
            <div id="map"></div>
        </div>
        <input type="hidden" class="form-control" id="latitude" name="latitude">
        <input type="hidden" class="form-control" id="longitude" name="longitude">


        <label class="mt-4">Unggah Foto Barang</label>
        <div class="row border border-solid p-5 m-1">
            <div class="row col-12 g-3" id="imagesPreview">
            </div>
            <div class="row col-12 g-3">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label class="label col-12 m-0" for="images1" id="label1">
                        <input type="file" name="item_images[]" class="form-control" id="images1" hidden
                            accept=".jpg, .jpeg, .png" multiple="true"
                            onchange="previewImages(this, 'preview1', 'label1')" />
                        <span class="d-block text-center">
                            <i class="fa-solid fa-camera fa-5x  border border-solid p-4"></i>
                            <h5 class="fw-bold" id="label1">
                                Tambahkan foto
                            </h5>
                        </span>
                    </label>
                    <div id="preview1" class="preview-images"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label class="label col-12 m-0" for="images2" id="label2">
                        <input type="file" name="item_images[]" class="form-control" id="images2" hidden
                            accept=".jpg, .jpeg, .png" multiple="true"
                            onchange="previewImages(this, 'preview2', 'label2')" />
                        <span class="d-block text-center">
                            <i class="fa-solid fa-camera fa-5x  border border-solid p-4"></i>
                            <h5 class="fw-bold" id="label2">
                                Tambahkan foto
                            </h5>
                        </span>
                    </label>
                    <div id="preview2" class="preview-images"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label class="label col-12 m-0" for="images3" id="label3">
                        <input type="file" name="item_images[]" class="form-control" id="images3" hidden
                            accept=".jpg, .jpeg, .png" multiple="true"
                            onchange="previewImages(this, 'preview3', 'label3')" />
                        <span class="d-block text-center">
                            <i class="fa-solid fa-camera fa-5x  border border-solid p-4"></i>
                            <h5 class="fw-bold" id="label3">
                                Tambahkan foto
                            </h5>
                        </span>
                    </label>
                    <div id="preview3" class="preview-images"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label class="label col-12 m-0" for="images4" id="label4">
                        <input type="file" name="item_images[]" class="form-control" id="images4"
                            accept=".jpg, .jpeg, .png" multiple="true"
                            onchange="previewImages(this, 'preview4', 'label4')" hidden />
                        <span class="d-block text-center">
                            <i class="fa-solid fa-camera fa-5x  border border-solid p-4"></i>
                            <h5 class="fw-bold" id="label4">
                                Tambahkan foto
                            </h5>
                        </span>
                    </label>
                    <div id="preview4" class="preview-images"></div>
                </div>
            </div>
        </div>



        <div class="row mt-4">
            <h5 style="padding-bottom: 10px">Data PIC</h5>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div>Nama</div>
                        <input type="text" name="pic_name" class="form-control">
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div>No. Telp</div>
                        <input type="text" name="pic_phone" class="form-control">
                    </div>
                </div>
            </div>
            <div id="preview1" class="preview-images" style="width: 20%"></div>
        </div>

        <button type="submit" class="btn btn-warning text-white rounded-pill mt-4 px-4">Laporkan</button>
    </form>
</div>

<script src=" https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
    var map = L.map('map').setView([-7.279722, 112.797917], 16); // Institut Teknologi Sepuluh Nopember (ITS) coordinates

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker;

        function updateMarkerAndInputs(latlng) {
            if (marker) {
                marker.setLatLng(latlng);
            } else {
                marker = L.marker(latlng).addTo(map);
            }
            document.getElementById('latitude').value = latlng.lat.toFixed(7);
            document.getElementById('longitude').value = latlng.lng.toFixed(7);
        }

        function searchLocation() {
            var location = document.getElementById("location").value.trim();

            if (location === "") {
                alert("Please enter a location.");
                return;
            }

            fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + location)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.length > 0) {
                        var lat = parseFloat(data[0].lat);
                        var lon = parseFloat(data[0].lon);
                        map.setView([lat, lon], 16);
                        updateMarkerAndInputs([lat, lon]);
                    } else {
                        alert('Searching...');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Searching...');
                });
        }

        map.on('click', function (e) {
            updateMarkerAndInputs(e.latlng);
        });


</script>
<script>
    function previewImages(input, previewId, labelId) {
        var files = input.files;

        var label = document.getElementById(labelId);
        label.style.height = '0';
        label.style.width = '0';
        label.style.overflow = 'hidden';

        var preview = document.getElementById(previewId);
        preview.innerHTML = '';

        if (files.length === 0) {
            label.querySelector('h5').innerText = 'Tambahkan foto';
        } else {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var reader = new FileReader();

                reader.onload = function(event) {
                    var image = document.createElement('img');
                    image.className = 'img-fluid';
                    image.src = event.target.result;
                    preview.appendChild(image);
                }

                reader.readAsDataURL(file);
            }

            if (files.length === 1) {
                label.querySelector('h5').innerText = files[0].name;
            } else {
                label.querySelector('h5').innerText = files.length + ' file dipilih';
            }
        }
    }
</script>


@endsection
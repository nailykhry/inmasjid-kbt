<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOST FOUND EXAMPLE</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #map {
            height: 300px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Add Lost Item</h1>
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
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="location">Lokasi</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="location" name="location" value="">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary" onclick="searchLocation()">Cari Lokasi</button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="map">Pin di Peta</label>
                <div id="map"></div>
            </div>
            <input type="hidden" class="form-control" id="latitude" name="latitude">
            <input type="hidden" class="form-control" id="longitude" name="longitude">


            <label for="photos">Upload Photos:</label>
            <input type="file" class="form-control" name="item_images[]" placeholder="Upload Image" multiple="true">
            <input type="file" class="form-control" name="item_images[]" placeholder="Upload Image" multiple="true">
            <input type="file" class="form-control" name="item_images[]" placeholder="Upload Image" multiple="true">




            <div class=" form-group">
                <label for="pic_name">Nama PIC</label>
                <input type="text" class="form-control" id="pic_name" name="pic_name" value="">
            </div>
            <div class="form-group">
                <label for="pic_phone">No Telp PIC</label>
                <input type="text" class="form-control" id="pic_phone" name="pic_phone" value="">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
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
</body>

</html>
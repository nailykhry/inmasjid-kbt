@extends('layout.main')

@section('title', 'Home')

@section('content')

<style>
    /* Your existing styles */
    #mapid {
        height: 400px;
        width: 70%;
        margin: 0 25vh;
    }
</style>

<div class="mt-5" id="mainContent">

    <!-- Banner and other content -->

    <div class="container pb-4 text-center">
        <h1 class="fw-bold">DAFTAR BARANG BERDASARKAN MAPS</h1>
    </div>

    <!-- Search Form -->
    <div class="container">
        <form id="search-form" method="GET" class="mb-4">
            <div class="row">
                <div class="mb-3">
                    <label for="location" class="form-label">Cari Lokasi</label>
                    <input type="text" class="form-control" id="location" name="location"
                        placeholder="Masukkan lokasi ...">
                </div>

                <input type="hidden" class="form-control" id="latitude" name="latitude">
                <input type="hidden" class="form-control" id="longitude" name="longitude">

                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Display Map -->
    <div id="mapid"></div>

    <!-- Display Items -->
    <div class="bg-warning mt-5">
        <!-- Your existing code for displaying search result message -->
    </div>

    <div class="container" id="items-container">
        <div class="row row-cols-xl-4 row-cols-md-2 row-cols-sm-1 pt-3 mb-4 g-3 mt-3" id="items-row">
            @foreach ($items as $item)
            <div class="col item" data-lat="{{ $item['latitude'] }}" data-lng="{{ $item['longitude'] }}">
                <a href="{{ route('lost-founds.show', $item['id']) }}" style="height:100%;text-decoration:none">
                    <div class="card my-2 rounded-0" style="background-color:#F4F5F7; height:100%">
                        @php
                        $imagePath = isset($item['itemImages']) && count($item['itemImages']) > 0
                        ? Storage::url($item['itemImages'][0]['image_path'])
                        : asset('assets/images/image dummy.png');
                        @endphp

                        <img src="{{ $imagePath }}" width="285px" height="301px" class="card-img-top rounded-0"
                            alt="product-image">

                        <div class="card-body">
                            <span class="d-flex gap-2">
                                <h4 class="card-title fw-medium">{{ $item['item_name'] }}</h4>
                            </span>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $item['description'] }} | Barang {{
                                $item['category'] }}</h6>

                            <div class="btn btn-warning text-white rounded-pill mt-2 px-4">Klaim</div>
                            <p class="text-end mb-0 mt-2">{{ $item['updated_at']->format('d F Y') }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            <nav aria-label="...">
                <ul class="pagination pagination-lg">
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">1</span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            <!-- Your existing pagination code -->
        </div>
    </div>
</div>

@include('layout.footer2')

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<script>
    var map = L.map('mapid').setView([-6.2088, 106.8456], 13); // Default view for Jakarta

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
    }).addTo(map);

    // Function to add a marker to the map
    function addMarker(lat, lng, title) {
        L.marker([lat, lng]).addTo(map)
            .bindPopup(title)
            .openPopup();
    }

    // Load items and add markers based on coordinates
    @foreach ($items as $item)
        addMarker({{ $item['latitude'] }}, {{ $item['longitude'] }}, "{{ $item['item_name'] }}");
    @endforeach

    // Function to calculate distance using Haversine formula
    function calculateDistance(lat1, lon1, lat2, lon2) {
        function toRad(x) {
            return x * Math.PI / 180;
        }

        var R = 6371; // Radius of the earth in km
        var dLat = toRad(lat2 - lat1);
        var dLon = toRad(lon2 - lon1);
        var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c; // Distance in km
        return d;
    }

    // Handle form submission to update map and fetch sorted items
    document.getElementById('search-form').addEventListener('submit', function(event) {
        event.preventDefault();
        var location = document.getElementById('location').value;

        // Fetch latitude and longitude using Nominatim API
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${location}`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    var lat = data[0].lat;
                    var lng = data[0].lon;

                    // Set latitude and longitude fields
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;

                    // Clear existing markers
                    map.eachLayer(function (layer) {
                        if (layer instanceof L.Marker) {
                            map.removeLayer(layer);
                        }
                    });

                    // Add marker for the searched location
                    addMarker(lat, lng, "Searched Location");

                    // Set new view based on location
                    map.setView([lat, lng], 13);

                    // Fetch sorted items from the server
                    fetch(`/items?latitude=${lat}&longitude=${lng}`)
                        .then(response => response.json())
                        .then(sortedItems => {
                            // Update the DOM with sorted items
                            var itemsContainer = document.getElementById('items-row');
                            itemsContainer.innerHTML = '';
                            sortedItems.forEach(function(item) {
                                var itemHtml = `
                                    <div class="col item" data-lat="${item.latitude}" data-lng="${item.longitude}">
                                        <a href="/lost-founds/show/${item.id}" style="height:100%;text-decoration:none">
                                            <div class="card my-2 rounded-0" style="background-color:#F4F5F7; height:100%">
                                                <img src="${item.imagePath}" width="285px" height="301px" class="card-img-top rounded-0" alt="product-image">
                                                <div class="card-body">
                                                    <span class="d-flex gap-2">
                                                        <h4 class="card-title fw-medium">${item.item_name}</h4>
                                                    </span>
                                                    <h6 class="card-subtitle mb-2 text-body-secondary">${item.description} | Barang ${item.category}</h6>
                                                    <div class="btn btn-warning text-white rounded-pill mt-2 px-4">Klaim</div>
                                                    <p class="text-end mb-0 mt-2">${new Date(item.updated_at).toLocaleDateString()}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>`;
                                itemsContainer.insertAdjacentHTML('beforeend', itemHtml);
                                addMarker(item.latitude, item.longitude, item.item_name);
                            });
                        })
                        .catch(error => console.log('Error fetching sorted items:', error));
                } else {
                    alert("Location not found. Please try another search.");
                }
            })
            .catch(error => console.log('Error:', error));
    });
</script>

@endsection
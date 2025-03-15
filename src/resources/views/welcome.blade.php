<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Map</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- OpenStreetMap Leaflet CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Figtree', sans-serif;
        }
        #map {
            height: 100vh;
            width: 100%;
        }
        .map-overlay {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 1000;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            margin: 0 0 10px 0;
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="map-overlay">
        <h1>{{ config('app.name') }}</h1>
        <p>Welcome to our interactive map!</p>
    </div>
    <div id="map"></div>

    <script>
        // Initialize the map centered on Riyadh
        var map = L.map('map').setView([24.7136, 46.6753], 11);

        // Add OpenStreetMap tiles
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Add a marker for Riyadh city center
        L.marker([24.7136, 46.6753]).addTo(map)
            .bindPopup('Riyadh City Center')
            .openPopup();
    </script>
</body>
</html>

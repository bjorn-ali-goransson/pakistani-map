<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Map</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- OpenStreetMap Leaflet CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>

    <style>
        :root {
            --primary-color: #2563eb;
            --text-color: #f8fafc;
            --bg-overlay: rgba(17, 24, 39, 0.95);
            --border-color: rgba(255, 255, 255, 0.1);
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Figtree', sans-serif;
            color: var(--text-color);
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
            background: var(--bg-overlay);
            padding: 24px;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 
                        0 2px 4px -1px rgba(0, 0, 0, 0.06),
                        0 0 0 1px var(--border-color);
            backdrop-filter: blur(8px);
            max-width: 320px;
        }

        h1 {
            margin: 0 0 12px 0;
            font-size: 24px;
            font-weight: 600;
            color: var(--text-color);
            letter-spacing: -0.025em;
        }

        p {
            margin: 0;
            font-size: 15px;
            line-height: 1.5;
            color: rgba(248, 250, 252, 0.8);
        }

        /* Custom map styles */
        .leaflet-popup-content-wrapper {
            background: var(--bg-overlay);
            color: var(--text-color);
            border-radius: 12px;
            border: 1px solid var(--border-color);
            backdrop-filter: blur(8px);
        }

        .leaflet-popup-tip {
            background: var(--bg-overlay);
            border: 1px solid var(--border-color);
        }

        .leaflet-popup-content {
            margin: 12px 16px;
            font-family: 'Figtree', sans-serif;
        }

        .leaflet-control-zoom a {
            background: var(--bg-overlay) !important;
            color: var(--text-color) !important;
            border: 1px solid var(--border-color) !important;
        }

        .leaflet-control-zoom a:hover {
            background: rgba(37, 99, 235, 0.8) !important;
        }

        /* Style the attribution */
        .leaflet-control-attribution {
            background: var(--bg-overlay) !important;
            color: var(--text-color) !important;
            padding: 4px 8px !important;
            border-radius: 6px !important;
            backdrop-filter: blur(8px);
        }

        .leaflet-control-attribution a {
            color: var(--primary-color) !important;
        }
    </style>
</head>
<body>
    <div class="map-overlay">
        <h1>{{ config('app.name') }}</h1>
        <p>Explore Riyadh's interactive city map with real-time updates and key locations.</p>
    </div>
    <div id="map"></div>

    <script>
        // Initialize the map centered on Riyadh
        var map = L.map('map', {
            zoomControl: false  // We'll add it manually for better positioning
        }).setView([24.7136, 46.6753], 11);

        // Add zoom control to top right
        L.control.zoom({
            position: 'topright'
        }).addTo(map);

        // Add modern map tiles from Stadia Maps
        L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png', {
            maxZoom: 20,
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add a marker for Riyadh city center
        L.marker([24.7136, 46.6753]).addTo(map)
            .bindPopup('<strong>Riyadh City Center</strong><br>The heart of Saudi Arabia\'s capital')
            .openPopup();
    </script>
</body>
</html>

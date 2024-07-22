@extends('layouts.main')
@section('container')
    <div class="w-full h-full">
        <div id="mapid" class="h-full w-full"></div>
    </div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
    <script>
        var mymap = L.map('mapid').setView([-7.797068, 110.370529], 13);
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);
    
        var userIcon = L.icon({
            iconUrl: "{{ asset('assets/user.svg') }}",
            iconSize: [40, 40],
            iconAnchor: [20, 20],
            popupAnchor: [-3, -76],
            shadowSize: [68, 95],
            shadowAnchor: [22, 94]
        });
        var trashIcon = L.icon({
            iconUrl: "{{ asset('assets/trash.svg') }}",
            iconSize: [40, 40],
            iconAnchor: [20, 20],
            popupAnchor: [0, -60],
            shadowSize: [68, 95],
            shadowAnchor: [22, 94]
        });
    
        // Marker untuk lokasi pengguna
        var userLocationMarker;
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;
                userLocationMarker = L.marker([lat, lon], {
                    icon: userIcon
                }).addTo(mymap).bindTooltip("Lokasi Pengguna").openTooltip();
                mymap.setView([lat, lon], 13);
            });
        } else {
            alert("Geolocation tidak didukung oleh browser ini.");
        }
    
        // Data lokasi pengelolaan sampah (dapat diambil dari API atau database)
        var wasteManagementLocations = [{
                "lat": -7.795580,
                "lon": 110.369490,
                "name": "Pengelolaan Sampah 1"
            },
            {
                "lat": -7.799060,
                "lon": 110.373400,
                "name": "Pengelolaan Sampah 2"
            }
        ];
    
        // Variabel untuk menyimpan kontrol routing yang sedang aktif
        var routingControl;
    
        // Fungsi untuk membuat rute
        function createRoute(lat, lon) {
            if (userLocationMarker) {
                // Hapus rute sebelumnya jika ada
                if (routingControl) {
                    mymap.removeControl(routingControl);
                }
                // Buat rute baru
                routingControl = L.Routing.control({
                    waypoints: [
                        L.latLng(userLocationMarker.getLatLng().lat, userLocationMarker.getLatLng().lng, {
                            icon: trashIcon
                        }),
                        L.latLng(lat, lon, {
                            icon: trashIcon
                        })
                    ],
                    routeWhileDragging: true
                }).addTo(mymap);
            } else {
                alert("Lokasi pengguna tidak ditemukan.");
            }
        }
    
        // Tambahkan marker untuk setiap lokasi pengelolaan sampah dan tambahkan event click untuk membuat rute
        wasteManagementLocations.forEach(function(location) {
            var marker = L.marker([location.lat, location.lon], {
                icon: trashIcon
            }).addTo(mymap).bindTooltip(location.name);
            marker.openTooltip()
            marker.on('click', function() {
                createRoute(location.lat, location.lon);
            });
            marker.on('hover', function() {
                marker.openTooltip()
            });
        });
    </script>
@endsection

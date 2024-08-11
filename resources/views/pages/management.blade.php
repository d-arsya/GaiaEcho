@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layouts.main')
@section('container')
    <div class="h-screen z-0" id="mapid">
    </div>
    <div id="info" class="fixed bottom-24 md:bottom-6 right-6 w-max bg-mainGreen p-2 rounded-md text-white">
        <div id="jarak" class=""><img class="inline" src="{{asset('assets/location.svg')}}" alt=""> 0 km</div>
        <div id="jam" class=""><img class="inline" src="{{asset('assets/clock.svg')}}" alt=""> 0 menit</div>
    </div>
@endsection

@php
use App\Models\Waste;
$waste = Waste::all();    
@endphp

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log(@json($waste))
        var map = L.map('mapid', {
            zoomControl: false
        }).setView([-7.797068, 110.370529], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var locations = @json($waste);

        locations.forEach(function(location) {
            var marker = L.marker([location.latitude, location.longitude]).addTo(map)
            .bindTooltip(location.name, { permanent: true, direction: 'top' })
            .bindPopup(
                `<b>${location.name}</b><br><a href="${location.maps}" target="_blank">Lihat di Google Maps</a>`
            );
            
            marker.on('mouseover',function(){
                marker.bindTooltip(location.name, { permanent: false, direction: 'top' })
            })

            marker.on('click', function() {
                if (true) {
                    if (routingControl) {
                        map.removeControl(routingControl);
                    }

                    routingControl = L.Routing.control({
                        show:false,
                        waypoints: [
                            L.latLng(-7.7857224, 110.3666281,14),
                            L.latLng(location.latitude, location.longitude)
                        ],
                        routeWhileDragging: false,
                        fitSelectedRoutes: false,
                        lineOptions: {
                            styles: [{
                                color: 'green',
                                weight: 4
                            }]
                        },
                        createMarker: () => null, // Menghilangkan marker pada rute
                        showAlternatives: false
                    }).addTo(map);

                    routingControl.on('routesfound', function(e) {
                    var route = e.routes[0]; // Mengambil rute pertama
                    var distance = (route.summary.totalDistance / 1000).toFixed(1)
                    var duration = (route.summary.totalTime / 60).toFixed(0)
                    document.querySelector('#jarak').innerHTML=distance+" km"
                    document.querySelector('#jam').innerHTML=duration+" menit"
                });
                } else {
                    alert(
                        "Lokasi pengguna tidak ditemukan. Pastikan izin lokasi telah diberikan.");
                }
            });
        });

        var userLocation = null;
        var routingControl = null;

        function onLocationFound(e) {
            userLocation = e.latlng;
            var radius = e.accuracy / 2;

            L.marker(userLocation).addTo(map)
        }

        function onLocationError(e) {
            alert(e.message);
        }

        map.locate({
            setView: true,
            maxZoom: 16
        });
    });
</script>

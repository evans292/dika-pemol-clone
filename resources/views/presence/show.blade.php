<x-main-layout>
    <x-slot name="title">
            Absen Tanggal {{ $presence->tanggal }} - {{ $presence->user->name }}
    </x-slot>
    <x-slot name="style">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>
        
        <style>
            #mapid { height: 200px; }
            #mapid2 { height: 200px; }
        </style>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div id="mapid"></div>
                    <br>
                    <div id="mapid2"></div>
                    <br>
                        <img src="{{ asset('storage') . '/' . $presence->pic }}" alt="" class="w-1/4 h-1/4 rounded-md">
                    <br>
                    <br>
                    <i class="far fa-user mr-1 text-green-400"></i> Nama Sales : {{ $presence->user->name }}
                    <br>
                    <br>
                    <i class="fas fa-calendar-alt mr-1 text-blue-400"></i> Tanggal : {{ $presence->tanggal }}
                    <br>
                    <br>
                    <i class="fas fa-sun mr-1 text-yellow-400"></i> Absen Pagi : {{ $presence->absen_pagi }} ({{ ($presence->absen_pagi <= '08:00:00') ? 'Tepat waktu' : 'Terlambat' }})
                    <br>
                    <br>
                    <i class="fas fa-cloud-sun mr-1 text-red-400"></i> Closing  : {{ ($presence->closing == null) ? 'belum' : $presence->closing}}
                    <br>
                    <br>
                    {{-- <i class="fas fa-map-marker-alt mr-1 text-yellow-400"></i> Latitude Pagi  : {{ $presence->latitude }}
                    <br>
                    <br>
                    <i class="fas fa-map-marker-alt mr-1 text-yellow-400"></i> Longitude Pagi  : {{ $presence->longitude }}
                    <br>
                    <br>
                    <i class="fas fa-map-marker-alt mr-1 text-red-400"></i> Latitude Sore  : {{ $presence->latitude_sore }}
                    <br>
                    <br>
                    <i class="fas fa-map-marker-alt mr-1 text-red-400"></i> Longitude Sore  : {{ $presence->longitude_sore }} --}}
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script src="{{ asset('js/leaflet.js') }}"></script>
        <script>
            // ============ location ==========================
            function showPosition() {
                let mymap = L.map('mapid').setView([{{ $presence->latitude }}, {{ $presence->longitude }}], 13);
                let marker = L.marker([{{ $presence->latitude }}, {{ $presence->longitude }}]).addTo(mymap);
                
                marker.bindPopup("<b>Posisi mu saat absen.</b>").openPopup();

                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery ?? <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoidHViYWd1c2dmIiwiYSI6ImNrbW41d294ZTFsd3Eyd3J3MnJnYzI2b2MifQ.WWWGizDgm95hPzgAPSm7eQ'
            }).addTo(mymap);
            }

            function showPosition2() {
                let mymap = L.map('mapid2').setView([{{ $presence->latitude_sore }}, {{ $presence->longitude_sore }}], 13);
                let marker = L.marker([{{ $presence->latitude_sore }}, {{ $presence->longitude_sore }}]).addTo(mymap);
                
                marker.bindPopup("<b>Posisi mu saat closing.</b>").openPopup();

                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery ?? <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoidHViYWd1c2dmIiwiYSI6ImNrbW41d294ZTFsd3Eyd3J3MnJnYzI2b2MifQ.WWWGizDgm95hPzgAPSm7eQ'
            }).addTo(mymap);
            }

            showPosition()
            showPosition2()
        </script>
    </x-slot>
</x-main-layout>

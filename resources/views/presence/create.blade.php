<x-main-layout>
    <x-slot name="title">
            {{ __('Absen Pagi') }}
    </x-slot>
    <x-slot name="style">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>
        
        <style>
            #mapid { height: 200px; }
        </style>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                    <div id="mapid"></div>
                        <form action="{{ route('presence.store') }}" method="post" class="mt-5" novalidate enctype="multipart/form-data">
                            @csrf                            
                            <div class="mb-4">
                                <x-label for="user_id" :value="__('Id Sales')" />
                                <x-input id="user_id" class="block mt-1 w-full bg-gray-50" type="text" value="{{ Auth::user()->id }}" name="user_id"  readonly/>
                                <x-validation-message name="user_id"/>
                            </div>
                            <div class="mb-4">
                                <x-label for="tanggal" :value="__('Tanggal')" />
                                <x-input id="tanggal" class="block mt-1 w-full bg-gray-50" type="text" value="{{ date('Y-m-d') }}" name="tanggal"  readonly/>
                                <x-validation-message name="tanggal"/>
                            </div>
                            <div class="mb-4">
                                <x-label for="absen" :value="__('Absen Pagi')" />
                                <x-input id="absen" class="block mt-1 w-full bg-gray-50" type="text" value="{{ date('H:i:s') }}" name="absen"  readonly/>
                                <x-validation-message name="absen"/>
                            </div>
                            <div class="mb-4">
                                <x-label for="lat" :value="__('Latitude')" />
                                <x-input id="lat" class="block mt-1 w-full bg-gray-50" type="text" value="{{ date('H:i:s') }}" name="lat"  readonly/>
                                <x-validation-message name="lat"/>
                            </div>
                            <div class="mb-4">
                                <x-label for="long" :value="__('Longitude')" />
                                <x-input id="long" class="block mt-1 w-full bg-gray-50" type="text" value="{{ date('H:i:s') }}" name="long" readonly/>
                                <x-validation-message name="long"/>
                            </div>
                            <div class="mb-4">
                                <x-label for="pic" :value="__('Selfie')" />
                                <input id="pic" class="block mt-1 w-full" type="file" name="pic" capture="user" accept="image/*"/>
                                <x-validation-message name="pic"/>
                            </div>
                            <div class="flex items-center justify-end mt-4">            
                                <x-button class="ml-3">
                                    {{ __('Absen') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script src="{{ asset('js/leaflet.js') }}"></script>
        <script>
            // ============ location ==========================
            let lat = document.getElementById('lat');
            let long = document.getElementById('long');

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {
                lat.value = position.coords.latitude
                long.value = position.coords.longitude

                let mymap = L.map('mapid').setView([position.coords.latitude , position.coords.longitude], 13);
                let marker = L.marker([position.coords.latitude , position.coords.longitude]).addTo(mymap);
                
                marker.bindPopup("<b>Posisi mu sekarang.</b>").openPopup();

                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoidHViYWd1c2dmIiwiYSI6ImNrbW41d294ZTFsd3Eyd3J3MnJnYzI2b2MifQ.WWWGizDgm95hPzgAPSm7eQ'
            }).addTo(mymap);
            }

            getLocation()
        </script>
    </x-slot>
</x-main-layout>

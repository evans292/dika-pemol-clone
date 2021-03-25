<x-main-layout>
    <x-slot name="title">
            {{ __('Absensi') }}
    </x-slot>
    <x-slot name="style">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>
        
        <style>
            #mapid { height: 200px; }
        </style>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 id="time" class="text-2xl font-bold"></h1>
                    <div>
                    <i class="fas fa-sun text-yellow-400"></i>
                    <span>Masuk : Paling terlambat pukul 08.00</span>
                    </div>
                    <div>
                    <i class="fas fa-cloud-sun text-red-400"></i>
                    <span>Closing : Mulai pukul 17.00</span>
                    </div>
                    <div id="mapid"></div>

                    <div class="bg-white pb-4 px-4 rounded-md w-full">
                        <div class="flex justify-between w-full pt-6 ">
                          <h1 class="p-1 text-xl font-semibold">Tabel Presensi Hari Ini</h1>
                          <div>
                            @if (date('H:i') <= '08:00')
                            <a href="{{ route('presence.create') }}" class="inline-flex items-center px-4 py-2 bg-yellow-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"><i class="fas fa-sun mr-1"></i>Absen pagi</a>
                            @else
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"><i class="fas fa-sun mr-1"></i>Absen pagi</a>
                            @endif
                          </div>
                    </div>
                    </div>
                    @if ($data !== null)
                    <div class="overflow-x-auto mt-6">
                        <table class="table-auto border-collapse w-full">
                          <thead>
                            <tr class="rounded-lg text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
                              <th class="px-4 py-2 " style="background-color:#f8f8f8">Nama Sales</th>
                              <th class="px-4 py-2 " style="background-color:#f8f8f8">Tanggal</th>
                              <th class="px-4 py-2 " style="background-color:#f8f8f8">Absen Pagi</th>
                              <th class="px-4 py-2 " style="background-color:#f8f8f8">Closing</th>
                              <th class="px-4 py-2 " style="background-color:#f8f8f8">Aksi</th>
                            </tr>
                          </thead>
                          <tbody class="text-sm font-normal text-gray-700">
                            <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">  
                              <td class="px-4 py-4">{{ $data->user->name }}</td>    
                              <td class="px-4 py-4">{{ $data->tanggal }}</td> 
                              <td class="px-4 py-4">{{ $data->absen_pagi }}</td> 
                              <td class="px-4 py-4">
                                @if ($data->closing === null)
                                    belum
                                @else
                                    {{ $data->closing  }}
                                @endif
                              </td> 
                              <td class="px-4 py-4">
                                <a href="{{ route('presence.show', ['presence' => $data->id]) }}"><i class="fas fa-eye text-blue-400"></i></a>
                                @if (date('H:i') >= '17:00')
                                  <a href="{{ route('presence.edit', ['presence' => $data->id]) }}"><i class="fas fa-cloud-sun text-red-400"></i></a>
                                @else
                                <a href="#"><i class="fas fa-cloud-sun text-gray-400"></i></a>                           
                                @endif  
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div> 
                    @else
                    <div class="text-center">
                        @if (date('H:i') > '08:00')
                            Kamu terlambat
                        @else
                            Ayo absen
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if ($datas->count() !== 0)
    <div class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">

                  <div class="bg-white pb-4 px-4 rounded-md w-full">
                      <div class="flex justify-between w-full pt-6 ">
                        <h1 class="p-1 text-xl font-semibold">Tabel Presensi</h1>
                      </div>
                  </div>
                  <div class="overflow-x-auto mt-6">
                      <table class="table-auto border-collapse w-full">
                        <thead>
                          <tr class="rounded-lg text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
                            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">#</th>
                            <th class="px-4 py-2 " style="background-color:#f8f8f8">Nama Sales</th>
                            <th class="px-4 py-2 " style="background-color:#f8f8f8">Tanggal</th>
                            <th class="px-4 py-2 " style="background-color:#f8f8f8">Absen Pagi</th>
                            <th class="px-4 py-2 " style="background-color:#f8f8f8">Closing</th>
                            <th class="px-4 py-2 " style="background-color:#f8f8f8">Aksi</th>
                          </tr>
                        </thead>
                        <tbody class="text-sm font-normal text-gray-700">
                          @foreach ($datas as $data)
                          <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                            <td class="px-4 py-4">{{ ($datas ->currentpage()-1) * $datas ->perpage() + $loop->index + 1 }}</td>    
                            <td class="px-4 py-4">{{ $data->user->name }}</td>    
                            <td class="px-4 py-4">{{ $data->tanggal }}</td> 
                            <td class="px-4 py-4">{{ $data->absen_pagi }}</td> 
                            <td class="px-4 py-4">
                              @if ($data->closing === null)
                                  belum
                              @else
                                  {{ $data->closing  }}
                              @endif
                            </td> 
                            <td class="px-4 py-4">
                              <a href="{{ route('presence.show', ['presence' => $data->id]) }}"><i class="fas fa-eye text-blue-400"></i></a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                      {{ $datas->links() }}
                    </div> 
              </div>
          </div>
      </div>
  </div>
  @endif

    <x-slot name="script">
        <script src="{{ asset('js/leaflet.js') }}"></script>
        @if (session('create'))
          <script>
              document.addEventListener('DOMContentLoaded', function() { 
                  success("Absen berhasil")
              }, true); 
          </script>
        @elseif(session('update'))
        <script>
            document.addEventListener('DOMContentLoaded', function() { 
                success("Closing berhasil")
            }, true); 
        </script>
        @endif
        <script>
            // ============ clock ==========================
            let timeDisplay = document.getElementById("time");

            function refreshTime() {
                let dateString = new Date().toLocaleString("id-ID", {timeZone: "Asia/Jakarta"});
                let formattedString = dateString.replace(", ", " - ");
                timeDisplay.innerHTML = dateString;
            }

            setInterval(refreshTime, 1000);

            // ============ location ==========================
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } 
            }

            function showPosition(position) {
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

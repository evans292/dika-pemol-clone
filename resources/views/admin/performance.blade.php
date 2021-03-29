<x-main-layout>
    <x-slot name="title">
            {{ __('Performa Pegawai') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="bg-white pb-4 px-4 rounded-md w-full">
                        <div class="flex justify-between w-full pt-6 ">
                          <h1 class="p-1 text-xl font-semibold">Tabel Performa</h1>
                        </div>
                    </div>
                      <div class="overflow-x-auto mt-6">
                        <table class="table-auto border-collapse w-full">
                          <thead>
                            <tr class="rounded-lg text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
                              <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">#</th>
                              <th class="px-4 py-2 " style="background-color:#f8f8f8">Nama Sales</th>
                              <th class="px-4 py-2 " style="background-color:#f8f8f8">Hasil Nasabah Terdaftar</th>
                            </tr>
                          </thead>
                          <tbody class="text-sm font-normal text-gray-700">
                            @foreach ($datas as $data)
                            <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                              <td class="px-4 py-4">{{ $loop->iteration }}</td>    
                              <td class="px-4 py-4">{{ $data->name }}</td>    
                              <td class="px-4 py-4">{{ $data->total }}</td>    
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    <x-slot name="script">
        @if (session('login'))
            <script>
                document.addEventListener('DOMContentLoaded', function() { 
                    greet("{{ Auth::user()->name }}", 'bottom-right')
                }, true); 
            </script>
         @endif
    </x-slot>
</x-main-layout>

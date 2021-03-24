<x-main-layout>
    <x-slot name="title">
            {{ __('Data Pemol') }}
    </x-slot>

    <x-slot name="style">
        <style>
            thead tr th:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px;}
            thead tr th:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px;}
            
            tbody tr td:first-child { border-top-left-radius: 5px; border-bottom-left-radius: 0px;}
            tbody tr td:last-child { border-top-right-radius: 5px; border-bottom-right-radius: 0px;}
        </style>
    </x-slot> 

    <div class="px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('data.index') }}" method="GET">
                        @csrf
                        <div class="flex justify-around">
                          <div class="mb-4 w-full mr-4">
                              <x-label for="tgl1" :value="__('Dari Tanggal*')" />
                              <x-input id="tgl1" class="block mt-1 w-full" type="date" name="tgl1" value="" required />
                              <x-validation-message name="tgl1"/>
                          </div>
                          <div class="mb-4 w-full">
                              <x-label for="tgl2" :value="__('Sampai Tanggal*')" />
                              <x-input id="tgl2" class="block mt-1 w-full" type="date" name="tgl2" value="" required />
                              <x-validation-message name="tgl2"/>
                          </div>
                        </div>
  
                        <div class="flex items-center justify-end mt-4">            
                          <x-button class="ml-3">
                              {{ __('Cari') }}
                          </x-button>
                      </div>
                    </form> 
  
                    
                </div>
            </div>
        </div>
      </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="bg-white pb-4 px-4 rounded-md w-full">
                        <div class="flex justify-between w-full pt-6 ">
                          <h1 class="p-1 text-xl font-semibold">Tabel Pemol</h1>
                        <a href="{{ route('data.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"><i class="fas fa-plus mr-1"></i>Tambah Data</a>
                        </div>
                    <div class="w-full flex px-2 mt-2">
                        <div class="w-full sm:w-64 inline-block relative ">
                            <form action="{{ route('data.index') }}" method="GET">
                                @csrf
                                <input type="text" name="key" class="focus:outline-none leading-snug border border-gray-300 block w-full appearance-none bg-gray-100 text-sm text-gray-600 py-1 px-4 pl-8 rounded-lg" placeholder="Cari no. rekening" />
                  
                                <div class="pointer-events-none absolute pl-3 inset-y-0 left-0 flex items-center px-2 text-gray-300">
                      
                                <button type="submit">
                                    <svg class="fill-current h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
                                        <path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
                                      </svg>
                                </button>
                            </form>
                            </div>
                          </div>
                        </div>
                      <div class="overflow-x-auto mt-6">
                        <table class="table-auto border-collapse w-full">
                          <thead>
                            <tr class="rounded-lg text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
                              <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">#</th>
                              <th class="px-4 py-2 " style="background-color:#f8f8f8">No Rekening</th>
                              <th class="px-4 py-2 " style="background-color:#f8f8f8">Tanggal</th>
                              <th class="px-4 py-2 " style="background-color:#f8f8f8">Nama Sales</th>
                              <th class="px-4 py-2 " style="background-color:#f8f8f8">Aksi</th>
                            </tr>
                          </thead>
                          <tbody class="text-sm font-normal text-gray-700">
                            @foreach ($datas as $data)
                            <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                              <td class="px-4 py-4">{{ ($datas ->currentpage()-1) * $datas ->perpage() + $loop->index + 1 }}</td>    
                              <td class="px-4 py-4">{{ $data->no_rek }}</td>    
                              <td class="px-4 py-4">{{ $data->tanggal }}</td> 
                              @if ($data->name !== null)
                              <td class="px-4 py-4">{{ $data->name }} ({{ $data->username }})</td>    
                              @else 
                              <td class="px-4 py-4">{{ $data->user->name }} ({{ $data->user->username }})</td>    
                              @endif   
                              <td class="px-4 py-4">
                                <a href="{{ route('data.show', ['data' => $data->id]) }}"><i class="fas fa-eye text-blue-400"></i></a>
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

    <x-slot name="script">
      @if (session('success'))
          <script>
              document.addEventListener('DOMContentLoaded', function() { 
                  success("Input data pemol berhasil")
              }, true); 
          </script>
       @endif
  </x-slot>
</x-main-layout>

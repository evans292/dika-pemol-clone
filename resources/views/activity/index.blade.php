<x-main-layout>
    <x-slot name="title">
          Aktifitas Pemol
    </x-slot>
    <x-slot name="style">
        <style>
            /* The Modal (background) */
            .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
            }

            /* Modal Content (Image) */
            .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            }

            /* Add Animation - Zoom in the Modal */
            .modal-content, #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
            }

            @keyframes zoom {
            from {transform:scale(0)}
            to {transform:scale(1)}
            }

            /* The Close Button */
            .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            }

            .close:hover,
            .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
            }

            /* 100% Image Width on Smaller Screens */
            @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
            }
        </style>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('activity.create') }}" class="text-right inline-flex items-center px-4 py-2 bg-indigo-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"><i class="fas fa-plus mr-1"></i>Aktifitas Baru</a>
                    <div class="relative w-1/2 m-8">
                        <div class="border-r-2 border-blue-500 absolute h-full top-0" style="left: 15px"></div>
                        
                       
                        <ul class="list-none m-0 p-0">
                        @foreach ($activities as $data)
                        <li class="mb-2">
                            <div class="flex items-center mb-1">
                              <div class="bg-blue-500 rounded-full h-8 w-8"></div>
                              <div class="flex-1 ml-4 font-medium">{{ $data->tanggal->format('d F Y | ') }} {{ $data->created_at->format(' H:i:s') }} - <span class="text-xs text-gray-400">{{ $data->user->name }}</span></div>
                            </div>
                            <div class="ml-12">
                                <!-- Trigger the Modal -->
                                @foreach ($data->pics as $item)
                                <img id="myImg{{ $item->id }}" src="{{ asset('storage') . '/' . $item->pic }}" onclick="modal('myImg{{ $item->id }}')" alt="Activity" style="width:100%;max-width:300px" class="rounded-sm cursor-pointer transition-all hover:opacity-70 mb-5">
                                @endforeach
                            </div>
                          </li> 
                        @endforeach 
                        </ul>
                        
                      </div>

                      {{ $activities->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- The Close Button -->
        <span class="close" onclick="closeModal()">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="img01">
    </div>

    <x-slot name="script">
        @if (session('create'))
          <script>
              document.addEventListener('DOMContentLoaded', function() { 
                  success("Tambah aktifitas berhasil")
              }, true); 
          </script>
        @endif
        <script>

            let modal = function(imgId) {
                let modal = document.getElementById('myModal');
                let img = document.getElementById(imgId);
                let modalImg = document.getElementById('img01');

                modal.style.display = "block";
                modalImg.src = img.src;
                captionText.innerHTML = img.alt;
            }

           let closeModal = function() {
                let modal = document.getElementById('myModal');
                modal.style.display = "none";
            }
            
        </script>
    </x-slot>
</x-main-layout>

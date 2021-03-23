<x-main-layout>
    <x-slot name="title">
            Id Card - {{ Auth::user()->name }}
    </x-slot>
    <x-slot name="style">
          <!-- Slider -->
        <link rel="stylesheet" href="{{ asset('css/jquery.bbslider.css') }}">
        <style>
            .photo{
			/*width: 180px;
			height: 235px;*/
                margin-top:10px;
                width: 80%;
                height: 80%;
                box-shadow: none;
                /*background-color:#FFCC00;*/
                background: url({{ asset('img/bg-foto.png') }});
            }
            .blink {
            animation: blink-animation 1s steps(5, start) infinite;
            -webkit-animation: blink-animation 1s steps(5, start) infinite;
            color:blue;
            }
            @keyframes blink-animation {
            to {
                visibility: hidden;
            }
            }
            @-webkit-keyframes blink-animation {
            to {
                visibility: hidden;
            }
            }
        </style>
    </x-slot>
    <div class="py-6 overflow-auto h-full" id="box-id">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <img src="{{ asset('img/brand.png') }}" class="h-full w-full mx-auto" alt="" srcset="">
                    <marquee behavior="" direction="" class="text-lg">Pembukaan Rekening Online</marquee>

                    <div id="auto">
                        <div style="box-shadow: none;">
                            <a href="javascript:;" onClick="openFullscreen()">
                            <img src="{{ asset('img/devan.png') }}" class="h-3/4 w-3/4 mx-auto photo" alt="" srcset="">
                            </a>
                            <img src="{{ asset('img/stamp.png') }}" class="h-1/4 w-1/4 -mt-40" alt="" srcset="">
                        </div>
                        <div style="box-shadow: none;">
                            <a href="javascript:;" onClick="openFullscreen()">
                              <img src="{{ asset('img/qr.png') }}" class="w-full h-full">
                            </a>
                        </div>
                    </div>

                    <h3 class="uppercase font-bold text-xl text-center">{{ Auth::user()->name }}</h3>
                    <h4 class="uppercase font-bold text-lg text-center">{{ Auth::user()->username }}</h4>
                    <p class="font-bold text-blue-700 text-center blink">{{ date('d F Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <!-- jQuery 2.2.3 -->
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('js/jquery.bbslider.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#auto').bbslider({auto: true, timer: 10000, loop: true, pauseOnHit: false});
        });

        var elem = document.getElementById("box-id");
        function openFullscreen() {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) { /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { /* IE/Edge */
            elem.msRequestFullscreen();
        }
        }
    </script>
   </x-slot>
</x-main-layout>

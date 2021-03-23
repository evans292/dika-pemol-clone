<x-main-layout>
    <x-slot name="title">
            {{ __('Absensi') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- @if (date('H:i') !== '21:31')
                       kamu telat
                    @else
                        kamu masuk
                    @endif --}}
                    <img src="" alt="" id="pic" class="mb-10">

                    <video id="webcam" autoplay playsinline width="360" height="480"></video>
                    <canvas id="canvas" class="hidden"></canvas>
                    <audio id="snapSound" src="audio/snap.wav" preload = "auto"></audio>
                    <a href="#" onclick="start()">
                        start
                    </a>
                    <a href="#" onclick="capture()">
                        capture
                    </a>
                    <a href="#" onclick="stop()">
                        stop
                    </a>
                    <a href="#" onclick="save()">
                        save
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-main-layout>

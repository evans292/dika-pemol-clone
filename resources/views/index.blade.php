<x-main-layout>
    <x-slot name="title">
            {{ __('Dashboard') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <img src="{{ asset('img/logo-dika.png') }}" class="h-1/4 w-1/4 mx-auto" alt="" srcset="">
                    <p class="text-center mt-5 p-6 bg-gray-50 font-bold"><i class="fas fa-bell"></i> Selamat datang, <span class="uppercase">{{ Auth()->user()->name }}</span></p> 
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

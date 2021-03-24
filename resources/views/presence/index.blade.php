<x-main-layout>
    <x-slot name="title">
            {{ __('Absensi') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (date('H:i') !== '07:00')
                       kamu telat
                    @else
                        kamu masuk
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-main-layout>

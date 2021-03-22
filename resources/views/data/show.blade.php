<x-main-layout>
    <x-slot name="title">
            Detail - {{ $data->no_rek }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <i class="far fa-credit-card"></i> No. Rekening : {{ $data->no_rek }}
                    <br>
                    <br>
                    <i class="fas fa-calendar-alt mr-1"></i> Tanggal Input : {{ $data->tanggal }}
                    <br>
                    <br>
                    <i class="fas fa-user mr-1"></i> Nama Sales : {{ $data->user->name }}
                </div>
            </div>
        </div>
    </div>
</x-main-layout>

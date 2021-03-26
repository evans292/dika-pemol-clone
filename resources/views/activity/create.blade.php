<x-main-layout>
    <x-slot name="title">
            {{ __('Input Aktifitas Baru') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <form action="{{ route('activity.store') }}" method="post" novalidate enctype="multipart/form-data">
                            @csrf       
                            <div class="mb-4">
                                <x-label for="user_id" :value="__('Nama Sales')" />
                                <x-input id="user_id" class="block mt-1 w-full bg-gray-50" type="text" value="{{ Auth::user()->name }}" name="user_id"  readonly/>
                                <x-validation-message name="user_id"/>
                            </div>    
                            <div class="mb-4">
                                <x-label for="tanggal" :value="__('Tanggal')" />
                                <x-input id="tanggal" class="block mt-1 w-full" type="date" name="tanggal" />
                                <x-validation-message name="tanggal"/>
                            </div>                   
                            <div class="mb-4">
                                <x-label for="pics" :value="__('Foto Aktifitas (tekan ctrl saat input banyak foto)')" />
                                <input id="pics" class="block mt-1 w-full" type="file" name="pics[]" multiple accept="image/*"/>
                                <x-validation-message name="pics"/>
                            </div>

                            <div class="flex items-center justify-end mt-4">            
                                <x-button class="ml-3">
                                    {{ __('Simpan') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>

<x-main-layout>
    <x-slot name="title">
            {{ __('Input Data Pemol') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <form action="{{ route('data.store') }}" method="post" novalidate enctype="multipart/form-data">
                            @csrf                            
                            <div class="mb-4">
                                <x-label for="rekening" :value="__('Nomor Rekening')" />
                                <x-input id="rekening" class="block mt-1 w-full" type="number" name="rekening" required />
                                <x-validation-message name="rekening"/>
                            </div>
                            <div class="mb-4">
                                <x-label for="pics" :value="__('Foto Hasil (tekan ctrl saat input banyak foto)')" />
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

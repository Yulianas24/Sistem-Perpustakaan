<title>Tambah Member</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Kategori') }}
        </h2>
    </x-slot>

    <div class="grid gap-2 p-2">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="nama_kategori">{{ __('Nama Kategori') }}</x-input-label>
                        <x-text-input id="nama_kategori" class="mt-1 block w-full" type="text" name="nama"
                            value="{{ old('nama') }}" required />
                        @error('nama')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button class="bg-gray-600 hover:bg-gray-700 active:bg-gray-800">
                            {{ __('Simpan') }}
                        </x-primary-button>
                        <x-secondary-button href="{{ route('kategori.index') }}">
                            Kembali
                        </x-secondary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>

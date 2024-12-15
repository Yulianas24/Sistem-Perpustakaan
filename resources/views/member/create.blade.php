<title>Tambah Member</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Member') }}
        </h2>
    </x-slot>

    <div class="grid gap-2 p-2">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <form action="{{ route('member.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="nama_anggota">{{ __('Nama Anggota') }}</x-input-label>
                        <x-text-input id="nama_anggota" class="mt-1 block w-full" type="text" name="nama"
                            value="{{ old('nama') }}" required />
                        @error('nama')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-input-label for="nisn">{{ __('NISN') }}</x-input-label>
                        <x-text-input id="nisn" class="mt-1 block w-full" type="text" name="nisn"
                            value="{{ old('nama') }}" required />
                        @error('nama')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-input-label for="angkatan">{{ __('Angkatan') }}</x-input-label>
                        <x-text-input id="angkatan" class="mt-1 block w-full" type="text" name="angkatan"
                            value="{{ old('nama') }}" required />
                        @error('nama')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>
                    <div class="flex items-center gap-4">
                        <x-primary-button class="bg-gray-600 hover:bg-gray-700 active:bg-gray-800">
                            {{ __('Simpan') }}
                        </x-primary-button>

                        <x-secondary-button href="{{ route('member.index') }}">
                            Kembali
                        </x-secondary-button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
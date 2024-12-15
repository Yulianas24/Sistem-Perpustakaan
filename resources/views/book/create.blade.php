<title>Tambah  Buku</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah  Buku') }}
        </h2>
    </x-slot>

    <div class="grid gap-2 p-2">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="book_title">{{ __('Judul Buku') }}</x-input-label>
                        <x-text-input id="book_title" class="mt-1 block w-full" type="text" name="book_title"
                            value="{{ old('book_title') }}" required />
                        @error('book_title')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <x-input-label for="kategori_id">{{ __('Pilih Kategori') }}</x-input-label>
                        <select id="kategori_id" name="kategori_id" class="border px-3 py-2 mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <x-input-label for="author">{{ __('Nama Pengarang') }}</x-input-label>
                        <x-text-input id="author" class="mt-1 block w-full" type="text" name="author" value="{{ old('author') }}"
                            required />
                        @error('author')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <x-input-label for="release_year">{{ __('Tahun Rilis') }}</x-input-label>
                        <x-text-input id="release_year" class="mt-1 block w-full" type="number" name="release_year"
                            value="{{ old('release_year') }}" required />
                        @error('release_year')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <x-input-label for="photo">{{ __('Cover Buku') }}</x-input-label>
                        <input id="photo" class="mt-1 block w-full" type="file" name="photo"
                            accept="image/jpeg, image/png, image/gif">
                        @error('photo')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>
                    <div class="flex items-center gap-4">
                        <x-primary-button class="bg-gray-600 hover:bg-gray-700 active:bg-gray-800">
                            {{ __('Simpan') }}
                        </x-primary-button>

                        <x-secondary-button href="{{ route('buku.index') }}">
                            Kembali
                        </x-secondary-button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<title>Edit Buku</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Buku') }}
        </h2>
    </x-slot>

    <div class="grid gap-2 p-2">

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                {{-- <form action="{{ route('buku.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT') --}}
                <form method="POST" action="{{ route('buku.update', $book->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="mb-4">
                        <x-input-label for="book_title">{{ __('Judul Buku') }}</x-input-label>
                        <x-text-input id="book_title" class="mt-1 block w-full" type="text" name="book_title" value="{{ $book->nama_buku }}" required />
                        @error('book_title')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <x-input-label for="kategori_id">{{ __('Pilih Kategori') }}</x-input-label>
                        <select id="kategori_id" name="kategori_id" class="border px-3 py-2 mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" {{ $book->kategori_id == $item->id ? 'selected' : '' }} >{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <x-input-label for="author">{{ __('Nama Pengarang') }}</x-input-label>
                        <x-text-input id="author" class="mt-1 block w-full" type="text" name="author" value="{{ $book->penulis }}" required />
                        @error('author')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <x-input-label for="release_year">{{ __('Tahun Rilis') }}</x-input-label>
                        <x-text-input id="release_year" class="mt-1 block w-full" type="number" name="release_year"
                            value="{{ $book->tahun_rilis }}" required />
                        @error('release_year')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <x-input-label for="photo">{{ __('Cover Buku') }}</x-input-label>
                        <input id="photo" type="file" name="photo" class="mt-1 block w-full" accept="image/jpeg, image/png, image/gif">
                        <small class="text-gray-500">File yang diizinkan: JPEG, PNG, GIF</small>
                        @if ($book->photo)
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Cover saat ini:</p>
                                <img src="{{ asset('storage/' . $book->photo) }}" alt="Current Cover" class="mt-1 h-20">
                            </div>
                        @endif
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

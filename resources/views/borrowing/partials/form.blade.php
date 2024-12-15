<form action="{{ route('peminjaman-buku.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <x-input-label for="user_id">{{ __('Pilih Siswa') }}</x-input-label>
            <select id="user_id" name="user_id" class="border px-3 py-2 mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm" required>
                <option value="">Pilih Siswa</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nama }}</option>
                @endforeach
            </select>
            @error('user_id')
                <x-input-error-set :message="$message" class="mt-2" />
            @enderror
        </div>


        <div class="mb-4">
            <x-input-label for="book_id">{{ __('Pilih Buku') }}</x-input-label>
            <select id="book_id" name="book_id" class="border px-3 py-2 mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm" required>
                <option value="">Pilih Buku</option>
                @foreach ($buku as $book)
                    <option value="{{ $book->id }}">{{ $book->nama_buku }}</option>
                @endforeach
            </select>
            @error('book_id')
                <x-input-error-set :message="$message" class="mt-2" />
            @enderror
        </div>


        <div class="mb-4">
            <x-input-label for="borrow_date">{{ __('Tanggal Meminjam') }}</x-input-label>
            <x-text-input id="borrow_date" class="mt-1 block w-full" type="date" name="borrow_date"
                value="{{ old('borrow_date') }}" required />
            @error('borrow_date')
                <x-input-error-set :message="$message" class="mt-2" />
            @enderror
        </div>

        <div class="mb-4">
            <x-input-label for="return_date">{{ __('Tanggal Mengembalikan') }}</x-input-label>
            <x-text-input id="return_date" class="mt-1 block w-full" type="date" name="return_date"
                value="{{ old('return_date') }}" required />
            @error('return_date')
                <x-input-error-set :message="$message" class="mt-2" />
            @enderror
        </div>
        <br />

        <div class="flex items-center space-x-4">
            <x-primary-button class="bg-gray-600 hover:bg-gray-700 active:bg-gray-800">
                {{ __('Simpan') }}
            </x-primary-button>

            <x-secondary-button href="{{ route('peminjaman-buku.index') }}">
                Kembali
            </x-secondary-button>

        </div>

</form>

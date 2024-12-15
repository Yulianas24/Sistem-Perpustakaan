<form action="{{ route('pengembalian-buku.update', $pengembalian->id) }}" method="POST">
    @csrf
    @method('PUT')


    <div class="mb-4">
        <x-input-label for="status">{{ __('Status Keterlambatan') }}</x-input-label>
        <select id="status" name="status" class="border px-3 py-2 mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm" required>
            <option value="" selected disabled>Pilih Status</option>
            <option value="Terlambat">Terlambat</option>
            <option value="Tepat Waktu">Tepat Waktu</option>
        </select>

        @error('status')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="deskripsi">{{ __('Deskripsi') }}</x-input-label>
        <x-text-input id="deskripsi" class="mt-1 block w-full" type="text" name="deskripsi"
            value="{{ $pengembalian->deskripsi }}" required />
        @error('deskripsi')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="total_denda">{{ __('Total Denda (Masukan 0 jika tidak ada)') }}</x-input-label>
        <x-text-input id="total_denda" class="mt-1 block w-full" type="number" name="total_denda"
            value="{{ $pengembalian->total_denda }}" required />
        @error('total_denda')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="flex items-center space-x-4">
        <x-primary-button class="bg-gray-600 hover:bg-gray-700 active:bg-gray-800">
            {{ __('Simpan') }}
        </x-primary-button>

        <x-secondary-button href="{{ route('pengembalian-buku.index') }}">
            Kembali
        </x-secondary-button>
    </div>
</form>

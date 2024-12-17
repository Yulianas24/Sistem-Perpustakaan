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

                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="nama_user">{{ __('Nama') }}</x-input-label>
                        <x-text-input id="nama_user" class="mt-1 block w-full" type="text" name="nama" value="{{ old('nama') }}" required />
                        @error('nama')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-input-label for="email_user">{{ __('Email') }}</x-input-label>
                        <x-text-input id="email_user" class="mt-1 block w-full" type="text" name="email" value="{{ old('email') }}" required />
                        @error('email')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-input-label for="telepon_user">{{ __('Telepon') }}</x-input-label>
                        <x-text-input id="telepon_user" class="mt-1 block w-full" type="text" name="telepon" value="{{ old('telepon') }}" required />
                        @error('telepon')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-input-label for="role_user">{{ __('Role') }}</x-input-label>
                        <select id="role_user" name="role" class="border px-3 py-2 mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm" required>
                            <option value="" selected disabled>Pilih Status</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                        @error('role')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-input-label for="password_user">{{ __('Password') }}</x-input-label>
                        <x-text-input id="password_user" class="mt-1 block w-full" type="password" name="password" value="{{ old('password') }}" required />
                        @error('password')
                            <x-input-error-set :message="$message" class="mt-2" />
                        @enderror
                    </div>
                     <!-- Confirm Password -->
                    <div class="mb-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button class="bg-gray-600 hover:bg-gray-700 active:bg-gray-800">
                            {{ __('Simpan') }}
                        </x-primary-button>
                        <x-secondary-button href="{{ route('users.index') }}">
                            Kembali
                        </x-secondary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>

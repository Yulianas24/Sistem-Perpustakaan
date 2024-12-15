<title>Member</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Member') }}
        </h2>
    </x-slot>

    <div class="grid gap-2 p-2">
        <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
            @include('alert.alert-info')

            <div class="p-4 sm:p-6 dark:bg-gray-900 border-b border-gray-200">
                <div class="flex justify-between content-center items-center">
                    <x-secondary-button href="{{ route('member.create') }}">
                        Tambah
                    </x-secondary-button>
                    <form action="{{ route('member.index') }}" method="GET"
                        class="flex gap-2">
                        <input type="text" name="search" placeholder="Cari nama member..."
                            value="{{ request('search') }}"
                            class="border border-gray-300 focus:ring-gray-500 focus:border-gray-500 block rounded-md p-2 w-full sm:w-auto">

                        <button type="submit"
                            class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-gray-300">
                            Cari
                        </button>
                    </form>
                </div>

                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Nama
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    NISN
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Angkatan
                                </th>

                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($member as $item)
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                        {{ $item->nama }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                        {{ $item->nisn }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                        {{ $item->angkatan }}
                                    </td>

                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 flex space-x-2">
                                        @if(auth()->user()->role !== 'siswa')
                                        <a href="{{ route('member.edit', $item->id) }}"
                                            class="text-gray-600 hover:text-gray-900">Edit</a>

                                        <x-confirm-delete-modal>
                                            <x-slot name="trigger">
                                                <button @click="isOpen = true"
                                                    class="text-red-600 hover:text-red-900">Hapus</button>
                                            </x-slot>

                                            <x-slot name="title">
                                                Konfirmasi Hapus
                                            </x-slot>

                                            <x-slot name="content">
                                                Apakah Anda yakin ingin menghapus member ini?
                                            </x-slot>

                                            <x-slot name="footer">
                                                <form id="deleteForm-{{ $item->id }}"
                                                    action="{{ route('member.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-primary-button type="submit"
                                                        class="bg-red-600 hover:bg-red-700">
                                                        Hapus
                                                    </x-primary-button>
                                                    <x-secondary-button @click="isOpen = false">
                                                        Batal
                                                    </x-secondary-button>
                                                </form>

                                            </x-slot>
                                        </x-confirm-delete-modal>
                                        @endif

                                        {{-- <a href="{{ route('member.show', $item->id) }}"
                                            class="text-gray-600 hover:text-gray-900">Detail</a> --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-black" colspan="6">
                                        Tidak ada data yang ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $member->appends(request()->input())->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
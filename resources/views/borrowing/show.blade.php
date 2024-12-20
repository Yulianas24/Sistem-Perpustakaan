<title>Detail Peminjaman</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Pinjaman Buku') }}
        </h2>
    </x-slot>

    <div class="grid gap-2 p-2">
        <div class="p-4 bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <tbody class=" bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Nomor Peminjaman</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->no_peminjaman }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Peminjam</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->user->nama }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Judul Buku</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->buku->nama_buku }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Pengarang</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->buku->penulis }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Tahun Terbit</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->buku->tahun_rilis }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Tanggal Pinjam</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->tgl_peminjaman }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Tanggal Kembali</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->tgl_pengembalian }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Status</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->status }}</td>
                    </tr>

                </tbody>
            </table>
            <br/>
            <x-secondary-button href="{{ route('peminjaman-buku.index') }}">
                Kembali
            </x-secondary-button>
        </div>
    </div>
</x-app-layout>

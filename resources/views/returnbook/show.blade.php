<title>Detail Pengembalian</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Pengembalian Buku') }} - {{ $pengembalian->no_peminjaman }}
        </h2>
    </x-slot>

    <div class="grid gap-2 p-2">
        <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">

                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Nomor Peminjaman</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $pengembalian->no_peminjaman }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Peminjam</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $pengembalian->user->nama }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Judul Buku</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $pengembalian->buku->nama_buku }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Pengarang</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $pengembalian->buku->penulis }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Tahun Terbit</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $pengembalian->buku->tahun_rilis }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Tanggal Pinjam</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $pengembalian->tgl_peminjaman }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Rencana Tanggal Kembali</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $pengembalian->tgl_pengembalian }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Tanggal Input Kembali</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $pengembalian->created_at }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Status</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $pengembalian->status }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Keterangan</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $pengembalian->deskripsi }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-400 uppercase">Denda Keterlambatan</td>
                        <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $pengembalian->total_denda }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="px-6 py-4 ">
                <x-secondary-button href="{{ route('pengembalian-buku.index') }}">
                    Kembali
                </x-secondary-button>
            </div>
        </div>
    </div>
</x-app-layout>

<title>{{ config('app.titleDashboard', 'Laravel') }} - SDN 6 Pekanbaru</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid gap-2 p-2">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @include('alert.alert-info')
                <div class="grid gap-2 p-2">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            @include('alert.alert-info')
                           <div class="grid grid-cols-3 gap-5">
                            <div class="w-full h-fit p-5 rounded-lg bg-green-100">
                                <P class="text-green-500 font-semibold">JUMLAH MEMBER</P>
                                <p class="text-3xl text-green-500 font-bold">{{ $count['member'] }} Siswa</p>
                            </div>
                            <div class="w-full h-fit p-5 rounded-lg bg-blue-100">
                                <P class="text-blue-500 font-semibold">JUMLAH BUKU</P>
                                <p class="text-3xl text-blue-500 font-bold">{{ $count['book'] }} Buku</p>

                            </div>
                            <div class="w-full h-fit p-5 rounded-lg bg-yellow-100">
                                <P class="text-yellow-500 font-semibold">JUMLAH PEMINJAMAN</P>
                                <p class="text-3xl text-yellow-500 font-bold">{{ $count['peminjaman'] }} Kali</p>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-center pb-10">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">Perpustakaan Sekolah</div>
                        <p class="dark:text-gray-100 text-base">
                            Pinjam Buku Favorit Kamu yang ada di Perpustakaan SDN 6 Pekanbaru.
                        </p>
                    </div>
                    <div class="flex gap-3 justify-center">
                        <a class="block bg-blue-500 px-3 py-2 text-sm text-white rounded-lg" href="{{ route('peminjaman-buku.index') }}">Peminjaman Buku</a>
                        <a class="block bg-blue-500 px-3 py-2 text-sm text-white rounded-lg" href="{{ route('pengembalian-buku.index') }}">Pengembalian Buku</a>
                        <a class="block bg-blue-500 px-3 py-2 text-sm text-white rounded-lg" href="{{ route('member.index') }}">Data Member</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

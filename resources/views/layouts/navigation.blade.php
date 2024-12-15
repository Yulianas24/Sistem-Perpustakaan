<nav x-data="{ open: false }" class="w-1/5 flex-none border-r bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    @php
    $role = auth()->user()->role;
    @endphp
    <div class="grid">
        <!-- Logo -->
        <div class="px-5 h-[70px]  text-white dark:text-white-800 flex items-center">
            <a href="{{ route('dashboard') }}" class="flex items-center">
                <x-application-logo class="block h-9 w-9  fill-current text-gray-800 dark:text-gray-200" />
                <div class="ml-2">
                    <div class="font-bold text-sm text-black dark:text-gray-200">SDN 6 Pekanbaru</div>
                </div>
            </a>
        </div>
        <div class="grid gap-1 px-1 py-3">
            <!-- Navigation Links -->
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
            @if ($role === 'admin')
            <x-nav-link :href="route('member.index')" :active="request()->routeIs('member.index')">
                {{ __('Data Member') }}
            </x-nav-link>
            <x-nav-link :href="route('buku.index')" :active="request()->routeIs('buku.index')">
                {{ __('Data Buku') }}
            </x-nav-link>
            @endif
            <x-nav-link :href="route('peminjaman-buku.index')" :active="request()->routeIs('peminjaman-buku.index')">
                {{ __('Pinjam Buku') }}
            </x-nav-link>

            <x-nav-link :href="route('pengembalian-buku.index')" :active="request()->routeIs('pengembalian-buku.index')">
                {{ __('Pengembalian Buku') }}
            </x-nav-link>
            @if ($role === 'admin')
            <x-nav-link :href="route('laporan.index')" :active="request()->routeIs('laporan.index')">
                {{ __('Laporan') }}
            </x-nav-link>
            @endif
        </div>
    </div>

    <!-- Hamburger -->
    <div class="-me-2 flex items-center sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-black hover:text-black dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-black dark:focus:text-gray-400 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">({{ Auth::user()->identity }}) {{ Auth::user()->nama }} - {{ Auth::user()->kelas}}</div>
                <div class="font-medium text-sm text-black">{{ Auth::user()->email }}</div>
            </div>




            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('peminjaman-buku.index')">
                    {{ __('Pinjam Buku') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('pengembalian-buku.index')">
                    {{ __('Pengembalian Buku') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                @if ($role === 'admin')
                <x-responsive-nav-link :href="route('settings.index')">
                    {{ __('Settings') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('laporan.index')">
                    {{ __('Laporan') }}
                </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

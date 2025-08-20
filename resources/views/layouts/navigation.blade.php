<nav x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        
                        <span class="hidden md:block text-lg font-semibold text-white">
                          
                        </span>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    {{-- mengarah ke halaman Buat Laporan --}}
                    <x-nav-link :href="route('produksi.create')" :active="request()->routeIs('produksi.create')">
                        {{ __('Report') }}
                    </x-nav-link>
                     {{-- mengarah ke Dasbor Maintenance --}}
                    <x-nav-link :href="route('maintenance.dashboard')" :active="request()->routeIs('maintenance.dashboard')">
                        {{ __('Dashboard Maintenance') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-blue-200 hover:text-white hover:bg-blue-800 focus:outline-none focus:bg-blue-800 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('produksi.create')" :active="request()->routeIs('produksi.create')">
                {{ __('Report') }}
            </x-responsive-nav-link>
             <x-responsive-nav-link :href="route('maintenance.dashboard')" :active="request()->routeIs('maintenance.dashboard')">
                {{ __('Dashboard Maintenance') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
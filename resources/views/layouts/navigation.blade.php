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
                    <x-nav-link :href="route('produksi.create')" :active="request()->routeIs('produksi.create')">
                        {{ __('Report') }}
                    </x-nav-link>
                    <x-nav-link :href="route('maintenance.dashboard')" :active="request()->routeIs('maintenance.dashboard')">
                        {{ __('Dashboard Maintenance') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="flex items-center">
                <!-- Tombol Toggle Dark Mode -->
                <button @click="darkMode = (darkMode === 'dark' ? 'light' : 'dark')" 
                        class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2"
                        :class="darkMode === 'dark' ? 'bg-slate-600' : 'bg-slate-300'">
                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform duration-200 flex items-center justify-center"
                          :class="darkMode === 'dark' ? 'translate-x-6' : 'translate-x-1'">
                        <svg x-show="darkMode === 'light'" class="h-3 w-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
                        </svg>
                        <svg x-show="darkMode === 'dark'" class="h-3 w-3 text-slate-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                        </svg>
                    </span>
                </button>
                <!-- Tombol Menu Mobile -->
                <div class="-me-2 flex items-center sm:hidden ml-2">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-blue-200 hover:text-white hover:bg-blue-800 focus:outline-none focus:bg-blue-800 focus:text-white transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Navigasi Mobile -->
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
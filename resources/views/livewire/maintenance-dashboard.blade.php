<div wire:poll.15s>
    @section('title', 'Dashboard Maintenance')

    <div class="container mx-auto px-4 py-8">

        {{-- Tombol Download Laporan --}}
        <div class="mb-6 flex justify-end">
            <livewire:download-laporan-button />
        </div>

        {{-- 4 Card Status --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            {{-- Card Pending --}}
            <div class="bg-white dark:bg-slate-800 rounded-xl p-5 flex items-center shadow-lg shadow-amber-500/20 p-6 flex items-center transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 rounded-lg bg-amber-100 dark:bg-amber-900/50 flex-shrink-0 flex items-center justify-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500 dark:text-amber-400 animate-spin-slow" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-slate-700 dark:text-slate-200">Pending</h3>
                    <div class="flex items-baseline space-x-2">
                        <p class="text-3xl font-bold text-amber-500 dark:text-amber-400">{{ $pendingCount }}</p>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Laporan</p>
                    </div>
                </div>
            </div>

            {{-- Card Belum Selesai --}}
            <div class="bg-white dark:bg-slate-800 rounded-xl p-5 flex items-center shadow-lg shadow-red-500/20 p-6 flex items-center transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 rounded-lg bg-red-100 dark:bg-red-900/50 flex-shrink-0 flex items-center justify-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 dark:text-red-400 animate-edit-wiggle" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-slate-700 dark:text-slate-200">Belum Selesai</h3>
                    <div class="flex items-baseline space-x-2">
                        <p class="text-3xl font-bold text-red-500 dark:text-red-400">{{ $belumSelesaiCount }}</p>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Laporan</p>
                    </div>
                </div>
            </div>

            {{-- Card On Progress --}}
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg shadow-sky-500/20 p-6 flex items-center transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 rounded-lg bg-sky-100 dark:bg-sky-900/50 flex-shrink-0 flex items-center justify-center mr-4 relative">
                    <!-- Progress bar background -->
                    <div class="absolute inset-0 rounded-lg overflow-hidden">
                        <div class="h-full bg-sky-300/30 dark:bg-sky-600/30 animate-progress-fill origin-left"></div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-500 dark:text-sky-400 relative z-10 animate-gentle-float" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M15,2 C16.5976809,2 17.9036609,3.24891996 17.9949073,4.82372721 L18,5 L18,8 C18,8.26038605 17.8985463,8.50867108 17.7201762,8.69380235 L17.624695,8.78086881 L13.6,12 L17.624695,15.2191312 C17.8619103,15.4089034 18,15.6962163 18,16 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,16 C6,15.6962163 6.13808972,15.4089034 6.37530495,15.2191312 L10.399,12 L6.37530495,8.78086881 C6.17197761,8.61820694 6.04147718,8.3838825 6.00834087,8.12894825 L6,8 L6,5 C6,3.40231912 7.24891996,2.09633912 8.82372721,2.00509269 L9,2 L15,2 Z M12,13.281 L8,16.48 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 L15.1166211,19.9932723 C15.6139598,19.9355072 16,19.5128358 16,19 L16,16.481 L12,13.281 Z M15,4 L9,4 C8.48716416,4 8.06449284,4.38604019 8.00672773,4.88337887 L8,5 L8,6 L16,6 L16,5 C16,4.52661307 15.6710663,4.13005271 15.2292908,4.02641071 L15.1166211,4.00672773 L15,4 Z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-slate-700 dark:text-slate-200">On Progress</h3>
                    <p class="text-3xl font-bold text-sky-500 dark:text-sky-400">{{ $prosesCount }}</p>
                </div>
            </div>

            {{-- Card Selesai --}}
            <div class="bg-white dark:bg-slate-800 rounded-xl p-5 flex items-center shadow-lg shadow-emerald-500/20 p-6 flex items-center transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 rounded-lg bg-emerald-100 dark:bg-emerald-900/50 flex-shrink-0 flex items-center justify-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-500 dark:text-emerald-400 animate-check-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-slate-700 dark:text-slate-200">Selesai</h3>
                    <div class="flex items-baseline space-x-2">
                        <p class="text-3xl font-bold text-emerald-500 dark:text-emerald-400">{{ $selesaiCount }}</p>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Laporan</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabel Daftar Laporan --}}
        <div
            class="bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 overflow-hidden">

            <div class="p-5 flex flex-wrap gap-4 justify-between items-center">
                {{-- Bagian Kiri: Judul dan Refresh--}}
                <div class="flex items-center gap-2">
                    <h2 class="text-base font-semibold text-slate-900 dark:text-white">Daftar Laporan Masuk</h2>
                    <button onclick="location.reload()" type="button" title="Refresh Halaman"
                        class="p-2 text-slate-400 hover:text-blue-500 transition-colors duration-200 rounded-full hover:bg-slate-100 dark:hover:bg-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </button>
                </div>
                {{-- </button>
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button @click="open = !open" type="button" title="Filter status"
                        class="p-2 text-slate-400 hover:text-blue-500 transition-colors duration-200 rounded-full hover:bg-slate-100 dark:hover:bg-slate-700">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21 6H19M21 12H16M21 18H16M7 20V13.5612C7 13.3532 7 13.2492 6.97958 13.1497C6.96147 13.0615 6.93151 12.9761 6.89052 12.8958C6.84431 12.8054 6.77934 12.7242 6.64939 12.5617L3.35061 8.43826C3.22066 8.27583 3.15569 8.19461 3.10948 8.10417C3.06849 8.02393 3.03853 7.93852 3.02042 7.85026C3 7.75078 3 7.64677 3 7.43875V5.6C3 5.03995 3 4.75992 3.10899 4.54601C3.20487 4.35785 3.35785 4.20487 3.54601 4.10899C3.75992 4 4.03995 4 4.6 4H13.4C13.9601 4 14.2401 4 14.454 4.10899C14.6422 4.20487 14.7951 4.35785 14.891 4.54601C15 4.75992 15 5.03995 15 5.6V7.43875C15 7.64677 15 7.75078 14.9796 7.85026C14.9615 7.93852 14.9315 8.02393 14.8905 8.10417C14.8443 8.19461 14.7793 8.27583 14.6494 8.43826L11.3506 12.5617C11.2207 12.7242 11.1557 12.8054 11.1095 12.8958C11.0685 12.9761 11.0385 13.0615 11.0204 13.1497C11 13.2492 11 13.3532 11 13.5612V17L7 20Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div> --}}
                <div class="flex items-center space-x-2">

                    {{-- Dropdown Kategori --}}
                    <div class="relative inline-block text-left" x-data="{ open: false, selectedCategoryLabel: 'All Categories' }">
                        <button @click="open = !open" type="button" class="inline-flex justify-center w-full rounded-md border border-slate-300 dark:border-slate-600 shadow-sm px-4 py-2 bg-white dark:bg-slate-900/50 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-100 focus:ring-blue-500">
                            <span x-text="selectedCategoryLabel"></span>
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-slate-800 ring-1 ring-black ring-opacity-5 z-20" style="display: none;">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700" role="menuitem" wire:click.prevent="resetAllFilters" @click="selectedCategoryLabel = 'All Categories'; $dispatch('reset-availability'); open = false">All Categories</a>
                                <a href="#" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700" role="menuitem" wire:click.prevent="$set('filterCategory', 'plant')" @click="selectedCategoryLabel = 'Plant'; open = false">Plant</a>
                                <a href="#" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700" role="menuitem" wire:click.prevent="$set('filterCategory', 'status')" @click="selectedCategoryLabel = 'Status'; open = false">Status</a>
                                <a href="#" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700" role="menuitem" wire:click.prevent="$set('filterCategory', 'keterangan')" @click="selectedCategoryLabel = 'Keterangan'; open = false">Keterangan</a>
                            </div>
                        </div>
                    </div>

                    {{-- Dropdown Opsi --}}
                    <div class="relative inline-block text-left" x-data="{ open: false, selectedAvailabilityLabel: 'All Availability' }" @reset-availability.window="selectedAvailabilityLabel = 'All Availability'">
                        <button @click="open = !open" type="button" class="inline-flex justify-center w-full rounded-md border border-slate-300 dark:border-slate-600 shadow-sm px-4 py-2 bg-white dark:bg-slate-900/50 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-100 focus:ring-blue-500">
                            <span x-text="selectedAvailabilityLabel"></span>
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-slate-800 ring-1 ring-black ring-opacity-5 z-20" style="display: none;">
                            <div class="py-1 max-h-60 overflow-y-auto">
                                <a href="#" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700" role="menuitem" wire:click.prevent="filterReports($wire.filterCategory, '')" @click="selectedAvailabilityLabel = 'All Availability'; open = false">All Availability</a>
                                <template x-if="$wire.filterCategory === 'plant'">
                                    <div>
                                        @foreach(config('datamesin.plants') as $plant)
                                        <a href="#" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700" role="menuitem" wire:click.prevent="filterReports('plant', '{{ $plant }}')" @click="selectedAvailabilityLabel = '{{ $plant }}'; open = false">{{ $plant }}</a>
                                        @endforeach
                                    </div>
                                </template>
                                <template x-if="$wire.filterCategory === 'status'">
                                    <div>
                                        @foreach(['Pending', 'On Progress', 'Belum Selesai', 'Selesai'] as $status)
                                        <a href="#" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700" role="menuitem" wire:click.prevent="filterReports('status', '{{ $status }}')" @click="selectedAvailabilityLabel = '{{ $status }}'; open = false">{{ $status }}</a>
                                        @endforeach
                                    </div>
                                </template>
                                <template x-if="$wire.filterCategory === 'keterangan'">
                                    <div>
                                        @foreach(['Mekanik', 'Elektrik', 'Utility', 'Calibraty'] as $keterangan)
                                        <a href="#" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700" role="menuitem" wire:click.prevent="filterReports('keterangan', '{{ $keterangan }}')" @click="selectedAvailabilityLabel = '{{ $keterangan }}'; open = false">{{ $keterangan }}</a>
                                        @endforeach
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    {{-- Search Input --}}
                    <div class="relative">
                        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari laporan..."
                            class="w-full sm:w-64 rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm pl-9">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-4 w-4 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
            <div class="overflow-x-auto max-h-[28rem] overflow-y-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-slate-50 dark:bg-slate-800 sticky top-0 z-10">
                        <tr class="text-left">
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300 cursor-pointer hover:bg-slate-100 dark:hover:bg-slate-700" wire:click="sortBy('tanggal_lapor')">
                                <div class="flex items-center gap-2">
                                    <span>Tanggal & Pelapor</span>
                                    <svg class="h-4 w-4 @if($sortField !== 'tanggal_lapor') text-slate-400 @endif @if($sortDirection === 'desc' && $sortField === 'tanggal_lapor') transform rotate-180 @endif transition-transform" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 5H3L3 16H5L5 5L8 5V4L4 0L0 4V5Z" fill="currentColor" />
                                        <path d="M16 6H10V8H16V6Z" fill="currentColor" />
                                        <path d="M10 10H14V12H10V10Z" fill="currentColor" />
                                        <path d="M12 14H10V16H12V14Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </th>
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300">Uraian Perbaikan</th>
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300">Keterangan</th>
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300 text-center">Status</th>
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                        @forelse ($semuaLaporan as $laporan)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                            <td class="px-5 py-4 whitespace-nowrap">
                                <p class="font-semibold text-slate-900 dark:text-white">{{ $laporan->nama_pelapor }}</p>
                                <p class="text-slate-500 dark:text-slate-400">
                                    {{ \Carbon\Carbon::parse($laporan->tanggal_lapor)->format('d M Y') }} -
                                    {{ \Carbon\Carbon::parse($laporan->jam_lapor)->format('H:i') }}
                                </p>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <p class="font-semibold text-slate-900 dark:text-white">{{ $laporan->nama_mesin }}</p>
                                <p class="text-slate-500 dark:text-slate-400">Plant {{ $laporan->plant }}</p>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-slate-500 dark:text-slate-400">
                                {{ optional($laporan->maintenance)->jenis_perbaikan ?? 'Belum Ditentukan' }}
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-slate-500 dark:text-slate-400">
                                {{ $laporan->keterangan }}
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-center">
                                @php $status = optional($laporan->maintenance)->status ?? 'Pending'; @endphp

                                @if($status == 'Pending')
                                <span
                                    class="inline-flex items-center justify-center rounded-full bg-amber-100 px-2.5 py-0.5 text-amber-700 dark:bg-amber-900/50 dark:text-amber-400">
                                    <p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p>
                                </span>

                                @elseif($status == 'On Progress')
                                <span class="inline-flex items-center justify-center rounded-full bg-sky-100 px-2.5 py-0.5 text-sky-700 dark:bg-sky-900/50 dark:text-sky-400">
                                    <p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p>
                                </span>

                                @elseif($status == 'Dalam Proses' || $status == 'Belum Selesai')
                                <span
                                    class="inline-flex items-center justify-center rounded-full bg-red-100 px-2.5 py-0.5 text-red-700 dark:bg-red-900/50 dark:text-red-400">
                                    <p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p>
                                </span>

                                @elseif($status == 'Selesai')
                                <span
                                    class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-400">
                                    <p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p>
                                </span>

                                @else
                                <span
                                    class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-400">
                                    <p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p>
                                </span>
                                @endif
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-center space-x-2">
                                <button wire:click="$dispatch('open-view-modal', { produksiId: {{ $laporan->id }} })"
                                    type="button"
                                    class="font-medium text-slate-600 hover:text-blue-600 dark:text-slate-400 dark:hover:text-blue-500">View</button>
                                <button wire:click="$dispatch('open-update-modal', { produksiId: {{ $laporan->id }} })"
                                    type="button"
                                    class="font-medium text-slate-600 hover:text-blue-600 dark:text-slate-400 dark:hover:text-blue-500">Update</button>
                            </td>
                        </tr>
                        @empty
                        <tr class="dark:bg-slate-800">
                            <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                                @if(!empty($search))
                                Laporan dengan kata kunci "{{ $search }}" tidak ditemukan.
                                @else
                                Belum ada laporan yang masuk.
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- Tautan Paginasi --}}
            <div class="p-5 border-t border-slate-200 dark:border-slate-700">
                {{ $semuaLaporan->links() }}
            </div>
            @script
            <script>
                $wire.on('scroll-to-table', () => {
                    const tableElement = document.getElementById('riwayat-tabel');
                    if (tableElement) {
                        tableElement.scrollIntoView({
                            behavior: 'auto',
                            block: 'start'
                        });
                    }
                });

                // window.onload = function() {
                //     let isLoggedIn = false;

                //     while (!isLoggedIn) {
                //         const username = prompt("Masukkan username:");
                //         const password = prompt("Masukkan password:");

                //         if (username === "maintenance" && password === "welcome123") {
                //             alert("Login berhasil! Selamat datang, Admin.");
                //             isLoggedIn = true;
                //         } else {
                //             alert("Login gagal. Silakan coba lagi.");
                //         }
                //     }
                // };
            </script>

            @endscript

            {{-- Memanggil komponen modal Livewire --}}
            <livewire:maintenance.view-laporan />
            <livewire:maintenance.update-laporan />
        </div>
    </div>
</div>
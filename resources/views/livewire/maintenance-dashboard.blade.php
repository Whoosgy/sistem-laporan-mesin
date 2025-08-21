{{-- File: resources/views/livewire/maintenance-dashboard.blade.php --}}
{{-- DITAMBAHKAN: wire:poll untuk refresh otomatis setiap 15 detik --}}
<div wire:poll.15s>

    @section('title', 'Dasbor Maintenance')

    <div class="container mx-auto px-4 py-8">

        <header class="mb-8">
            <div>
                <h1 class="text-3xl font-bold text-slate-800 dark:text-white">Dasboard Maintenance</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-1">Ringkasan laporan kerusakan mesin secara real-time.</p>
            </div>
        </header>

        {{-- 3 Card Status --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            {{-- Card Pending --}}
            <div class="p-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg">
                <div class="flex justify-between items-start">
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Pending</p>
                    <span class="rounded-full bg-amber-100 dark:bg-amber-900/50 px-2.5 py-0.5 text-xs font-semibold text-amber-600 dark:text-amber-400">BARU</span>
                </div>
                <p class="mt-2 text-3xl font-bold text-slate-900 dark:text-white">{{ $pendingCount }}</p>
            </div>
            {{-- Card Belum Selesai --}}
            <div class="p-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg">
                <div class="flex justify-between items-start">
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Belum Selesai</p>
                    <span class="rounded-full bg-sky-100 dark:bg-sky-900/50 px-2.5 py-0.5 text-xs font-semibold text-sky-600 dark:text-sky-400">AKTIF</span>
                </div>
                <p class="mt-2 text-3xl font-bold text-slate-900 dark:text-white">{{ $prosesCount }}</p>
            </div>
            {{-- Card Selesai --}}
            <div class="p-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg">
                <div class="flex justify-between items-start">
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Selesai</p>
                    <span class="rounded-full bg-emerald-100 dark:bg-emerald-900/50 px-2.5 py-0.5 text-xs font-semibold text-emerald-600 dark:text-emerald-400">SELESAI</span>
                </div>
                <p class="mt-2 text-3xl font-bold text-slate-900 dark:text-white">{{ $selesaiCount }}</p>
            </div>
        </div>


        {{-- Tabel Daftar Laporan --}}
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="p-5 flex flex-wrap gap-4 justify-between items-center">
            <div class="flex items-center gap-2">
                <h2 class="text-base font-semibold text-slate-900 dark:text-white">Daftar Laporan Masuk</h2>
                <button wire:click="$refresh" type="button" title="Refresh data" class="p-2 text-slate-400 hover:text-blue-500 transition-colors duration-200 rounded-full hover:bg-slate-100 dark:hover:bg-slate-700">
                    <svg wire:loading.class="animate-spin" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001a7.5 7.5 0 0 1-1.08 11.051l-1.08-1.081a6 6 0 0 0 .864-8.871l-1.081-1.081H16.023Zm-4.992 0v4.992m0 0l1.08-1.081a6 6 0 0 0-8.871-.864l1.081 1.081V9.348m0 0h-4.992l1.08 1.081a6 6 0 0 0 8.871.864l-1.081-1.081V9.348Z" />
                    </svg>
                </button>
            </div>
                    <div class="relative">
                        <input 
                            wire:model.live.debounce.300ms="search"
                            type="text" 
                            placeholder="Cari laporan..." 
                            class="w-full sm:w-64 rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm pl-9">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-4 w-4 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto max-h-[28rem] overflow-y-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-slate-50 dark:bg-slate-800/50 sticky top-0">
                        <tr class="text-left">
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300 cursor-pointer hover:bg-slate-100 dark:hover:bg-slate-700" wire:click="sortBy('tanggal_lapor')">
                                <div class="flex items-center">
                                    <span>Tanggal & Pelapor</span>
                                    @if($sortField == 'tanggal_lapor')
                                        <span class="ml-2">@if($sortDirection == 'asc') &uarr; @else &darr; @endif</span>
                                    @endif
                                </div>
                            </th>
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300 cursor-pointer hover:bg-slate-100 dark:hover:bg-slate-700" wire:click="sortBy('nama_mesin')">
                                <div class="flex items-center">
                                    <span>Mesin & Plant</span>
                                    @if($sortField == 'nama_mesin')
                                        <span class="ml-2">@if($sortDirection == 'asc') &uarr; @else &darr; @endif</span>
                                    @endif
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
                                <p class="text-slate-500 dark:text-slate-400">{{ \Carbon\Carbon::parse($laporan->tanggal_lapor)->format('d M Y') }} - {{ \Carbon\Carbon::parse($laporan->jam_lapor)->format('H:i') }}</p>
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
                                    <span class="inline-flex items-center justify-center rounded-full bg-amber-100 px-2.5 py-0.5 text-amber-700 dark:bg-amber-900/50 dark:text-amber-400"><p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p></span>
                                @elseif($status == 'Dalam Proses')
                                    <span class="inline-flex items-center justify-center rounded-full bg-sky-100 px-2.5 py-0.5 text-sky-700 dark:bg-sky-900/50 dark:text-sky-400"><p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p></span>
                                @else
                                    <span class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-400"><p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p></span>
                                @endif
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-center space-x-2">
                                <button wire:click="$dispatch('open-view-modal', { produksiId: {{ $laporan->id }} })" type="button" class="font-medium text-slate-600 hover:text-blue-600 dark:text-slate-400 dark:hover:text-blue-500">View</button>
                                <button wire:click="$dispatch('open-update-modal', { produksiId: {{ $laporan->id }} })" type="button" class="font-medium text-slate-600 hover:text-blue-600 dark:text-slate-400 dark:hover:text-blue-500">Update</button>
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
        </div>
    </div>
            </div>
        </div>
    </div>

    {{-- Memanggil komponen modal Livewire --}}
    <livewire:maintenance.view-laporan />
    <livewire:maintenance.update-laporan />
</div>

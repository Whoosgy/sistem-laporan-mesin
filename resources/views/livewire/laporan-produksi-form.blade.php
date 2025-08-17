<div>
    {{-- Tombol Kembali di Pojok Kanan Atas --}}
    <div class="flex justify-end mb-4">
        <a href="{{ route('home') }}"
           class="inline-flex items-center justify-center px-4 py-2 border border-slate-300 dark:border-slate-700 text-sm font-medium rounded-md shadow-sm text-slate-700 dark:text-slate-200 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-100 dark:focus:ring-offset-slate-900 focus:ring-indigo-500 transition-colors duration-200">
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z" clip-rule="evenodd" />
            </svg>
            Kembali ke Beranda
        </a>
    </div>

    <div class="space-y-8">
        {{-- Card 1: Form Input --}}
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700">
            <div class="p-5 border-b border-slate-200 dark:border-slate-700">
                <h2 class="text-base font-semibold text-slate-900 dark:text-white">
                    Detail Laporan Kerusakan
                </h2>
            </div>
            <div class="p-5 space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="tanggal_lapor" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Tanggal Lapor</label>
                        <input wire:model.blur="tanggal_lapor" type="date" id="tanggal_lapor" required class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                    </div>
                    <div>
                        <label for="jam_lapor" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Jam Lapor</label>
                        <input wire:model.blur="jam_lapor" type="time" id="jam_lapor" required class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                    </div>
                    <div x-data="{ open: false, search: @entangle('shift').live }" @click.away="open = false">
                        <label for="shift" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Shift</label>
                        <div class="relative mt-1">
                            <input x-model="search" @click="open = true" readonly id="shift" required placeholder="Pilih Shift" class="w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm cursor-pointer pl-3 pr-10 py-2">
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a.75.75 0 01.53.22l3.5 3.5a.75.75 0 01-1.06 1.06L10 4.81 7.03 7.78a.75.75 0 01-1.06-1.06l3.5-3.5A.75.75 0 0110 3zm-3.72 9.53a.75.75 0 011.06 0L10 15.19l2.97-2.97a.75.75 0 111.06 1.06l-3.5 3.5a.75.75 0 01-1.06 0l-3.5-3.5a.75.75 0 010-1.06z" clip-rule="evenodd" /></svg>
                            </div>
                            <div x-show="open" style="display: none;" class="absolute z-10 w-full mt-1 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-600 rounded-md shadow-lg max-h-60 overflow-auto">
                                <div @click="search = '1'; open = false" class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700">1</div>
                                <div @click="search = '2'; open = false" class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700">2</div>
                                <div @click="search = '3'; open = false" class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700">3</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="nama_pelapor" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Nama Pelapor</label>
                        <input wire:model.blur="nama_pelapor" type="text" id="nama_pelapor" required placeholder="Nama lengkap" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                    </div>
                    <div x-data="{ open: false, search: @entangle('plant').live }" @click.away="open = false">
                        <label for="plant" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Plant</label>
                        <div class="relative mt-1">
                            <input x-model="search" @click="open = true" type="text" id="plant" placeholder="Pilih atau ketik Plant" class="w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm pl-3 pr-10 py-2">
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a.75.75 0 01.53.22l3.5 3.5a.75.75 0 01-1.06 1.06L10 4.81 7.03 7.78a.75.75 0 01-1.06-1.06l3.5-3.5A.75.75 0 0110 3zm-3.72 9.53a.75.75 0 011.06 0L10 15.19l2.97-2.97a.75.75 0 111.06 1.06l-3.5 3.5a.75.75 0 01-1.06 0l-3.5-3.5a.75.75 0 010-1.06z" clip-rule="evenodd" /></svg>
                            </div>
                            <div x-show="open" style="display: none;" class="absolute z-10 w-full mt-1 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-600 rounded-md shadow-lg max-h-60 overflow-auto">
                                @foreach($listPlant as $p)
                                    <div @click="search = '{{ addslashes($p) }}'; open = false" class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700">{{ $p }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="nama_mesin" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Nama Mesin</label>
                        @if ($isPlantManual)
                            <input wire:model="nama_mesin" type="text" id="nama_mesin" required placeholder="{{ $namaMesinPlaceholder }}" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        @else
                            <div x-data="{ open: false, search: @entangle('nama_mesin').live }" @click.away="open = false">
                                <div class="relative mt-1">
                                    <input x-model="search" @click="open = true" type="text" id="nama_mesin" required placeholder="{{ $namaMesinPlaceholder }}" class="w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm pl-3 pr-10 py-2">
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a.75.75 0 01.53.22l3.5 3.5a.75.75 0 01-1.06 1.06L10 4.81 7.03 7.78a.75.75 0 01-1.06-1.06l3.5-3.5A.75.75 0 0110 3zm-3.72 9.53a.75.75 0 011.06 0L10 15.19l2.97-2.97a.75.75 0 111.06 1.06l-3.5 3.5a.75.75 0 01-1.06 0l-3.5-3.5a.75.75 0 010-1.06z" clip-rule="evenodd" /></svg>
                                    </div>
                                    <div x-show="open" style="display: none;" class="absolute z-10 w-full mt-1 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-600 rounded-md shadow-lg max-h-60 overflow-auto">
                                        @forelse($listMesin as $mesin)
                                            <div @click="search = '{{ addslashes($mesin) }}'; open = false" class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700">{{ $mesin }}</div>
                                        @empty
                                            <div class="px-4 py-2 text-sm text-slate-500">{{ $emptyMessage }}</div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="bagian_rusak" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Bagian / Sparepart Rusak</label>
                        <input wire:model.blur="bagian_rusak" type="text" id="bagian_rusak" placeholder="Contoh: Bearing" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                    </div>
                    <div x-data="{ open: false, search: @entangle('keterangan').live}" @click.away="open = false">
                        <label for="keterangan" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Keterangan</label>
                        <div class="relative mt-1">
                            <input x-model="search" @click="open = true" readonly id="keterangan" required placeholder="Pilih Keterangan..." class="w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm cursor-pointer pl-3 pr-10 py-2">
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a.75.75 0 01.53.22l3.5 3.5a.75.75 0 01-1.06 1.06L10 4.81 7.03 7.78a.75.75 0 01-1.06-1.06l3.5-3.5A.75.75 0 0110 3zm-3.72 9.53a.75.75 0 011.06 0L10 15.19l2.97-2.97a.75.75 0 111.06 1.06l-3.5 3.5a.75.75 0 01-1.06 0l-3.5-3.5a.75.75 0 010-1.06z" clip-rule="evenodd" /></svg>
                            </div>
                            <div x-show="open" style="display: none;" class="absolute z-10 w-full mt-1 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-600 rounded-md shadow-lg max-h-60 overflow-auto">
                                <div @click="search = 'ME'; open = false" class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700">ME (Mekanik)</div>
                                <div @click="search = 'E'; open = false" class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700">E (Elektrik)</div>
                                <div @click="search = 'U'; open = false" class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700">U (Utility)</div>
                                <div @click="search = 'C'; open = false" class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700">C (Calibraty)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="uraian_kerusakan" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Uraian Kerusakan</label>
                    <textarea wire:model.blur="uraian_kerusakan" id="uraian_kerusakan" rows="4" required placeholder="Jelaskan detail kerusakan..." class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"></textarea>
                </div>
            </div>
            <div class="bg-slate-50 dark:bg-slate-800/50 px-5 py-3 flex justify-end items-center space-x-2 rounded-b-lg">
                <button type="button" wire:click="resetForm" class="px-3 py-2 text-xs font-medium text-slate-600 bg-white border border-slate-300 rounded-md shadow-sm hover:bg-slate-50">
                    Reset
                </button>
                <button type="button" wire:click="openConfirmationModal" class="px-3 py-2 text-xs font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700">
                    Lihat & Kirim
                </button>
            </div>
        </div>

        {{-- Card 2: Tabel Riwayat Laporan --}}
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden">
            <div class="p-5 flex flex-wrap gap-4 justify-between items-center">
                <div>
                    <h2 class="text-base font-semibold text-slate-900 dark:text-white">Riwayat Laporan Terakhir</h2>
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
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-slate-50 dark:bg-slate-800/50">
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
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300">Uraian Singkat</th>
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300">Keterangan</th>
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300 text-center">Status</th>
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
                            <td class="px-5 py-4 max-w-sm truncate text-slate-500 dark:text-slate-400">
                                {{ $laporan->uraian_kerusakan }}
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-slate-500 dark:text-slate-400">
                                {{ $laporan->keterangan }}
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-center">
                                @php
                                    $status = optional($laporan->maintenance)->status ?? 'Pending';
                                @endphp

                                @if($status == 'Pending')
                                    <span class="inline-flex items-center justify-center rounded-full bg-amber-100 px-2.5 py-0.5 text-amber-700 dark:bg-amber-900/50 dark:text-amber-400">
                                        <p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p>
                                    </span>
                                @else
                                    <span class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-400">
                                        <p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p>
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr class="dark:bg-slate-800">
                            <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                                Belum ada laporan yang masuk.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Pop-up (Modal) untuk Konfirmasi --}}
    @if($isModalOpen)
    <div 
        x-data="{ show: @entangle('isModalOpen') }"
        x-show="show"
        x-on:keydown.escape.window="show = false"
        class="fixed inset-0 z-50 flex items-center justify-center"
        style="display: none;"
    >
        <div x-show="show" x-transition.opacity class="fixed inset-0 bg-black/50 backdrop-blur-sm" wire:click="closeModal"></div>

        <div x-show="show" x-transition class="relative w-full max-w-lg m-8 bg-white dark:bg-slate-800 rounded-lg shadow-xl border border-slate-200 dark:border-slate-700">
            <form wire:submit.prevent="save">
                <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                        Konfirmasi Data Laporan
                    </h3>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Pastikan semua data sudah benar sebelum dikirim.</p>
                </div>

                <div class="p-6 space-y-2 text-sm max-h-96 overflow-y-auto">
                    {{-- PERBAIKAN: Semua baris crosscheck diisi dengan benar --}}
                    <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                        <span class="font-medium text-slate-500 dark:text-slate-400">Tanggal & Jam</span>
                        <span class="font-semibold text-slate-700 dark:text-slate-200 text-right">{{ $tanggal_lapor ?? '___' }} & {{ $jam_lapor ?? '___' }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                        <span class="font-medium text-slate-500 dark:text-slate-400">Shift</span>
                        <span class="font-semibold text-slate-700 dark:text-slate-200">{{ $shift ?? '___' }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                        <span class="font-medium text-slate-500 dark:text-slate-400">Pelapor</span>
                        <span class="font-semibold text-slate-700 dark:text-slate-200">{{ $nama_pelapor ?? '___' }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                        <span class="font-medium text-slate-500 dark:text-slate-400">Plant</span>
                        <span class="font-semibold text-slate-700 dark:text-slate-200">{{ $plant ?? '___' }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                        <span class="font-medium text-slate-500 dark:text-slate-400">Nama Mesin</span>
                        <span class="font-semibold text-slate-700 dark:text-slate-200">{{ $nama_mesin ?? '___' }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                        <span class="font-medium text-slate-500 dark:text-slate-400">Bagian Rusak</span>
                        <span class="font-semibold text-slate-700 dark:text-slate-200">{{ $bagian_rusak ?? '___' }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                        <span class="font-medium text-slate-500 dark:text-slate-400">Keterangan</span>
                        <span class="font-semibold text-slate-700 dark:text-slate-200">{{ $keterangan ?? '___' }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-slate-500 dark:text-slate-400">Uraian Kerusakan</span>
                        <p class="mt-1 font-semibold text-slate-700 dark:text-slate-200">{{ $uraian_kerusakan ?? '___' }}</p>
                    </div>
                </div>

                <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 flex justify-end items-center space-x-3">
                    <button type="button" wire:click="closeModal" class="px-4 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-300 rounded-md shadow-sm hover:bg-slate-50">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700">
                        <span wire:loading.remove wire:target="save">Ya, Kirim Laporan</span>
                        <span wire:loading wire:target="save">Mengirim...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
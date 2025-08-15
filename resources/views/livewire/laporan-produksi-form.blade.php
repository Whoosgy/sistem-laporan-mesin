{{-- File: resources/views/livewire/laporan-produksi-form.blade.php --}}
<div>
    <form wire:submit.prevent="save">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Card Kiri (Form Input) --}}
            <div class="lg:col-span-2 bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700">
                <div class="p-5 border-b border-slate-200 dark:border-slate-700">
                    <h2 class="text-base font-semibold text-slate-900 dark:text-white">
                        1. Detail Laporan Kerusakan
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
                        <div>
                            <label for="shift" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Shift</label>
                            <select wire:model.blur="shift" id="shift" required class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div>
                            <label for="nama_pelapor" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Nama Pelapor</label>
                            <input wire:model.blur="nama_pelapor" type="text" id="nama_pelapor" required placeholder="Nama lengkap" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                        <div>
                            <label for="plant" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Plant</label>
                            <input wire:model.live="plant" list="plant-list" type="text" id="plant" placeholder="Pilih atau ketik" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                            <datalist id="plant-list">
                                @foreach($listPlant as $p)
                                    <option value="{{ $p }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div>
                            <label for="nama_mesin" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Nama Mesin</label>
                            <input wire:model.blur="nama_mesin" list="mesin-list" type="text" id="nama_mesin" required placeholder="Pilih atau cari" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                            <datalist id="mesin-list">
                                 @foreach($listMesin as $mesin)
                                    <option value="{{ $mesin }}">
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                    <div>
                        <label for="bagian_rusak" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Bagian / Sparepart Rusak</label>
                        <input wire:model.blur="bagian_rusak" type="text" id="bagian_rusak" placeholder="Contoh: Bearing" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                    </div>
                    <div>
                        <label for="uraian_kerusakan" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Uraian Kerusakan</label>
                        <textarea wire:model.blur="uraian_kerusakan" id="uraian_kerusakan" rows="4" required placeholder="Jelaskan detail kerusakan..." class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"></textarea>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan (Crosscheck & Aksi) --}}
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700 sticky top-24">
                    <div class="p-5 border-b border-slate-200 dark:border-slate-700">
                        <h2 class="text-base font-semibold text-slate-900 dark:text-white">
                            2. Crosscheck & Kirim
                        </h2>
                    </div>
                    <div class="p-5 space-y-2 text-xs">
                       <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                            <span class="font-medium text-slate-400">Tanggal & Jam</span>
                            <span class="font-semibold text-slate-600 dark:text-slate-200 text-right">{{ $tanggal_lapor ?? '___' }} & {{ $jam_lapor ?? '___' }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                            <span class="font-medium text-slate-400">Shift</span>
                            <span class="font-semibold text-slate-600 dark:text-slate-200">{{ $shift ?? '___' }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                            <span class="font-medium text-slate-400">Pelapor</span>
                            <span class="font-semibold text-slate-600 dark:text-slate-200">{{ $nama_pelapor ?? '___' }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                            <span class="font-medium text-slate-400">Plant</span>
                            <span class="font-semibold text-slate-600 dark:text-slate-200">{{ $plant ?? '___' }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                            <span class="font-medium text-slate-400">Nama Mesin</span>
                            <span class="font-semibold text-slate-600 dark:text-slate-200">{{ $nama_mesin ?? '___' }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                            <span class="font-medium text-slate-400">Bagian Rusak</span>
                            <span class="font-semibold text-slate-600 dark:text-slate-200">{{ $bagian_rusak ?? '___' }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-slate-400">Uraian Kerusakan</span>
                            <p class="mt-1 font-semibold text-slate-600 dark:text-slate-200">{{ $uraian_kerusakan ?? '___' }}</p>
                        </div>
                    </div>
                    <div class="bg-slate-50 dark:bg-slate-800/50 px-5 py-3 flex justify-end items-center space-x-2">
                        <button type="button" wire:click="resetForm" class="px-3 py-2 text-xs font-medium text-slate-600 bg-white border border-slate-300 rounded-md shadow-sm hover:bg-slate-50">Reset</button>
                        <button type="submit" class="px-3 py-2 text-xs font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Tabel Riwayat --}}
    <div class="mt-8 bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="p-5">
            <h2 class="text-base font-semibold text-slate-900 dark:text-white">Riwayat 10 Laporan Terakhir</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-50 dark:bg-slate-800/50">
                    <tr class="text-left">
                        <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300">Tanggal & Pelapor</th>
                        <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300">Mesin & Plant</th>
                        <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300">Uraian Singkat</th>
                        <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300 text-center">Status</th>
                    </tr>
                </thead>
                {{-- PERBAIKAN: Memastikan <tbody> diisi dengan benar --}}
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
                        <td class="px-5 py-4 whitespace-nowrap text-center">
                            @php
                                $status = optional($laporan->maintenance)->status ?? 'Pending';
                            @endphp

                            @if($status == 'Pending')
                                <span class="inline-flex items-center justify-center rounded-full bg-amber-100 px-2.5 py-0.5 text-amber-700 dark:bg-amber-900/50 dark:text-amber-400">
                                    <p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p>
                                </span>
                            @elseif($status == 'Dalam Proses')
                                <span class="inline-flex items-center justify-center rounded-full bg-sky-100 px-2.5 py-0.5 text-sky-700 dark:bg-sky-900/50 dark:text-sky-400">
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
                        <td colspan="4" class="px-6 py-12 text-center text-slate-500">
                            Belum ada laporan yang masuk.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
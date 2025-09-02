{{-- File: resources/views/livewire/maintenance/update-laporan.blade.php --}}
<div>
    @if($isModalOpen && $laporanProduksi)
    <div
        x-data="{ show: @entangle('isModalOpen') }"
        x-show="show"
        x-on:keydown.escape.window="show = false"
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        style="display: none;">
        <div x-show="show" x-transition.opacity class="fixed inset-0 bg-black/60 backdrop-blur-sm" wire:click="closeModal"></div>

        <div x-show="show" x-transition class="relative w-full max-w-2xl bg-white dark:bg-slate-800 rounded-lg shadow-xl border border-slate-200 dark:border-slate-700">
            <form wire:submit.prevent="updateLaporan">
                <div class="p-5 border-b border-slate-200 dark:border-slate-700">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                        Update Status Laporan #{{ $laporanProduksi?->id }}
                    </h3>
                </div>

                <div class="p-6 space-y-4 text-sm max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <div>
                            <label for="status" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Status</label>
                            <select wire:model="status" id="status" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                <option value="Pending">Pending</option>
                                <option value="On Progress">On Progress</option>
                                <option value="Belum Selesai">Belum Selesai</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        <div>
                            <label for="tanggal_selesai" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Tanggal Selesai</label>
                            <input wire:model="tanggal_selesai" type="date" id="tanggal_selesai" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                            @error('tanggal_selesai') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="waktu_perbaikan" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Waktu Mulai Perbaikan</label>
                            <input wire:model="waktu_perbaikan" type="time" id="waktu_perbaikan" required class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                            @error('waktu_perbaikan') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="waktu_selesai" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Waktu Selesai Perbaikan</label>
                            <input wire:model="waktu_selesai" type="time" id="waktu_selesai" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                            @error('waktu_selesai') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>


                        <div class="sm:col-span-2"
                            x-data="{ open: false }"
                            @click.away="open = false"
                            class="relative">
                            <label for="nama_teknisi_search" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Nama Teknisi <span class="text-xs text-slate-400">(Maks. 5)</span></label>
                            <div class="mt-1 flex flex-wrap gap-1 mb-2">
                                @foreach($selectedTechnicians as $index => $technician)
                                <span class="inline-flex items-center gap-x-1.5 rounded-md px-2 py-1 text-xs font-medium text-white bg-blue-600">
                                    {{ $technician }}
                                    <button type="button" wire:click="removeTechnician({{ $index }})" class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-blue-500/20">
                                        <span class="sr-only">Remove</span>
                                        <svg viewBox="0 0 14 14" class="h-3.5 w-3.5 stroke-blue-100/50 group-hover:stroke-blue-100">
                                            <path d="M4 4l6 6m0-6l-6 6" />
                                        </svg>
                                        <span class="absolute -inset-1"></span>
                                    </button>
                                </span>
                                @endforeach
                            </div>
                            @if(count($selectedTechnicians)
                            < 5)
                                <input id="nama_teknisi_search" type="text" placeholder="Cari atau pilih teknisi..." wire:model.live.debounce.300ms="searchQuery" @focus="open = true" autocomplete="off" class="block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm" />
                            @else
                            <div class="mt-1 p-2 w-full text-center text-xs text-slate-400 bg-slate-100 dark:bg-slate-700 rounded-md">Batas maksimal 5 teknisi.</div>
                            @endif
                            <div x-show="open" x-transition style="display: none;" class="absolute z-10 mt-1 w-full max-h-48 overflow-y-auto rounded-md bg-white dark:bg-slate-700 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <ul class="py-1">
                                    @forelse($this->filteredTechnicians as $teknisi)
                                    <li wire:click="selectTechnician('{{ $teknisi }}')" @click="open = false" class="cursor-pointer select-none relative py-2 pl-3 pr-9 text-slate-900 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-600">{{ $teknisi }}</li>
                                    @empty
                                    @if(!empty($searchQuery))
                                    <li class="relative py-2 px-3 text-slate-500 dark:text-slate-400">Tidak ada hasil ditemukan.</li>
                                    @endif
                                    @endforelse
                                </ul>
                            </div>
                            @error('selectedTechnicians') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="keterangan_produksi" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Keterangan Produksi</label>
                            <input type="text" id="keterangan_produksi" value="{{ $laporanProduksi->keterangan }}" readonly class="mt-1 block w-full rounded-md border-slate-200 bg-slate-100 dark:bg-slate-900/50 dark:border-slate-700 dark:text-slate-400 shadow-sm text-sm">
                        </div>
                        <div x-data="{ openKeterangan: false }" @click.away="openKeterangan = false">
                            <label for="keterangan_maintenance" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Keterangan Maintenance</label>
                            <div class="relative mt-1">
                                {{-- Gunakan wire:model dan hapus x-model --}}
                                <input wire:model="keterangan_maintenance" @click="openKeterangan = true" readonly id="keterangan_maintenance" placeholder="Pilih Keterangan..." class="w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm cursor-pointer">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a.75.75 0 01.53.22l3.5 3.5a.75.75 0 01-1.06 1.06L10 4.81 7.03 7.78a.75.75 0 01-1.06-1.06l3.5-3.5A.75.75 0 0110 3zm-3.72 9.53a.75.75 0 011.06 0L10 15.19l2.97-2.97a.75.75 0 111.06 1.06l-3.5 3.5a.75.75 0 01-1.06 0l-3.5-3.5a.75.75 0 010-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div x-show="openKeterangan" style="display: none;" class="absolute z-10 w-full mt-1 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-600 rounded-md shadow-lg max-h-32 overflow-y-auto">
                                    @foreach(['TM','TE','TU','LM','LE','LU'] as $keterangan)
                                        <div wire:click="setKeteranganMaintenance('{{ $keterangan }}')" @click="openKeterangan = false" class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700">{{ $keterangan }}</div>
                                    @endforeach
                                </div>
                            </div>
                            @error('keterangan_maintenance') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="uraian_perbaikan" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Uraian Perbaikan</label>
                            <textarea wire:model="jenis_perbaikan" id="uraian_perbaikan" rows="3" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm resize-none" placeholder="Jelaskan detail perbaikan..."></textarea>
                        </div>
                        <div>
                            <label for="sparepart" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Sparepart</label>
                            <textarea wire:model="sparepart" id="sparepart" rows="3" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm resize-none"></textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 flex justify-end items-center space-x-3">
                    <button type="button" wire:click="closeModal" class="px-4 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-300 rounded-md shadow-sm hover:bg-slate-50">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700">
                        <span wire:loading.remove wire:target="updateLaporan">Simpan Perubahan</span>
                        <span wire:loading wire:target="updateLaporan">Menyimpan...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
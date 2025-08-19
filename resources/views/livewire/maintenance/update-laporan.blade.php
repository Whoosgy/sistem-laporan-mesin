{{-- File: resources/views/livewire/maintenance/update-laporan.blade.php --}}
<div>
    @if($isModalOpen && $laporanProduksi)
    <div 
        x-data="{ show: @entangle('isModalOpen') }"
        x-show="show"
        x-on:keydown.escape.window="show = false"
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        style="display: none;"
    >
        <div x-show="show" x-transition.opacity class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="show = false"></div>
        
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
                            <select wire:model="status" id="status" required class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                <option value="Pending">Pending</option>
                                <option value="Belum Selesai">Belum Selesai</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        
                        <div 
                            x-data="{ open: false }" 
                            @click.away="open = false" 
                            class="relative"
                        >
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

                            @if(count($selectedTechnicians) < 5)
                                <input
                                    id="nama_teknisi_search"
                                    type="text"
                                    placeholder="Cari atau pilih teknisi..."
                                    wire:model.live.debounce.300ms="searchQuery"
                                    @focus="open = true"
                                    autocomplete="off"
                                    class="block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                                />
                            @else
                                <div class="mt-1 p-2 w-full text-center text-xs text-slate-400 bg-slate-100 dark:bg-slate-700 rounded-md">Batas maksimal 5 teknisi.</div>
                            @endif
                            
                            <div x-show="open"
                                 x-transition
                                 class="absolute z-10 mt-1 w-full max-h-48 overflow-y-auto rounded-md bg-white dark:bg-slate-700 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                 style="display: none;">
                                <ul class="py-1">
                                    @forelse($this->filteredTechnicians as $teknisi)
                                        <li
                                            wire:click="selectTechnician('{{ $teknisi }}')"
                                            @click="open = false"
                                            class="cursor-pointer select-none relative py-2 pl-3 pr-9 text-slate-900 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-600"
                                        >
                                            {{ $teknisi }}
                                        </li>
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
                            <label for="tanggal_selesai" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Tanggal Selesai</label>
                            <input wire:model="tanggal_selesai" type="date" id="tanggal_selesai" required class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                        <div>
                            <label for="waktu_perbaikan" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Waktu Perbaikan</label>
                            <input wire:model="waktu_perbaikan" type="time" id="waktu_perbaikan" required class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                        
                        {{-- DITAMBAHKAN: Keterangan dari Laporan Produksi --}}
                        <div>
                            <label for="keterangan_produksi" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Keterangan Awal</label>
                            <input type="text" id="keterangan_produksi" value="{{ $laporanProduksi->keterangan }}" readonly class="mt-1 block w-full rounded-md border-slate-200 bg-slate-100 dark:bg-slate-900/50 dark:border-slate-700 dark:text-slate-400 shadow-sm text-sm">
                        </div>

                        <div>
                            <label for="jenis_perbaikan" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Uraian Perbaikan</label>
                            <input wire:model="jenis_perbaikan" type="text" id="jenis_perbaikan" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                        
                        <div class="sm:col-span-2">
                            <label for="sparepart" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Sparepart</label>
                            <input wire:model="sparepart" type="text" id="sparepart" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 flex justify-end items-center space-x-3">
                    <button type="button" @click="show = false" class="px-4 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-300 rounded-md shadow-sm hover:bg-slate-50">
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

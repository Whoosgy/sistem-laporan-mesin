<div>
    @if($isModalOpen && $laporanProduksi)
    <div 
        x-data="{ show: @entangle('isModalOpen') }"
        x-show="show"
        x-on:keydown.escape.window="show = false"
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        style="display: none;"
    >
        <div x-show="show" x-transition.opacity class="fixed inset-0 bg-black/60 backdrop-blur-sm" wire:click="$set('isModalOpen', false)"></div>

        <div x-show="show" x-transition class="relative w-full max-w-2xl bg-white dark:bg-slate-800 rounded-lg shadow-xl border border-slate-200 dark:border-slate-700">
            <form wire:submit.prevent="updateLaporan">
                <div class="p-5 border-b border-slate-200 dark:border-slate-700">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                        Update Status Laporan #{{ $laporanProduksi->id }}
                    </h3>
                </div>

                <div class="p-6 space-y-4 text-sm max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Status</label>
                            <select wire:model="status" id="status" required class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                <option>Dalam Proses</option>
                                <option>Selesai</option>
                            </select>
                        </div>
                         <div>
                            <label for="nama_teknisi" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Nama Teknisi</label>
                            <input wire:model="nama_teknisi" type="text" id="nama_teknisi" required class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                        <div>
                            <label for="tanggal_selesai" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Tanggal Selesai</label>
                            <input wire:model="tanggal_selesai" type="date" id="tanggal_selesai" required class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                        <div>
                            <label for="waktu_perbaikan" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Waktu Perbaikan</label>
                            <input wire:model="waktu_perbaikan" type="time" id="waktu_perbaikan" required class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                         <div>
                            <label for="jenis_perbaikan" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Jenis Perbaikan</label>
                            <input wire:model="jenis_perbaikan" type="text" id="jenis_perbaikan" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                         <div>
                            <label for="sparepart" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Sparepart</label>
                            <input wire:model="sparepart" type="text" id="sparepart" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="keterangan_update" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Keterangan Tambahan</label>
                            <textarea wire:model="keterangan" id="keterangan_update" rows="3" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"></textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 flex justify-end items-center space-x-3">
                    <button type="button" wire:click="$set('isModalOpen', false)" class="px-4 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-300 rounded-md shadow-sm hover:bg-slate-50">
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
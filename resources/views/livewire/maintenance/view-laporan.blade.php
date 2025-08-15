<div>
    @if($isModalOpen && $laporanProduksi)
    <div 
        x-data="{ show: @entangle('isModalOpen') }"
        x-show="show"
        x-on:keydown.escape.window="show = false"
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        style="display: none;"
    >
        {{-- Latar Belakang Overlay --}}
        <div x-show="show" x-transition.opacity class="fixed inset-0 bg-black/60 backdrop-blur-sm" wire:click="closeModal"></div>

        {{-- Konten Modal --}}
        <div x-show="show" x-transition class="relative w-full max-w-2xl bg-white dark:bg-slate-800 rounded-lg shadow-xl border border-slate-200 dark:border-slate-700">
            
            {{-- Header Modal --}}
            <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                        Detail Laporan #{{ $laporanProduksi->id }}
                    </h3>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                        Mesin: {{ $laporanProduksi->nama_mesin }} - Plant: {{ $laporanProduksi->plant }}
                    </p>
                </div>
                <button wire:click="closeModal" class="text-slate-400 hover:text-slate-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            {{-- Body Modal --}}
            <div class="p-6 space-y-6 text-sm max-h-[70vh] overflow-y-auto">
                {{-- Bagian Info Laporan Produksi --}}
                <div>
                    <h4 class="text-base font-semibold text-slate-800 dark:text-slate-200 mb-2">Info Laporan Produksi</h4>
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-2">
                        <div class="sm:col-span-1">
                            <dt class="font-medium text-slate-500">Tanggal & Jam Lapor</dt>
                            <dd class="text-slate-900 dark:text-white">{{ \Carbon\Carbon::parse($laporanProduksi->tanggal_lapor)->format('d M Y') }} - {{ \Carbon\Carbon::parse($laporanProduksi->jam_lapor)->format('H:i') }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="font-medium text-slate-500">Pelapor</dt>
                            <dd class="text-slate-900 dark:text-white">{{ $laporanProduksi->nama_pelapor }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="font-medium text-slate-500">Plant & Shift</dt>
                            <dd class="text-slate-900 dark:text-white">Plant {{ $laporanProduksi->plant }} - Shift {{ $laporanProduksi->shift }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="font-medium text-slate-500">Bagian Rusak</dt>
                            <dd class="text-slate-900 dark:text-white">{{ $laporanProduksi->bagian_rusak ?? '-' }}</dd>
                        </div>
                        <div class="sm:col-span-2">
                            <dt class="font-medium text-slate-500">Uraian Kerusakan</dt>
                            <dd class="text-slate-900 dark:text-white mt-1">{{ $laporanProduksi->uraian_kerusakan }}</dd>
                        </div>
                         <div class="sm:col-span-2">
                            <dt class="font-medium text-slate-500">Keterangan Produksi</dt>
                            <dd class="text-slate-900 dark:text-white mt-1">{{ $laporanProduksi->keterangan }}</dd>
                        </div>
                    </dl>
                </div>

                <hr class="border-slate-200 dark:border-slate-700">

                {{-- Bagian Info Maintenance --}}
                <div>
                    <h4 class="text-base font-semibold text-slate-800 dark:text-slate-200 mb-2">Info Maintenance</h4>
                    @if($laporanProduksi->maintenance)
                        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-2">
                            <div class="sm:col-span-1">
                                <dt class="font-medium text-slate-500">Status</dt>
                                <dd class="text-slate-900 dark:text-white font-semibold">{{ $laporanProduksi->maintenance->status }}</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="font-medium text-slate-500">Teknisi</dt>
                                <dd class="text-slate-900 dark:text-white">{{ $laporanProduksi->maintenance->nama_teknisi }}</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="font-medium text-slate-500">Tanggal Selesai</dt>
                                <dd class="text-slate-900 dark:text-white">{{ \Carbon\Carbon::parse($laporanProduksi->maintenance->tanggal_selesai)->format('d M Y') }}</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="font-medium text-slate-500">Waktu Perbaikan</dt>
                                <dd class="text-slate-900 dark:text-white">{{ $laporanProduksi->maintenance->waktu_perbaikan }}</dd>
                            </div>
                            <div class="sm:col-span-2">
                                <dt class="font-medium text-slate-500">Keterangan Perbaikan</dt>
                                <dd class="text-slate-900 dark:text-white mt-1">{{ $laporanProduksi->maintenance->keterangan }}</dd>
                            </div>
                        </dl>
                    @else
                        <p class="text-slate-500 dark:text-slate-400">Laporan ini masih berstatus <span class="font-semibold text-amber-500">Pending</span> dan belum ditangani.</p>
                    @endif
                </div>
            </div>

            {{-- Footer Modal --}}
            <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 flex justify-end">
                <button type="button" wire:click="closeModal" class="px-4 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-300 rounded-md shadow-sm hover:bg-slate-50">
                    Tutup
                </button>
            </div>
        </div>
    </div>
    @endif
</div>
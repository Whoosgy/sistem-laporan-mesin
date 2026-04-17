
<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isModalOpen && $laporanProduksi): ?>
    <div
        x-data="{ show: <?php if ((object) ('isModalOpen') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('isModalOpen'->value()); ?>')<?php echo e('isModalOpen'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('isModalOpen'); ?>')<?php endif; ?> }"
        x-show="show"
        x-on:keydown.escape.window="show = false"
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        style="display: none;">
        
        <div x-show="show" x-transition.opacity class="fixed inset-0 bg-black/60 backdrop-blur-sm" wire:click="closeModal"></div>

        
        <div x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="relative w-full max-w-2xl bg-white dark:bg-slate-800 rounded-lg shadow-xl border border-slate-200 dark:border-slate-700">

            
            <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                        Detail Laporan #<?php echo e($laporanProduksi->id); ?>

                    </h3>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                        Mesin: <?php echo e($laporanProduksi->nama_mesin); ?> - Plant: <?php echo e($laporanProduksi->plant); ?>

                    </p>
                </div>
                <button wire:click="closeModal" class="text-slate-400 hover:text-slate-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            
            <div class="p-6 space-y-6 text-sm max-h-[70vh] overflow-y-auto">
                
                <div>
                    <h4 class="text-base font-semibold text-slate-800 dark:text-slate-200 mb-2">Info Laporan Produksi</h4>
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-2">
                        <div class="sm:col-span-1">
                            <dt class="font-medium text-slate-500">Tanggal & Jam Lapor</dt>
                            <dd class="text-slate-900 dark:text-white"><?php echo e(\Carbon\Carbon::parse($laporanProduksi->tanggal_lapor)->format('d M Y')); ?> - <?php echo e(\Carbon\Carbon::parse($laporanProduksi->jam_lapor)->format('H:i')); ?></dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="font-medium text-slate-500">Pelapor</dt>
                            <dd class="text-slate-900 dark:text-white"><?php echo e($laporanProduksi->nama_pelapor); ?></dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="font-medium text-slate-500">Plant & Shift</dt>
                            <dd class="text-slate-900 dark:text-white">Plant <?php echo e($laporanProduksi->plant); ?> - Shift <?php echo e($laporanProduksi->shift); ?></dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="font-medium text-slate-500">Bagian Rusak</dt>
                            <dd class="text-slate-900 dark:text-white"><?php echo e($laporanProduksi->bagian_rusak ?? '-'); ?></dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="font-medium text-slate-500">Keterangan Produksi</dt>
                            <dd class="text-slate-900 dark:text-white mt-1"><?php echo e($laporanProduksi->keterangan); ?></dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="font-medium text-slate-500">Uraian Kerusakan</dt>
                            <dd class="text-slate-900 dark:text-white mt-1"><?php echo e($laporanProduksi->uraian_kerusakan); ?></dd>
                        </div>
                    </dl>
                </div>

                
                <div>
                    <h4 class="text-base font-semibold text-slate-800 dark:text-slate-200 mb-2">Foto Laporan</h4>
                    <div class="mt-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($photoPaths)): ?>
                        <div class="flex flex-wrap gap-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $photoPaths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button
                                type="button"
                                wire:click="openLightbox('<?php echo e(Storage::url($path)); ?>')"
                                class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-50 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900 transition-colors text-xs">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <span>Lihat Foto <?php echo e($loop->iteration); ?></span>
                            </button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <?php else: ?>
                        <div class="text-center text-slate-500 dark:text-slate-400 p-4 bg-slate-50 dark:bg-slate-700/50 rounded-lg">
                            Tidak ada foto yang diunggah.
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                <hr class="border-slate-200 dark:border-slate-700">

                
                <div>
                    <h4 class="text-base font-semibold text-slate-800 dark:text-slate-200 mb-2">Info Maintenance</h4>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($laporanProduksi->maintenance): ?>
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-2">
                        <div class="sm:col-span-1">
                            <dt class="font-medium text-slate-500">Status</dt>
                            <dd class="text-slate-900 dark:text-white font-semibold"><?php echo e($laporanProduksi->maintenance->status); ?></dd>
                        </div>
                        
                <div class="sm:col-span-1">
                    <dt class="font-medium text-slate-500">Tanggal Selesai</dt>
                    <dd class="text-slate-900 dark:text-white"><?php echo e($laporanProduksi->maintenance->tanggal_selesai); ?></dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="font-medium text-slate-500">Waktu Mulai Perbaikan</dt>
                    <dd class="text-slate-900 dark:text-white"><?php echo e($laporanProduksi->maintenance->waktu_perbaikan); ?></dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="font-medium text-slate-500">Waktu Selesai Perbaikan</dt>
                    <dd class="text-slate-900 dark:text-white"><?php echo e($laporanProduksi->maintenance->waktu_selesai); ?></dd>
                </div>
                
                <div class="sm:col-span-1 border-b border-slate-100 dark:border-slate-800 pb-3">
    
    <dt class="text-sm font-medium text-slate-500 dark:text-slate-400">Teknisi</dt>
    
    <dd class="mt-2 flex flex-wrap gap-2">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($laporanProduksi && $laporanProduksi->maintenance): ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $laporanProduksi->maintenance->technicians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-semibold 
                    
                    bg-blue-50 text-blue-700 ring-1 ring-inset ring-blue-700/10 
                    
                    dark:bg-blue-400/10 dark:text-blue-400 dark:ring-blue-400/20 shadow-sm">
                    
                    
                    <svg class="mr-1 h-3 w-3 fill-blue-500 dark:fill-blue-400" viewBox="0 0 6 6" aria-hidden="true">
                        <circle cx="3" cy="3" r="3" />
                    </svg>
                    
                    <?php echo e($tech->name); ?>

                </span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <span class="text-sm italic text-slate-400 dark:text-slate-500">
                    Tidak ada teknisi terpilih
                </span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php else: ?>
            <span class="text-sm italic text-slate-400 dark:text-slate-500">
                Data belum diinput
            </span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </dd>
</div>
                <div class="sm:col-span-1">
                    <dt class="font-medium text-slate-500">Keterangan Maintenance</dt>
                    <dd class="text-slate-900 dark:text-white"><?php echo e($laporanProduksi->maintenance->keterangan_maintenance); ?></dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="font-medium text-slate-500">Uraian Perbaikan</dt>
                    <dd class="text-slate-900 dark:text-white mt-1"><?php echo e($laporanProduksi->maintenance->jenis_perbaikan); ?></dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="font-medium text-slate-500">Sparepart</dt>
                    <dd class="text-slate-900 dark:text-white mt-1"><?php echo e($laporanProduksi->maintenance->sparepart ?? 'Tidak ada'); ?></dd>
                </div>
                </dl>
                <?php else: ?>
                <p class="text-slate-500 dark:text-slate-400">Laporan ini masih berstatus <span class="font-semibold text-amber-500">Pending</span> dan belum ditangani.</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        
        <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 flex justify-end">
            <button type="button" wire:click="closeModal" class="px-4 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-300 rounded-md shadow-sm hover:bg-slate-50">
                Tutup
            </button>
        </div>
    </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($lightboxOpen): ?>
<div class="fixed inset-0 z-[99] flex items-center justify-center bg-black/70 p-4">
    <div class="relative max-w-4xl max-h-full rounded-lg" @click.away="$wire.closeLightbox()">
        <img src="<?php echo e($lightboxImage); ?>" alt="Pratinjau Foto" class="w-auto h-auto max-w-full max-h-[90vh] rounded-lg">
        <button wire:click="closeLightbox" class="absolute -top-2 -right-2 bg-white rounded-full p-1 text-slate-800 hover:bg-slate-200 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div><?php /**PATH C:\laragon\www\proyek-laporan\resources\views/livewire/maintenance/view-laporan.blade.php ENDPATH**/ ?>
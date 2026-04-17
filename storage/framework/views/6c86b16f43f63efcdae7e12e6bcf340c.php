
<div>

    <?php $__env->startPush('styles'); ?>
    <style>
        .date-input-fix::-webkit-calendar-picker-indicator,
        .time-input-fix::-webkit-calendar-picker-indicator {
            filter: invert(0);
        }

        .dark .date-input-fix::-webkit-calendar-picker-indicator,
        .dark .time-input-fix::-webkit-calendar-picker-indicator {
            filter: invert(1);
        }
    </style>
    <?php $__env->stopPush(); ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isModalOpen && $laporanProduksi): ?>
    <div
        x-data="{ show: <?php if ((object) ('isModalOpen') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('isModalOpen'->value()); ?>')<?php echo e('isModalOpen'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('isModalOpen'); ?>')<?php endif; ?> }"
        x-show="show"
        x-on:keydown.escape.window="show = false"
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        style="display: none;">
        <div x-show="show" x-transition.opacity class="fixed inset-0 bg-black/60 backdrop-blur-sm" wire:click="closeModal"></div>

        <div x-show="show" x-transition class="relative w-full max-w-2xl bg-white dark:bg-slate-800 rounded-lg shadow-xl border border-slate-200 dark:border-slate-700">
            <form wire:submit.prevent="updateLaporan">
                <div class="p-5 border-b border-slate-200 dark:border-slate-700">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                        Update Status Laporan #<?php echo e($laporanProduksi?->id); ?>

                    </h3>
                </div>

                <div class="p-6 space-y-4 text-sm max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        
                        <div x-data="{ open: false, selected: <?php if ((object) ('status') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('status'->value()); ?>')<?php echo e('status'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('status'); ?>')<?php endif; ?> }" @click.away="open = false">
                            <label for="status_input" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Status</label>
                            <div class="relative mt-1">
                                <input
                                    type="text"
                                    id="status_input"
                                    readonly
                                    x-model="selected"
                                    @click="open = !open"
                                    placeholder="Pilih Status..."
                                    class="w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm cursor-pointer pl-3 pr-10 py-2">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a.75.75 0 01.53.22l3.5 3.5a.75.75 0 01-1.06 1.06L10 4.81 7.03 7.78a.75.75 0 01-1.06-1.06l3.5-3.5A.75.75 0 0110 3zm-3.72 9.53a.75.75 0 011.06 0L10 15.19l2.97-2.97a.75.75 0 111.06 1.06l-3.5 3.5a.75.75 0 01-1.06 0l-3.5-3.5a.75.75 0 010-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div x-show="open" style="display: none;" class="absolute z-10 w-full mt-1 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-600 rounded-md shadow-lg max-h-40 overflow-y-auto">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['Pending', 'On Progress', 'Belum Selesai', 'Selesai']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div @click="selected = '<?php echo e($statusOption); ?>'; open = false" class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"><?php echo e($statusOption); ?></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs mt-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div>
                            <label for="tanggal_selesai" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Tanggal Selesai</label>
                            <input wire:model="tanggal_selesai" type="date" id="tanggal_selesai" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm date-input-fix">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['tanggal_selesai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs mt-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div>
                            <label for="waktu_perbaikan" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Waktu Mulai Perbaikan</label>
                            <input wire:model="waktu_perbaikan" type="time" id="waktu_perbaikan" required class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm time-input-fix">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['waktu_perbaikan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs mt-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div>
                            <label for="waktu_selesai" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Waktu Selesai Perbaikan</label>
                            <input wire:model="waktu_selesai" type="time" id="waktu_selesai" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm time-input-fix">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['waktu_selesai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs mt-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div class="sm:col-span-2"
                            x-data="{ open: false }"
                            @click.away="open = false"
                            class="relative">

                            <label for="nama_teknisi_search" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Nama Teknisi 
                                <span class="text-xs text-slate-400">(Maks. 5)</span></label>

                            <div class="mt-1 flex flex-wrap gap-1 mb-2">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $selectedTechnicians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $technician): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="inline-flex items-center gap-x-1.5 rounded-md px-2 py-1 text-xs font-medium text-white bg-blue-600">
                                    
                                    <?php echo e($technician['name']); ?>

                                    <button type="button" wire:click="removeTechnician(<?php echo e($index); ?>)" class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-blue-500/20">
                                        <span class="sr-only">Remove</span>
                                        <svg viewBox="0 0 14 14" class="h-3.5 w-3.5 stroke-blue-100/50 group-hover:stroke-blue-100">
                                            <path d="M4 4l6 6m0-6l-6 6" />
                                        </svg>
                                        <span class="absolute -inset-1"></span>
                                    </button>
                                </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($selectedTechnicians)
                            < 5): ?>
                                <input id="nama_teknisi_search" 
                                type="text" placeholder="Cari atau pilih teknisi..." 
                                wire:model.live.debounce.300ms="searchQuery" 
                                @focus="open = true" autocomplete="off" 
                                class="block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm" />
                            <?php else: ?>

                            <div class="mt-1 p-2 w-full text-center text-xs text-slate-400 bg-slate-100 dark:bg-slate-700 rounded-md">Batas maksimal 5 teknisi.</div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <div x-show="open" 
                            x-transition 
                            style="display: none;" 
                            class="absolute z-10 mt-1 w-full max-h-48 overflow-y-auto rounded-md bg-white dark:bg-slate-700 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <ul class="py-1">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $this->filteredTechnicians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teknisi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li wire:click="selectTechnician(<?php echo e($teknisi['id']); ?>, '<?php echo e($teknisi['name']); ?>')"
                                     @click="open = false" 
                                     class="cursor-pointer select-none relative py-2 pl-3 pr-9 text-slate-900 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-600">
                                     <?php echo e($teknisi['name']); ?>

                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($searchQuery)): ?>
                                    <li class="relative py-2 px-3 text-slate-500 dark:text-slate-400">Tidak ada hasil ditemukan.</li>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </ul>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['selectedTechnicians'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs mt-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div>
                            <label for="keterangan_produksi" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Keterangan Produksi</label>
                            <input type="text" id="keterangan_produksi" value="<?php echo e($laporanProduksi->keterangan); ?>" readonly class="mt-1 block w-full rounded-md border-slate-200 bg-slate-100 dark:bg-slate-900/50 dark:border-slate-700 dark:text-slate-400 shadow-sm text-sm">
                        </div>

                        
                        <div x-data="{ open: false, selected: <?php if ((object) ('keterangan_maintenance') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('keterangan_maintenance'->value()); ?>')<?php echo e('keterangan_maintenance'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('keterangan_maintenance'); ?>')<?php endif; ?> }" @click.away="open = false">
                            <label for="keterangan_maintenance_input" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Keterangan Maintenance</label>
                            <div class="relative mt-1">
                                <input
                                    type="text"
                                    id="keterangan_maintenance_input"
                                    readonly
                                    x-model="selected"
                                    @click="open = !open"
                                    placeholder="Pilih Keterangan..."
                                    class="w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm cursor-pointer pl-3 pr-10 py-2">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a.75.75 0 01.53.22l3.5 3.5a.75.75 0 01-1.06 1.06L10 4.81 7.03 7.78a.75.75 0 01-1.06-1.06l3.5-3.5A.75.75 0 0110 3zm-3.72 9.53a.75.75 0 011.06 0L10 15.19l2.97-2.97a.75.75 0 111.06 1.06l-3.5 3.5a.75.75 0 01-1.06 0l-3.5-3.5a.75.75 0 010-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div x-show="open" style="display: none;" class="absolute z-10 w-full mt-1 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-600 rounded-md shadow-lg max-h-32 overflow-y-auto">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['TM','TE','TU','LM','LE','LU']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keterangan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div @click="selected = '<?php echo e($keterangan); ?>'; open = false" class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"><?php echo e($keterangan); ?></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['keterangan_maintenance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs mt-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div>
                            <label for="uraian_perbaikan" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Uraian Perbaikan</label>
                            <textarea wire:model="jenis_perbaikan" id="uraian_perbaikan" rows="3" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm resize-none" placeholder="Jelaskan detail perbaikan..."></textarea>
                        </div>
                        <div>
                            <label for="sparepart" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Sparepart</label>
                            <textarea wire:model="sparepart" id="sparepart" rows="3" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm resize-none"></textarea>
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

</div><?php /**PATH C:\laragon\www\proyek-laporan\resources\views/livewire/maintenance/update-laporan.blade.php ENDPATH**/ ?>
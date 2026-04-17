<div wire:poll.15s>
    <?php $__env->startSection('title', 'Dashboard Maintenance'); ?>

    <div class="container mx-auto px-4 py-8">

        
        <div class="mb-6 flex justify-end">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('download-laporan-button', []);

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3839783965-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>

        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            
            <div class="bg-white dark:bg-slate-800 rounded-xl p-5 flex items-center shadow-lg shadow-amber-500/20 p-6 flex items-center transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 rounded-lg bg-amber-100 dark:bg-amber-900/50 flex-shrink-0 flex items-center justify-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500 dark:text-amber-400 animate-spin-slow" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-slate-700 dark:text-slate-200">Pending</h3>
                    <div class="flex items-baseline space-x-2">
                        <p class="text-3xl font-bold text-amber-500 dark:text-amber-400"><?php echo e($pendingCount); ?></p>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Laporan</p>
                    </div>
                </div>
            </div>

            
            <div class="bg-white dark:bg-slate-800 rounded-xl p-5 flex items-center shadow-lg shadow-red-500/20 p-6 flex items-center transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 rounded-lg bg-red-100 dark:bg-red-900/50 flex-shrink-0 flex items-center justify-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 dark:text-red-400 animate-edit-wiggle" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-slate-700 dark:text-slate-200">Belum Selesai</h3>
                    <div class="flex items-baseline space-x-2">
                        <p class="text-3xl font-bold text-red-500 dark:text-red-400"><?php echo e($belumSelesaiCount); ?></p>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Laporan</p>
                    </div>
                </div>
            </div>

            
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
                    <p class="text-3xl font-bold text-sky-500 dark:text-sky-400"><?php echo e($prosesCount); ?></p>
                </div>
            </div>

            
            <div class="bg-white dark:bg-slate-800 rounded-xl p-5 flex items-center shadow-lg shadow-emerald-500/20 p-6 flex items-center transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 rounded-lg bg-emerald-100 dark:bg-emerald-900/50 flex-shrink-0 flex items-center justify-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-500 dark:text-emerald-400 animate-check-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-slate-700 dark:text-slate-200">Selesai</h3>
                    <div class="flex items-baseline space-x-2">
                        <p class="text-3xl font-bold text-emerald-500 dark:text-emerald-400"><?php echo e($selesaiCount); ?></p>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Laporan</p>
                    </div>
                </div>
            </div>
        </div>

        
        <div
            class="bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 overflow-hidden">

            <div class="p-5 flex flex-wrap gap-4 justify-between items-center">
                
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
                
                <div class="flex items-center space-x-2">

                    
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
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = config('datamesin.plants'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="#" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700" role="menuitem" wire:click.prevent="filterReports('plant', '<?php echo e($plant); ?>')" @click="selectedAvailabilityLabel = '<?php echo e($plant); ?>'; open = false"><?php echo e($plant); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </template>
                                <template x-if="$wire.filterCategory === 'status'">
                                    <div>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['Pending', 'On Progress', 'Belum Selesai', 'Selesai']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="#" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700" role="menuitem" wire:click.prevent="filterReports('status', '<?php echo e($status); ?>')" @click="selectedAvailabilityLabel = '<?php echo e($status); ?>'; open = false"><?php echo e($status); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </template>
                                <template x-if="$wire.filterCategory === 'keterangan'">
                                    <div class="max-h-24 overflow-y-auto">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['Mekanik', 'Elektrik', 'Utility', 'Calibraty', 'Battery', 'Bahan bakar solar']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keterangan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="#" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700" role="menuitem" wire:click.prevent="filterReports('keterangan', '<?php echo e($keterangan); ?>')" @click="selectedAvailabilityLabel = '<?php echo e($keterangan); ?>'; open = false"><?php echo e($keterangan); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    
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
                                    <svg class="h-4 w-4 <?php if($sortField !== 'tanggal_lapor'): ?> text-slate-400 <?php endif; ?> <?php if($sortDirection === 'desc' && $sortField === 'tanggal_lapor'): ?> transform rotate-180 <?php endif; ?> transition-transform" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 5H3L3 16H5L5 5L8 5V4L4 0L0 4V5Z" fill="currentColor" />
                                        <path d="M16 6H10V8H16V6Z" fill="currentColor" />
                                        <path d="M10 10H14V12H10V10Z" fill="currentColor" />
                                        <path d="M12 14H10V16H12V14Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </th>
                             <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300 cursor-pointer hover:bg-slate-100 dark:hover:bg-slate-700"
                                wire:click="sortBy('nama_mesin')">
                                <div class="flex items-center">
                                    <span>Mesin & Plant</span>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortField == 'nama_mesin'): ?>
                                    <span class="ml-2"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortDirection == 'asc'): ?> &uarr; <?php else: ?> &darr; <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </th>
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300">Uraian Perbaikan</th>
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300">Keterangan</th>
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300 text-center">Status</th>
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $semuaLaporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laporan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                            <td class="px-5 py-4 whitespace-nowrap">
                                <p class="font-semibold text-slate-900 dark:text-white"><?php echo e($laporan->nama_pelapor); ?></p>
                                <p class="text-slate-500 dark:text-slate-400">
                                    <?php echo e(\Carbon\Carbon::parse($laporan->tanggal_lapor)->format('d M Y')); ?> -
                                    <?php echo e(\Carbon\Carbon::parse($laporan->jam_lapor)->format('H:i')); ?>

                                </p>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <p class="font-semibold text-slate-900 dark:text-white"><?php echo e($laporan->nama_mesin); ?></p>
                                <p class="text-slate-500 dark:text-slate-400">Plant <?php echo e($laporan->plant); ?></p>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-slate-500 dark:text-slate-400">
                                <?php echo e(optional($laporan->maintenance)->jenis_perbaikan ?? 'Belum Ditentukan'); ?>

                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-slate-500 dark:text-slate-400">
                                <?php echo e($laporan->keterangan); ?>

                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-center">
                                <?php $status = optional($laporan->maintenance)->status ?? 'Pending'; ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($status == 'Pending'): ?>
                                <span
                                    class="inline-flex items-center justify-center rounded-full bg-amber-100 px-2.5 py-0.5 text-amber-700 dark:bg-amber-900/50 dark:text-amber-400">
                                    <p class="whitespace-nowrap text-xs font-semibold"><?php echo e($status); ?></p>
                                </span>

                                <?php elseif($status == 'On Progress'): ?>
                                <span class="inline-flex items-center justify-center rounded-full bg-sky-100 px-2.5 py-0.5 text-sky-700 dark:bg-sky-900/50 dark:text-sky-400">
                                    <p class="whitespace-nowrap text-xs font-semibold"><?php echo e($status); ?></p>
                                </span>

                                <?php elseif($status == 'Dalam Proses' || $status == 'Belum Selesai'): ?>
                                <span
                                    class="inline-flex items-center justify-center rounded-full bg-red-100 px-2.5 py-0.5 text-red-700 dark:bg-red-900/50 dark:text-red-400">
                                    <p class="whitespace-nowrap text-xs font-semibold"><?php echo e($status); ?></p>
                                </span>

                                <?php elseif($status == 'Selesai'): ?>
                                <span
                                    class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-400">
                                    <p class="whitespace-nowrap text-xs font-semibold"><?php echo e($status); ?></p>
                                </span>

                                <?php else: ?>
                                <span
                                    class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-400">
                                    <p class="whitespace-nowrap text-xs font-semibold"><?php echo e($status); ?></p>
                                </span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-center space-x-2">
                                <button wire:click="$dispatch('open-view-modal', { produksiId: <?php echo e($laporan->id); ?> })"
                                    type="button"
                                    class="font-medium text-slate-600 hover:text-blue-600 dark:text-slate-400 dark:hover:text-blue-500">View</button>
                                <button wire:click="$dispatch('open-update-modal', { produksiId: <?php echo e($laporan->id); ?> })"
                                    type="button"
                                    class="font-medium text-slate-600 hover:text-blue-600 dark:text-slate-400 dark:hover:text-blue-500">Update</button>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr class="dark:bg-slate-800">
                            <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($search)): ?>
                                Laporan dengan kata kunci "<?php echo e($search); ?>" tidak ditemukan.
                                <?php else: ?>
                                Belum ada laporan yang masuk.
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                        </tr>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="p-5 border-t border-slate-200 dark:border-slate-700">
                <?php echo e($semuaLaporan->links()); ?>

            </div>
                <?php
        $__scriptKey = '3839783965-0';
        ob_start();
    ?>
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

                window.onload = function() {
                    let isLoggedIn = false;

                    while (!isLoggedIn) {
                        const username = prompt("Masukkan username:");
                        const password = prompt("Masukkan password:");

                        if (username === "maintenance" && password === "welcome123") {
                            alert("Login berhasil! Selamat datang, Admin.");
                            isLoggedIn = true;
                        } else {
                            alert("Login gagal. Silakan coba lagi.");
                        }
                    }
                };
            </script>

                <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>

            
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('maintenance.view-laporan', []);

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3839783965-1', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('maintenance.update-laporan', []);

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3839783965-2', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\proyek-laporan\resources\views/livewire/maintenance-dashboard.blade.php ENDPATH**/ ?>
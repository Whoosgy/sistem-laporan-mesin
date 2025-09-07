<div>

    <div class="space-y-8">
        {{-- Card 1: Form Input --}}
       <div class="bg-white dark:bg-slate-800 rounded-lg shadow-xl border border-slate-200 dark:border-slate-700">
            <div class="p-5 border-b border-slate-200 dark:border-slate-700">
                <h2 class="text-base font-semibold text-slate-900 dark:text-white">
                    Isi Formulir Laporan Kerusakan
                </h2>
            </div>

            <div class="p-5 space-y-4" x-data="{
                    shift: @entangle('shift').live,
                    plant: @entangle('plant').live,
                    nama_mesin: @entangle('nama_mesin').live,
                    keterangan: @entangle('keterangan').live,
                    openShift: false,
                    openPlant: false,
                    openMesin: false,
                    openKeterangan: false,
                    updateShift(time) {
                        if (!time) { this.shift = null; return; }
                        if (time >= '06:45' && time < '15:15') { this.shift = '1'; } 
                        else if (time >= '15:15' && time < '22:45') { this.shift = '2'; } 
                        else { this.shift = '3'; }
                    }
                }">
                <div class="p-5 space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="tanggal_lapor"
                                class="block text-sm font-medium text-slate-600 dark:text-slate-400">Tanggal
                                Lapor</label>
                            <input wire:model.blur="tanggal_lapor" type="date" id="tanggal_lapor"
                                min="{{ now()->format('Y-m-d') }}" max="{{ now()->format('Y-m-d') }}" required
                                class="mt-1 block w-full rounded-md border-slate-300 bg-slate-100 dark:bg-slate-900/50 dark:border-slate-700 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm date-input-fix">
                            @error('tanggal_lapor') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="jam_lapor"
                                class="block text-sm font-medium text-slate-600 dark:text-slate-400">Jam Lapor</label>
                            <input wire:model="jam_lapor" type="time" id="jam_lapor" readonly required
                                class="mt-1 block w-full rounded-md border-slate-300 bg-slate-100 dark:bg-slate-900/50 dark:border-slate-700 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                            @error('jam_lapor') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div @click.away="openShift = false">
                            <label for="shift"
                                class="block text-sm font-medium text-slate-600 dark:text-slate-400">Shift</label>
                            <div class="relative mt-1">
                                <input x-model="shift" @click="openShift = true" readonly id="shift" required
                                    placeholder="Akan terisi otomatis"
                                    class="w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">


                                    </svg>
                                </div>
                                @error('shift') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

                            </div>
                        </div>
                        <div>
                            <x-input-label for="nama_pelapor" value="Nama Pelapor" />

                            <x-text-input id="nama_pelapor" class="block w-full mt-1" type="text"
                                class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm "
                                wire:model.blur="nama_pelapor" placeholder="Nama lengkap" required />
                            @error('nama_pelapor') <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div @click.away="openPlant = false">
                            <label for="plant"
                                class="block text-sm font-medium text-slate-600 dark:text-slate-400">Plant</label>
                            <div class="relative mt-1">
                                <input x-model="plant" @click="openPlant = true" type="text" id="plant"
                                    placeholder="Pilih atau ketik Plant"
                                    class="w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm ">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 3a.75.75 0 01.53.22l3.5 3.5a.75.75 0 01-1.06 1.06L10 4.81 7.03 7.78a.75.75 0 01-1.06-1.06l3.5-3.5A.75.75 0 0110 3zm-3.72 9.53a.75.75 0 011.06 0L10 15.19l2.97-2.97a.75.75 0 111.06 1.06l-3.5 3.5a.75.75 0 01-1.06 0l-3.5-3.5a.75.75 0 010-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div x-show="openPlant" style="display: none;"
                                    class="absolute z-10 w-full mt-1 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-600 rounded-md shadow-lg max-h-60 overflow-auto">
                                    @foreach($listPlant as $p)
                                    <div @click="plant = '{{ addslashes($p) }}'; openPlant = false"
                                        class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700">
                                        {{ $p }}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @error('plant') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="nama_mesin"
                                class="block text-sm font-medium text-slate-600 dark:text-slate-400">Nama Mesin</label>
                            @if ($isPlantManual)
                            <input wire:model="nama_mesin" type="text" id="nama_mesin" required
                                placeholder="{{ $namaMesinPlaceholder }}"
                                class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                            @else

                            <div @click.away="openMesin = false">
                                <div class="relative mt-1">
                                    <input x-model="nama_mesin" @click="openMesin = true" type="text" id="nama_mesin"
                                        required placeholder="{{ $namaMesinPlaceholder }}"
                                        class="w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 3a.75.75 0 01.53.22l3.5 3.5a.75.75 0 01-1.06 1.06L10 4.81 7.03 7.78a.75.75 0 01-1.06-1.06l3.5-3.5A.75.75 0 0110 3zm-3.72 9.53a.75.75 0 011.06 0L10 15.19l2.97-2.97a.75.75 0 111.06 1.06l-3.5 3.5a.75.75 0 01-1.06 0l-3.5-3.5a.75.75 0 010-1.06z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div x-show="openMesin" style="display: none;"
                                        class="absolute z-10 w-full mt-1 bg-white dark:bg-slate-800 border border-slate-300 dark:text-slate-200 dark:border-slate-600 rounded-md shadow-lg max-h-60 overflow-auto">
                                        @forelse($listMesin as $mesin)
                                        <div @click="nama_mesin = '{{ addslashes($mesin) }}'; openMesin = false"
                                            class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700">
                                            {{ $mesin }}
                                        </div>
                                        @empty
                                        <div class="px-4 py-2 text-sm text-slate-500">{{ $emptyMessage }}</div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            @endif
                            @error('nama_mesin') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="bagian_rusak"
                                class="block text-sm font-medium text-slate-600 dark:text-slate-400">Bagian Mesin Rusak
                            </label>
                            <input wire:model.blur="bagian_rusak" type="text" id="bagian_rusak"
                                placeholder="Contoh: Take Up, dll"
                                class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                            @error('bagian_rusak') <span class="text-red-500 text-xs mt-1">{{$message}}</span> @enderror
                        </div>


                        <div @click.away="openKeterangan = false">
                            <label for="keterangan"
                                class="block text-sm font-medium text-slate-600 dark:text-slate-400">keterangan Produksi
                            </label>
                            <div class="relative mt-1">
                                <input x-model="keterangan" @click="openKeterangan = true" readonly id="keterangan"
                                    required placeholder="Pilih Keterangan..."
                                    class="w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm ">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 3a.75.75 0 01.53.22l3.5 3.5a.75.75 0 01-1.06 1.06L10 4.81 7.03 7.78a.75.75 0 01-1.06-1.06l3.5-3.5A.75.75 0 0110 3zm-3.72 9.53a.75.75 0 011.06 0L10 15.19l2.97-2.97a.75.75 0 111.06 1.06l-3.5 3.5a.75.75 0 01-1.06 0l-3.5-3.5a.75.75 0 010-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div x-show="openKeterangan" style="display: none;"
                                    class="absolute z-10 w-full mt-1 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-600 rounded-md shadow-lg max-h-60 overflow-auto">
                                    <div @click="keterangan = 'Mekanik'; openKeterangan = false"
                                        class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700">
                                        M (Mekanik)</div>
                                    <div @click="keterangan = 'Elektrik'; openKeterangan = false"
                                        class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700">
                                        E (Elektrik)</div>
                                    <div @click="keterangan = 'Utility'; openKeterangan = false"
                                        class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700">
                                        U (Utility)</div>
                                    <div @click="keterangan = 'Calibraty'; openKeterangan = false"
                                        class="cursor-pointer px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700">
                                        C (Calibraty)</div>
                                </div>
                            </div>
                            @error('keterangan') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        {{-- Kolom Uraian Kerusakan --}}
                        <div class="flex flex-col">
                            <label for="uraian_kerusakan"
                                class="block text-sm font-medium text-slate-600 dark:text-slate-400">Uraian
                                Kerusakan</label>
                            <textarea wire:model.blur="uraian_kerusakan" id="uraian_kerusakan" rows="6" required
                                placeholder="Jelaskan detail kerusakan..."
                                class="mt-1 block w-full flex-grow rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm @error('uraian_kerusakan') border-red-500 @enderror"></textarea>
                            @error('uraian_kerusakan') <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Kolom Upload Foto --}}
                        <div x-data="{ isUploading: false, progress: 0 }"
                            x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress" class="flex flex-col">
                            <label for="photo"
                                class="block text-sm font-medium text-slate-600 dark:text-slate-400">Upload Foto
                                (Opsional)</label>

                            {{-- Area Pratinjau Foto atau Area Upload --}}
                            <div class="mt-1 flex-grow flex flex-col">
                                @if ($photo)
                                <div
                                    class="flex items-center justify-between bg-slate-100 dark:bg-slate-700 p-2 rounded-lg">
                                    <div class="flex items-center gap-2 truncate">
                                        <svg class="h-5 w-5 text-slate-500 flex-shrink-0"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.122 2.122l7.81-7.81" />
                                        </svg>
                                        <a href="{{ $photo->temporaryUrl() }}" target="_blank"
                                            class="text-sm text-blue-600 dark:text-blue-400 hover:underline truncate"
                                            title="{{ $photo->getClientOriginalName() }}">
                                            {{ $photo->getClientOriginalName() }}
                                        </a>
                                    </div>
                                    <button wire:click="removePhoto" type="button"
                                        class="text-slate-500 hover:text-red-500 p-1 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                @else
                                {{-- Input File --}}
                                <div
                                    class="flex-grow flex justify-center items-center px-6 py-4 border-2 border-slate-300 dark:border-slate-600 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48" aria-hidden="true">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-slate-600 dark:text-slate-400">
                                            <label for="photo-upload"
                                                class="relative cursor-pointer bg-white dark:bg-slate-800 rounded-md font-medium text-blue-600 dark:text-blue-400 hover:text-blue-500 focus-within:outline-none">
                                                <span>Upload a file</span>
                                                <input id="photo-upload" wire:model="photo" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">atau seret dan lepas</p>
                                        </div>
                                        <p class="text-xs text-slate-500 dark:text-slate-500">PNG, JPG, GIF hingga 5MB
                                        </p>
                                    </div>
                                </div>
                                @endif
                            </div>

                            {{-- Progress Bar --}}
                            <div x-show="isUploading"
                                class="w-full bg-slate-200 rounded-full h-2.5 mt-2 dark:bg-slate-700">
                                <div class="bg-blue-600 h-2.5 rounded-full" :style="{ width: progress + '%' }"></div>
                            </div>

                        </div>
                    </div>
                </div>

                <div
                    class="bg-slate-50 dark:bg-slate-800/50 px-5 py-3 flex justify-end items-center space-x-2 rounded-b-lg">
                    <button onclick="location.reload()" type="button" title="Reset"
                        class="p-2 text-slate-500 dark:text-slate-400 hover:text-blue-500 transition-colors duration-200 rounded-full hover:bg-slate-100 dark:hover:bg-slate-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="h-6 w-6">
                            <path
                                d="M19 9H22M19 14H22M19 19H21M16 6L15.1991 18.0129C15.129 19.065 15.0939 19.5911 14.8667 19.99C14.6666 20.3412 14.3648 20.6235 14.0011 20.7998C13.588 21 13.0607 21 12.0062 21H7.99377C6.93927 21 6.41202 21 5.99889 20.7998C5.63517 20.6235 5.33339 20.3412 5.13332 19.99C4.90607 19.5911 4.871 19.065 4.80086 18.0129L4 6M2 6H18M14 6L13.7294 5.18807C13.4671 4.40125 13.3359 4.00784 13.0927 3.71698C12.8779 3.46013 12.6021 3.26132 12.2905 3.13878C11.9376 3 11.523 3 10.6936 3H9.30643C8.47705 3 8.06236 3 7.70951 3.13878C7.39792 3.26132 7.12208 3.46013 6.90729 3.71698C6.66405 4.00784 6.53292 4.40125 6.27064 5.18807L6 6M12 10V17M8 10L7.99995 16.9998"
                                stroke-linecap="round" stroke-linejoin="round" />

                        </svg>
                    </button>
                    <button type="button" wire:click="openConfirmationModal"
                        class="px-3 py-2 text-xs font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700">
                        Lihat & Kirim
                    </button>
                </div>
            </div>

            {{-- Card 2: Tabel Riwayat Laporan--}}
            <div class="p-5 flex flex-wrap gap-4 justify-between items-center">
                <div class="flex items-center gap-2">
                    <h2 class="text-base font-semibold text-slate-900 dark:text-white">Riwayat Laporan Terakhir</h2>
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

                    {{-- Dropdown Kategori --}}

                    <div class="relative inline-block text-left"
                        x-data="{ open: false, selectedCategoryLabel: 'All Categories' }">
                        <button @click="open = !open" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-slate-300 dark:border-slate-600 shadow-sm px-4 py-2 bg-white dark:bg-slate-900/50 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-100 focus:ring-blue-500">
                            <span x-text="selectedCategoryLabel">All Categories</span>
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false"
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-slate-800 ring-1 ring-black ring-opacity-5 z-20">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                    role="menuitem" wire:click="filterReports('', '')"
                                    @click="selectedCategoryLabel = 'All Categories'; $dispatch('reset-availability'); open = false">All
                                    Categories</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                    role="menuitem" wire:click="filterReports('plant', '')"
                                    @click="selectedCategoryLabel = 'Plant'; open = false">Plant</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                    role="menuitem" wire:click="filterReports('status', '')"
                                    @click="selectedCategoryLabel = 'Status'; open = false">Status</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                    role="menuitem" wire:click="filterReports('keterangan', '')"
                                    @click="selectedCategoryLabel = 'Keterangan'; open = false">Keterangan</a>
                            </div>
                        </div>
                    </div>

                    <div class="relative inline-block text-left"
                        x-data="{ open: false, selectedAvailabilityLabel: 'All Availability' }"
                        @reset-availability.window="selectedAvailabilityLabel = 'All Availability'">
                        <button @click="open = !open" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-slate-300 dark:border-slate-600 shadow-sm px-4 py-2 bg-white dark:bg-slate-900/50 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-100 focus:ring-blue-500">
                            <span x-text="selectedAvailabilityLabel">All Availability</span>
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false"
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-slate-800 ring-1 ring-black ring-opacity-5 z-20">
                            <div class="py-1 max-h-60 overflow-y-auto" role="menu" aria-orientation="vertical"
                                aria-labelledby="options-menu">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                    role="menuitem" wire:click="filterReports('', '')"
                                    @click="selectedAvailabilityLabel = 'All Availability'; open = false">
                                    All Availability
                                </a>

                                <template x-if="$wire.filterCategory === 'plant'">
                                    <div>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('plant', 'a')"
                                            @click="selectedAvailabilityLabel = 'A'; open = false">A</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('plant', 'b')"
                                            @click="selectedAvailabilityLabel = 'B'; open = false">B</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('plant', 'c')"
                                            @click="selectedAvailabilityLabel = 'C'; open = false">C</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('plant', 'd')"
                                            @click="selectedAvailabilityLabel = 'D'; open = false">D</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('plant', 'e')"
                                            @click="selectedAvailabilityLabel = 'E'; open = false">E</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('plant', 'ss')"
                                            @click="selectedAvailabilityLabel = 'SS'; open = false">SS</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('plant', 'sc')"
                                            @click="selectedAvailabilityLabel = 'SC'; open = false">SC</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('plant', 'pe')"
                                            @click="selectedAvailabilityLabel = 'PE'; open = false">PE</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('plant', 'qc')"
                                            @click="selectedAvailabilityLabel = 'QC'; open = false">QC</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('plant', 'ga')"
                                            @click="selectedAvailabilityLabel = 'GA'; open = false">GA</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('plant', 'mt')"
                                            @click="selectedAvailabilityLabel = 'MT'; open = false">MT</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('plant', 'fh')"
                                            @click="selectedAvailabilityLabel = 'FH'; open = false">FH</a>
                                    </div>
                                </template>
                                <template x-if="$wire.filterCategory === 'status'">
                                    <div>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('status', 'Pending')"
                                            @click="selectedAvailabilityLabel = 'Pending'; open = false">Pending</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('status', 'Belum Selesai')"
                                            @click="selectedAvailabilityLabel = 'On Progress'; open = false">On
                                            Progress</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('status', 'Selesai')"
                                            @click="selectedAvailabilityLabel = 'Selesai'; open = false">Selesai</a>
                                    </div>
                                </template>
                                <template x-if="$wire.filterCategory === 'keterangan'">
                                    <div>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('keterangan', 'Mekanik')"
                                            @click="selectedAvailabilityLabel = 'Mekanik'; open = false">Mekanik</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('keterangan', 'Elektrik')"
                                            @click="selectedAvailabilityLabel = 'Elektrik'; open = false">Elektrik</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('keterangan', 'Utility')"
                                            @click="selectedAvailabilityLabel = 'Utility'; open = false">Utility</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700"
                                            role="menuitem" wire:click="filterReports('keterangan', 'Calibraty')"
                                            @click="selectedAvailabilityLabel = 'Calibraty'; open = false">Calibraty</a>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    {{-- </button>
                    <div class="relative" x-data="{ open: false }" @click.away="open = false">
                        <button @click="open = !open" type="button" title="Filter status"
                            class="p-2 text-slate-400 hover:text-blue-500 transition-colors duration-200 rounded-full hover:bg-slate-100 dark:hover:bg-slate-700">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21 6H19M21 12H16M21 18H16M7 20V13.5612C7 13.3532 7 13.2492 6.97958 13.1497C6.96147 13.0615 6.93151 12.9761 6.89052 12.8958C6.84431 12.8054 6.77934 12.7242 6.64939 12.5617L3.35061 8.43826C3.22066 8.27583 3.15569 8.19461 3.10948 8.10417C3.06849 8.02393 3.03853 7.93852 3.02042 7.85026C3 7.75078 3 7.64677 3 7.43875V5.6C3 5.03995 3 4.75992 3.10899 4.54601C3.20487 4.35785 3.35785 4.20487 3.54601 4.10899C3.75992 4 4.03995 4 4.6 4H13.4C13.9601 4 14.2401 4 14.454 4.10899C14.6422 4.20487 14.7951 4.35785 14.891 4.54601C15 4.75992 15 5.03995 15 5.6V7.43875C15 7.64677 15 7.75078 14.9796 7.85026C14.9615 7.93852 14.9315 8.02393 14.8905 8.10417C14.8443 8.19461 14.7793 8.27583 14.6494 8.43826L11.3506 12.5617C11.2207 12.7242 11.1557 12.8054 11.1095 12.8958C11.0685 12.9761 11.0385 13.0615 11.0204 13.1497C11 13.2492 11 13.3532 11 13.5612V17L7 20Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition style="display: none;"
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-slate-700 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-20">
                            <div class="py-1">
                                <a wire:click.prevent="filterByStatus('')" href="#"
                                    class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-600">Semua
                                    Status</a>
                                <a wire:click.prevent="filterByStatus('Pending')" href="#"
                                    class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-600">Pending</a>
                                <a wire:click.prevent="filterByStatus('Belum Selesai')" href="#"
                                    class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-600">Belum
                                    Selesai</a>
                                <a wire:click.prevent="filterByStatus('Selesai')" href="#"
                                    class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-600">Selesai</a>
                            </div>
                        </div>
                    </div> --}}

                    {{-- Search Input --}}
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
                    <thead class="bg-slate-50 dark:bg-slate-800/50 sticky top-0">
                        <tr class="text-left">
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300 cursor-pointer hover:bg-slate-100 dark:hover:bg-slate-700"
                                wire:click="sortBy('tanggal_lapor')">
                                <div class="flex items-center">
                                    <span>Tanggal & Pelapor</span>
                                    @if($sortField == 'tanggal_lapor')
                                    <span class="ml-2">@if($sortDirection == 'asc') &uarr; @else &darr;
                                        @endif</span>
                                    @endif
                                </div>
                            </th>
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300 cursor-pointer hover:bg-slate-100 dark:hover:bg-slate-700"
                                wire:click="sortBy('nama_mesin')">
                                <div class="flex items-center">
                                    <span>Mesin & Plant</span>
                                    @if($sortField == 'nama_mesin')
                                    <span class="ml-2">@if($sortDirection == 'asc') &uarr; @else &darr;
                                        @endif</span>
                                    @endif
                                </div>
                            </th>
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300">Uraian Singkat</th>
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300">Keterangan</th>
                            <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300 text-center">Status
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                        @forelse ($semuaLaporan as $laporan)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                            <td class="px-5 py-4 whitespace-nowrap">
                                <p class="font-semibold text-slate-900 dark:text-white">{{ $laporan->nama_pelapor }}
                                </p>
                                <p class="text-slate-500 dark:text-slate-400">
                                    {{ \Carbon\Carbon::parse($laporan->tanggal_lapor)->format('d M Y') }} -
                                    {{ \Carbon\Carbon::parse($laporan->jam_lapor)->format('H:i') }}
                                </p>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <p class="font-semibold text-slate-900 dark:text-white">{{ $laporan->nama_mesin }}
                                </p>
                                <p class="text-slate-500 dark:text-slate-400">Plant {{ $laporan->plant }}</p>
                            </td>
                            <td class="px-5 py-4 max-w-sm truncate text-slate-500 dark:text-slate-400">
                                {{ $laporan->uraian_kerusakan }}
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-slate-500 dark:text-slate-400">
                                {{ $laporan->keterangan }}
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-center">
                                @php $status = optional($laporan->maintenance)->status ?? 'Pending'; @endphp


                                @if($status == 'Pending')
                                <span
                                    class="inline-flex items-center justify-center rounded-full bg-amber-100 px-2.5 py-0.5 text-amber-700 dark:bg-amber-900/50 dark:text-amber-400">
                                    <p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p>
                                </span>

                                @elseif($status == 'On Progress')
                                <span class="inline-flex items-center justify-center rounded-full bg-sky-100 px-2.5 py-0.5 text-sky-700 dark:bg-sky-900/50 dark:text-sky-400">
                                    <p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p>
                                </span>

                                @elseif($status == 'Dalam Proses' || $status == 'Belum Selesai')
                                <span
                                    class="inline-flex items-center justify-center rounded-full bg-red-100 px-2.5 py-0.5 text-red-700 dark:bg-red-900/50 dark:text-red-400">
                                    <p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p>
                                </span>

                                @elseif($status == 'Selesai')
                                <span
                                    class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-400">
                                    <p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p>
                                </span>

                                @else
                                <span
                                    class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-400">
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
            {{-- Tautan Paginasi --}}
            <div class="p-5 border-t border-slate-200 dark:border-slate-700">
                {{ $semuaLaporan->links() }}
            </div>
            @script
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
            </script>
            @endscript
        </div>
    </div>



    {{-- Pop-up (Modal) untuk Konfirmasi --}}
    @if($isModalOpen)
    <div x-data="{ show: @entangle('isModalOpen') }" x-show="show" x-on:keydown.escape.window="show = false"
        class="fixed inset-0 z-50 flex items-center justify-center" style="display: none;">
        <div x-show="show" x-transition.opacity class="fixed inset-0 bg-black/50 backdrop-blur-sm"
            wire:click="closeModal"></div>

        <div x-show="show" x-transition
            class="relative w-full max-w-lg m-8 bg-white dark:bg-slate-800 rounded-lg shadow-xl border border-slate-200 dark:border-slate-700">
            <form wire:submit.prevent="save">
                <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                        Konfirmasi Data Laporan
                    </h3>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Pastikan semua data sudah benar
                        sebelum
                        dikirim.</p>
                </div>

                <div class="p-6 space-y-2 text-sm max-h-96 overflow-y-auto">
                    <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                        <span class="font-medium text-slate-500 dark:text-slate-400">Tanggal & Jam</span>
                        <span
                            class="font-semibold text-slate-700 dark:text-slate-200 text-right">{{ $tanggal_lapor ?? '___' }}
                            & {{ $jam_lapor ?? '___' }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                        <span class="font-medium text-slate-500 dark:text-slate-400">Shift</span>
                        <span class="font-semibold text-slate-700 dark:text-slate-200">{{ $shift ?? '___' }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                        <span class="font-medium text-slate-500 dark:text-slate-400">Pelapor</span>
                        <span
                            class="font-semibold text-slate-700 dark:text-slate-200">{{ $nama_pelapor ?? '___' }}</span>
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
                        <span
                            class="font-semibold text-slate-700 dark:text-slate-200">{{ $bagian_rusak ?? '___' }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700">
                        <span class="font-medium text-slate-500 dark:text-slate-400">Keterangan</span>
                        <span class="font-semibold text-slate-700 dark:text-slate-200">{{ $keterangan ?? '___' }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-slate-500 dark:text-slate-400">Uraian Kerusakan</span>
                        <p class="mt-1 font-semibold text-slate-700 dark:text-slate-200">
                            {{ $uraian_kerusakan ?? '___' }}
                        </p>
                    </div>
                </div>

                <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 flex justify-end items-center space-x-3">
                    <button type="button" wire:click="closeModal"
                        class="px-4 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-300 rounded-md shadow-sm hover:bg-slate-50">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700">
                        <span wire:loading.remove wire:target="save">Ya, Kirim Laporan</span>
                        <span wire:loading wire:target="save">Mengirim...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
    {{-- In any blade file --}}

</div>
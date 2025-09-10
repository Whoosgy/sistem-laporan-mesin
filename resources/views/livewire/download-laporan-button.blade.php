<div class="relative" wire:click.away="closeDropdown">
    <button wire:click="toggleDropdown" type="button"
        class="inline-flex items-center gap-x-2 rounded-md 
                   bg-gradient-to-r from-blue-600 to-teal-500 
                   dark:from-blue-500 dark:to-teal-300 
                   px-4 py-2.5 text-sm font-semibold text-white shadow-lg 
                   hover:from-blue-700 hover:to-teal-600 
                   dark:hover:from-blue-600 dark:hover:to-teal-400
                   focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 
                   focus-visible:outline-blue-500 
                   transition-all duration-300 ease-out
                   transform active:scale-95 active:shadow-md
                   hover:shadow-xl hover:-translate-y-0.5">
        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 h-5 w-5 transition-transform duration-200 active:scale-110" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
        </svg>
        Download Laporan
    </button>

    @if($isOpen)
    <div
        class="absolute right-0 z-10 mt-2 w-72 origin-top-right rounded-md bg-white dark:bg-slate-700 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
        <div class="p-2 space-y-2 border-b border-slate-200 dark:border-slate-600">
            <div>
                <label for="startDate" class="block text-xs font-medium text-slate-600 dark:text-slate-300">Tanggal Mulai</label>
                <input wire:model.live="startDate" type="date" id="startDate" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-800 dark:border-slate-600  dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
            </div>
            <div>
                <label for="endDate" class="block text-xs font-medium text-slate-600 dark:text-slate-300">Tanggal Selesai</label>
                <input wire:model.live="endDate" type="date" id="endDate" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-800 dark:border-slate-600  dark:text-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
            </div>
        </div>
        <div class="py-1">
            <a href="{{ route('export.excel', ['start' => $startDate, 'end' => $endDate]) }}"
                class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-600 @if(!$startDate || !$endDate) opacity-50 pointer-events-none @endif">
                Download Excel (.xlsx)
            </a>
            <a href="{{ route('export.csv', ['start' => $startDate, 'end' => $endDate]) }}"
                class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-600 @if(!$startDate || !$endDate) opacity-50 pointer-events-none @endif">
                Download CSV (.csv)
            </a>
        </div>
    </div>
    @endif
</div>
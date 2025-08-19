<x-layouts.app>
    {{-- Menetapkan judul khusus untuk halaman ini --}}
    @section('title', 'Home - Sistem Laporan Mesin')

    {{-- PERBAIKAN: Div utama yang memaksa semua isinya berada di tengah layar --}}
    <div class="min-h-[calc(100vh-4rem)] flex items-center justify-center p-6">
        
        {{-- Satu kontainer untuk semua konten (judul dan kartu) --}}
        <div class="text-center">

            {{-- Bagian header --}}
            <div class="mb-16">
                <h1 class="text-3xl lg:text-3xl font-bold text-slate-600 dark:text-white tracking-tight mb-4">
                    Sistem Laporan Kerusakan Mesin
                </h1>
                <p class="text-xl text-slate-600 dark:text-slate-400 max-w-3xl mx-auto leading-relaxed">
                    Selamat datang! Silakan pilih salah satu opsi di bawah ini untuk melanjutkan.
                </p>
            </div>

            {{-- Kontainer untuk kartu --}}
            <div class="flex flex-col sm:flex-row justify-center items-stretch gap-8 lg:gap-12">

                {{-- Card 1: Buat Laporan Baru --}}
                <a href="{{ route('produksi.create') }}" 
                   class="group block bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 
                          rounded-2xl p-8 w-full max-w-sm
                          transform transition-all duration-300 ease-in-out
                          shadow-xl hover:shadow-2xl hover:border-blue-500 
                          hover:-translate-y-2 focus:outline-none focus:ring-0">
                    
                    <div class="flex justify-center mb-4">
                        <div class="p-4 bg-blue-50 dark:bg-blue-900/30 rounded-2xl group-hover:bg-blue-100 dark:group-hover:bg-blue-900/50 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                    </div>
                    
                    <h2 class="text-2xl font-semibold text-slate-900 dark:text-white mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300">
                        Buat Laporan Baru
                    </h2>
                    <p class="text-base text-slate-600 dark:text-slate-400 leading-relaxed px-2">
                        Laporkan kerusakan atau masalah baru yang ditemukan pada mesin produksi.
                    </p>
                </a>

                {{-- Card 2: Lihat Status Laporan --}}
                <a href="{{ route('maintenance.dashboard') }}"
                   class="group block bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 
                          rounded-2xl p-8 w-full max-w-sm
                          transform transition-all duration-300 ease-in-out
                          shadow-xl hover:shadow-2xl hover:border-teal-500 
                          hover:-translate-y-2 focus:outline-none focus:ring-0">
                    
                    <div class="flex justify-center mb-4">
                        <div class="p-4 bg-teal-50 dark:bg-teal-900/30 rounded-2xl group-hover:bg-teal-100 dark:group-hover:bg-teal-900/50 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                    </div>
                    
                    <h2 class="text-2xl font-semibold text-slate-900 dark:text-white mb-3 group-hover:text-teal-600 dark:group-hover:text-teal-400 transition-colors duration-300">
                        Lihat Status Laporan
                    </h2>
                    <p class="text-base text-slate-600 dark:text-slate-400 leading-relaxed px-2">
                        Lacak dan perbarui status semua laporan kerusakan yang sudah dibuat.
                    </p>
                </a>

            </div>
        </div>
    </div>
</x-layouts.app>
<x-layouts.app>
    {{-- Menetapkan judul khusus untuk halaman ini --}}
    @section('title', 'Home - Sistem Laporan Mesin')

    <div class="min-h-[calc(100vh-4rem)] flex items-center justify-center p-6">

        {{-- Kontainer utama untuk mengontrol lebar dan tata letak --}}
        <div class="w-full max-w-5xl mx-auto">

            {{-- Bagian header --}}
            <div class="text-center mb-16">

                <h1 class="text-5xl lg:text-5xl font-bold tracking-tight mb-4 
                           bg-gradient-to-r from-blue-600 to-teal-500 
                           dark:from-blue-500 dark:to-teal-300 
                           bg-clip-text text-transparent">
                    Work Of Maintenance
                </h1>

                <p class="text-lg text-slate-600 dark:text-slate-400 max-w-3xl mx-auto leading-relaxed">
                    Lihat ringkasan laporan kerusakan mesin.
                </p>
            </div>

            {{-- Bagian Count Cards --}}
            <div class="mt-12">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    {{-- Card Pending --}}

                    <a class="group block text-center bg-white/70 dark:bg-slate-800/70 backdrop-blur-sm border border-slate-200 dark:border-slate-700 rounded-2xl p-6 transform transition-all duration-300 ease-in-out shadow-lg hover:shadow-2xl hover:-translate-y-2 hover:border-amber-500">
                        <div class="flex justify-center mb-4">
                            <div class="p-3 bg-amber-100 dark:bg-amber-900/50 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-xl font-semibold text-slate-500 dark:text-slate-400 mb-4">Pending</p>
                        <p class="text-7xl font-bold text-amber-500">{{ $pendingCount }}</p>
                        <p class="text-base text-slate-400 mt-4">Laporan</p>
                    </a>

                    {{-- Card Belum Selesai --}}
                    <a class="group block text-center bg-white/70 dark:bg-slate-800/70 backdrop-blur-sm border border-slate-200 dark:border-slate-700 rounded-2xl p-6 transform transition-all duration-300 ease-in-out shadow-lg hover:shadow-2xl hover:-translate-y-2 hover:border-red-500">
                        <div class="flex justify-center mb-4">
                            <div class="p-3 bg-red-100 dark:bg-red-900/50 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-xl font-semibold text-slate-500 dark:text-slate-400 mb-4">Belum Selesai</p>
                        <p class="text-7xl font-bold text-red-500">{{ $belumSelesaiCount }}</p>
                        <p class="text-base text-slate-400 mt-4">Laporan</p>
                    </a>

                    {{-- Card Selesai --}}
                    <a class="group block text-center bg-white/70 dark:bg-slate-800/70 backdrop-blur-sm border border-slate-200 dark:border-slate-700 rounded-2xl p-6 transform transition-all duration-300 ease-in-out shadow-lg hover:shadow-2xl hover:-translate-y-2 hover:border-emerald-500">
                        <div class="flex justify-center mb-4">
                            <div class="p-3 bg-emerald-100 dark:bg-emerald-900/50 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-xl font-semibold text-slate-500 dark:text-slate-400 mb-4">Selesai</p>
                        <p class="text-7xl font-bold text-emerald-500">{{ $selesaiCount }}</p>
                        <p class="text-base text-slate-400 mt-4">Laporan</p>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>
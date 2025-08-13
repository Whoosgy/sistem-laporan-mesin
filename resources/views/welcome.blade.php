<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistem Laporan Mesin</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
{{-- Latar belakang gradient yang diperbarui dengan warna biru terang --}}
<div class="relative min-h-screen bg-gradient-to-br from-jembo-blue via-indigo-700 to-gray-900 flex flex-col items-center justify-center p-6 overflow-hidden">

        <div class="relative z-10 text-center mb-12">
            <h1 class="text-4xl lg:text-6xl font-bold text-white tracking-tight">Sistem Laporan Mesin</h1>
            <p class="text-lg text-gray-400 mt-2">PT Jembo Cable Company Tbk</p>
        </div>

        <div class="relative z-10 w-full max-w-4xl lg:max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">

                {{-- Card Produksi --}}
                <a href="{{ route('produksi.create') }}" class="group flex flex-col items-center justify-center p-8 bg-white/5 backdrop-blur-xl border border-white/20 rounded-2xl shadow-lg transform hover:-translate-y-2 transition-all duration-300 min-h-[300px] lg:min-h-[350px] text-center">
                    <div class="mb-6">
                        <h2 class="text-3xl xl:text-4xl font-bold text-white">
                            Laporan Produksi
                        </h2>
                        <p class="mt-2 text-gray-300 text-base">
                            Buat laporan pengaduan kerusakan mesin.
                        </p>
                    </div>
                    <div>
                        <span class="inline-block px-8 py-3 bg-jembo-yellow text-jembo-blue font-bold rounded-lg group-hover:bg-white transition-colors duration-300">
                            Klik untuk Masuk
                        </span>
                    </div>
                </a>

                {{-- Card Maintenance --}}
                <a href="{{ route('maintenance.dashboard') }}" class="group flex flex-col items-center justify-center p-8 bg-white/5 backdrop-blur-xl border border-white/20 rounded-2xl shadow-lg transform hover:-translate-y-2 transition-all duration-300 min-h-[300px] lg:min-h-[350px] text-center">
                    <div class="mb-6">
                        <h2 class="text-3xl xl:text-4xl font-bold text-white">
                            Laporan Maintenance
                        </h2>
                        <p class="mt-2 text-gray-300 text-base">
                            Lihat dasbor laporan perbaikan.
                        </p>
                    </div>
                    <div>
                        <span class="inline-block px-8 py-3 bg-jembo-orange text-white font-bold rounded-lg group-hover:bg-white group-hover:text-jembo-blue transition-colors duration-300">
                            Lihat Dasbor
                        </span>
                    </div>
                </a>

            </div>
        </div>
    </div>
</body>
</html>
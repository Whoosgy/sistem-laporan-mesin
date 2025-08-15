{{-- Memberitahu file ini untuk menggunakan bingkai dari layouts.app --}}
@extends('layouts.app')

{{-- Menetapkan judul khusus untuk halaman ini (opsional) --}}
@section('title', 'Beranda - Sistem Laporan Mesin')

{{-- Semua konten di bawah ini akan dimasukkan ke dalam @yield('content') di bingkai --}}
@section('content')
<div class="container mx-auto px-4 py-8 lg:py-12">

    <div class="text-center mb-12">
        <h1 class="text-4xl lg:text-5xl font-bold text-slate-800 dark:text-white tracking-tight">Sistem Laporan Mesin</h1>
        <p class="text-lg text-slate-500 dark:text-slate-400 mt-2">Pilih menu untuk melanjutkan</p>
    </div>

    <div class="w-full max-w-4xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- Card Produksi --}}
            <a href="{{ route('produksi.create') }}" class="group block p-8 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl shadow-sm hover:shadow-lg hover:border-blue-500 transition-all duration-300">
                <div class="flex items-start justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white">
                            Laporan Produksi
                        </h2>
                        <p class="mt-2 text-slate-500 dark:text-slate-400">
                            Buat laporan kerusakan mesin baru.
                        </p>
                    </div>
                    <div class="text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </div>
                </div>
            </a>

            {{-- Card Maintenance --}}
            <a href="{{ route('maintenance.dashboard') }}" class="group block p-8 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl shadow-sm hover:shadow-lg hover:border-blue-500 transition-all duration-300">
                <div class="flex items-start justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white">
                            Dasbor Maintenance
                        </h2>
                        <p class="mt-2 text-slate-500 dark:text-slate-400">
                            Lihat dan perbarui status semua laporan.
                        </p>
                    </div>
                    <div class="text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </div>
                </div>
            </a>

        </div>
    </div>
</div>
@endsection
{{-- Memberitahu file ini untuk menggunakan bingkai dari layouts.app --}}
@extends('layouts.app')

{{-- Menetapkan judul khusus untuk halaman ini --}}
@section('title', 'Dasbor Maintenance')

{{-- Semua konten di bawah ini akan dimasukkan ke dalam @yield('content') di bingkai --}}
@section('content')
<div class="container mx-auto px-4 py-8">

    {{-- Header Halaman --}}
    <header class="mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-800 dark:text-white">Dasbor Maintenance</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1">Ringkasan laporan kerusakan mesin secara real-time.</p>
        </div>
    </header>

    {{-- 3 Card Status dengan Desain Baru dan Transisi --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        {{-- Card Pending --}}
        <div class="p-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg transform hover:-translate-y-1 transition-transform duration-300">
            <div class="flex justify-between items-start">
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Pending</p>
                <span class="rounded-full bg-amber-100 dark:bg-amber-900/50 px-2.5 py-0.5 text-xs font-semibold text-amber-600 dark:text-amber-400">BARU</span>
            </div>
            <p class="mt-2 text-3xl font-bold text-slate-900 dark:text-white">{{ $pendingCount }}</p>
        </div>
        {{-- Card Dalam Proses --}}
        <div class="p-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg transform hover:-translate-y-1 transition-transform duration-300">
            <div class="flex justify-between items-start">
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Dalam Proses</p>
                <span class="rounded-full bg-sky-100 dark:bg-sky-900/50 px-2.5 py-0.5 text-xs font-semibold text-sky-600 dark:text-sky-400">AKTIF</span>
            </div>
            <p class="mt-2 text-3xl font-bold text-slate-900 dark:text-white">{{ $prosesCount }}</p>
        </div>
        {{-- Card Selesai --}}
        <div class="p-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg transform hover:-translate-y-1 transition-transform duration-300">
            <div class="flex justify-between items-start">
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Selesai</p>
                <span class="rounded-full bg-emerald-100 dark:bg-emerald-900/50 px-2.5 py-0.5 text-xs font-semibold text-emerald-600 dark:text-emerald-400">SELESAI</span>
            </div>
            <p class="mt-2 text-3xl font-bold text-slate-900 dark:text-white">{{ $selesaiCount }}</p>
        </div>
    </div>

    {{-- Tabel Daftar Laporan dengan Desain Baru --}}
    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="p-5">
            <h2 class="text-base font-semibold text-slate-900 dark:text-white">Daftar Laporan Masuk</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-50 dark:bg-slate-800/50">
                    <tr class="text-left">
                        <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300">Tanggal & Pelapor</th>
                        <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300">Mesin & Plant</th>
                        <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300">Jenis Perbaikan</th>
                        <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300 text-center">Status</th>
                        <th class="px-5 py-3 font-medium text-slate-600 dark:text-slate-300 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @forelse ($semuaLaporan as $laporan)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                        <td class="px-5 py-4 whitespace-nowrap">
                            <p class="font-semibold text-slate-900 dark:text-white">{{ $laporan->nama_pelapor }}</p>
                            <p class="text-slate-500 dark:text-slate-400">{{ \Carbon\Carbon::parse($laporan->tanggal_lapor)->format('d M Y') }} - {{ \Carbon\Carbon::parse($laporan->jam_lapor)->format('H:i') }}</p>
                        </td>
                        <td class="px-5 py-4 whitespace-nowrap">
                            <p class="font-semibold text-slate-900 dark:text-white">{{ $laporan->nama_mesin }}</p>
                            <p class="text-slate-500 dark:text-slate-400">Plant {{ $laporan->plant }}</p>
                        </td>
                        <td class="px-5 py-4 whitespace-nowrap text-slate-500 dark:text-slate-400">
                            {{ optional($laporan->maintenance)->jenis_perbaikan ?? 'Belum Ditentukan' }}
                        </td>
                        <td class="px-5 py-4 whitespace-nowrap text-center">
                            @php
                                $status = optional($laporan->maintenance)->status ?? 'Pending';
                            @endphp

                            @if($status == 'Pending')
                                <span class="inline-flex items-center justify-center rounded-full bg-amber-100 px-2.5 py-0.5 text-amber-700 dark:bg-amber-900/50 dark:text-amber-400">
                                    <p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p>
                                </span>
                            @elseif($status == 'Dalam Proses')
                                <span class="inline-flex items-center justify-center rounded-full bg-sky-100 px-2.5 py-0.5 text-sky-700 dark:bg-sky-900/50 dark:text-sky-400">
                                    <p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p>
                                </span>
                            @else
                                <span class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-400">
                                    <p class="whitespace-nowrap text-xs font-semibold">{{ $status }}</p>
                                </span>
                            @endif
                        </td>
                        <td class="px-5 py-4 whitespace-nowrap text-center space-x-2">
                            <a href="#" class="font-medium text-slate-600 hover:text-blue-600 dark:text-slate-400 dark:hover:text-blue-500">View</a>
                            <a href="#" class="font-medium text-slate-600 hover:text-blue-600 dark:text-slate-400 dark:hover:text-blue-500">Update</a>
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
    </div>
</div>
@endsection
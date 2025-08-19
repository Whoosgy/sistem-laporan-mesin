{{-- File: resources/views/maintenance/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detail Laporan Kerusakan')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
        {{-- Header --}}
        <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
            <div>
                <h2 class="text-xl font-bold text-slate-800 dark:text-white">Detail Laporan #{{ $laporan->id }}</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">Dibuat oleh {{ $laporan->nama_pelapor }} pada {{ $laporan->created_at->format('d M Y, H:i') }}</p>
            </div>
            <a href="{{ route('maintenance.dashboard') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800">&larr; Kembali ke Dasbor</a>
        </div>
        
        {{-- Isi Detail --}}
        <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
            {{-- Kolom Detail Laporan --}}
            <div class="space-y-4">
                <h3 class="font-semibold text-slate-900 dark:text-white border-b pb-2">Info Laporan</h3>
                <div class="flex justify-between"><span class="text-slate-500">Tanggal Lapor:</span> <strong class="text-slate-700 dark:text-slate-200">{{ \Carbon\Carbon::parse($laporan->tanggal_lapor)->format('d M Y') }}</strong></div>
                <div class="flex justify-between"><span class="text-slate-500">Jam Lapor:</span> <strong class="text-slate-700 dark:text-slate-200">{{ \Carbon\Carbon::parse($laporan->jam_lapor)->format('H:i') }}</strong></div>
                <div class="flex justify-between"><span class="text-slate-500">Shift:</span> <strong class="text-slate-700 dark:text-slate-200">{{ $laporan->shift }}</strong></div>
                <div class="flex justify-between"><span class="text-slate-500">Plant:</span> <strong class="text-slate-700 dark:text-slate-200">{{ $laporan->plant }}</strong></div>
                <div class="flex justify-between"><span class="text-slate-500">Nama Mesin:</span> <strong class="text-slate-700 dark:text-slate-200">{{ $laporan->nama_mesin }}</strong></div>
                <div class="flex justify-between"><span class="text-slate-500">Bagian Rusak:</span> <strong class="text-slate-700 dark:text-slate-200">{{ $laporan->bagian_rusak ?? '-' }}</strong></div>
                <div>
                    <span class="text-slate-500">Uraian Kerusakan:</span>
                    <p class="mt-1 p-2 rounded bg-slate-50 dark:bg-slate-700/50 text-slate-700 dark:text-slate-200">{{ $laporan->uraian_kerusakan }}</p>
                </div>
            </div>
            {{-- Kolom Detail Maintenance --}}
            <div class="space-y-4">
                <h3 class="font-semibold text-slate-900 dark:text-white border-b pb-2">Info Maintenance</h3>
                <div class="flex justify-between"><span class="text-slate-500">Status:</span> <strong class="text-slate-700 dark:text-slate-200">{{ optional($laporan->maintenance)->status ?? 'Belum Selesai' }}</strong></div>
                <div class="flex justify-between"><span class="text-slate-500">Jenis Perbaikan:</span> <strong class="text-slate-700 dark:text-slate-200">{{ optional($laporan->maintenance)->jenis_perbaikan ?? '-' }}</strong></div>
                <div class="flex justify-between"><span class="text-slate-500">Teknisi:</span> <strong class="text-slate-700 dark:text-slate-200">{{ optional($laporan->maintenance)->nama_teknisi ?? '-' }}</strong></div>
                <div>
                    <span class="text-slate-500">Analisa Kerusakan:</span>
                    <p class="mt-1 p-2 rounded bg-slate-50 dark:bg-slate-700/50 text-slate-700 dark:text-slate-200">{{ optional($laporan->maintenance)->analisa_kerusakan ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
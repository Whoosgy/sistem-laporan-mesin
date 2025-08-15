{{-- File: resources/views/maintenance/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Update Laporan Kerusakan')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <form action="{{ route('maintenance.update', $laporan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-slate-800 dark:text-white">Update Laporan #{{ $laporan->id }}</h2>
                    <a href="{{ route('maintenance.dashboard') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-400">&larr; Batal</a>
                </div>
                
                <div class="p-5 space-y-6">
                    {{-- Bagian Read-only (Info Laporan Awal) --}}
                    <div class="p-4 rounded-md bg-slate-50 dark:bg-slate-700/50 border dark:border-slate-600">
                        <p class="text-sm"><strong class="text-slate-500">Pelapor:</strong> {{ $laporan->nama_pelapor }}</p>
                        <p class="text-sm"><strong class="text-slate-500">Mesin:</strong> {{ $laporan->nama_mesin }} (Plant {{ $laporan->plant }})</p>
                        <p class="text-sm mt-2"><strong class="text-slate-500">Kerusakan:</strong> {{ $laporan->uraian_kerusakan }}</p>
                    </div>

                    {{-- File: resources/views/maintenance/edit.blade.php --}}

{{-- Bagian Form Edit --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label for="status" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Status Perbaikan</label>
        <select id="status" name="status" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm text-sm @error('status') border-red-500 @enderror">
            <option value="Pending" @selected(old('status', optional($laporan->maintenance)->status) == 'Pending' || is_null(optional($laporan->maintenance)->status))>Belum Dikerjakan (Pending)</option>
            <option value="Dalam Proses" @selected(old('status', optional($laporan->maintenance)->status) == 'Dalam Proses')>Dalam Proses</option>
            <option value="Selesai" @selected(old('status', optional($laporan->maintenance)->status) == 'Selesai')>Selesai</option>
        </select>
        @error('status')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="nama_teknisi" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Nama Teknisi</label>
        <input type="text" id="nama_teknisi" name="nama_teknisi" value="{{ old('nama_teknisi', optional($laporan->maintenance)->nama_teknisi) }}" placeholder="Nama yang memperbaiki" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm text-sm @error('nama_teknisi') border-red-500 @enderror">
        @error('nama_teknisi')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>
<div>
    <label for="jenis_perbaikan" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Jenis Perbaikan</label>
    <input type="text" id="jenis_perbaikan" name="jenis_perbaikan" value="{{ old('jenis_perbaikan', optional($laporan->maintenance)->jenis_perbaikan) }}" placeholder="Contoh: Ganti Bearing, Perbaikan Listrik" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm text-sm @error('jenis_perbaikan') border-red-500 @enderror">
    @error('jenis_perbaikan')
        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>
<div>
    <label for="waktu_perbaikan" class="block text-sm font-medium text-slate-600 dark:text-slate-400">Waktu Perbaikan</label>
    <input type="text" id="waktu_perbaikan" name="waktu_perbaikan" value="{{ old('waktu_perbaikan', optional($laporan->maintenance)->waktu_perbaikan) }}" placeholder="Contoh: 2 jam 30 menit" class="mt-1 block w-full rounded-md border-slate-300 dark:bg-slate-900/50 dark:border-slate-600 shadow-sm text-sm @error('waktu_perbaikan') border-red-500 @enderror">
    @error('waktu_perbaikan')
        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>
                </div>

                {{-- Footer dengan tombol Simpan --}}
                <div class="p-5 bg-slate-50 dark:bg-slate-800/50 flex justify-end rounded-b-lg">
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
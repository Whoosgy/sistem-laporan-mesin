{{-- File: resources/views/produksi/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Buat Laporan Produksi')

@section('content')
    <div class="container mx-auto px-4 py-8">
        {{-- Memanggil komponen Livewire yang berisi form dan tabel --}}
        @livewire('laporan-produksi-form')
    </div>
@endsection
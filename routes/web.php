<?php

use Illuminate\Support\Facades\Route;

// Impor Controller dan Komponen Livewire yang kita butuhkan
use App\Http\Controllers\PageController;
use App\Livewire\MaintenanceDashboard;

// Rute untuk Halaman Utama
Route::get('/', [PageController::class, 'home'])->name('home');

// Rute untuk Halaman Form Produksi
Route::get('/produksi/create', [PageController::class, 'createProduksi'])->name('produksi.create');

// Rute untuk Dasbor Maintenance
// Langsung memanggil komponen Livewire sebagai halaman penuh.
Route::get('/maintenance', MaintenanceDashboard::class)->name('maintenance.dashboard');
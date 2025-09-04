<?php

use App\Livewire\Maintenance\UpdateLaporan;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PageController;
use App\Livewire\MaintenanceDashboard;
use App\Http\Controllers\LaporanController; 

// Rute untuk Halaman Utama
Route::get('/', [PageController::class, 'home'])->name('home');

// Rute untuk Halaman Form Produksi
Route::get('/produksi/create', [PageController::class, 'createProduksi'])->name('produksi.create');

// Rute untuk Dasbor Maintenance
Route::get('/maintenance/{keterangan?}', MaintenanceDashboard::class)->name('maintenance.dashboard');

// Rute untuk Ekspor Data Laporan Maintenance
Route::get('/export/excel', [PageController::class, 'exportExcel'])->name('export.excel');
Route::get('/export/csv', [PageController::class, 'exportCsv'])->name('export.csv');

Route::get('/maintenance/laporan/{id}/edit', UpdateLaporan::class)->name('maintenance.edit');


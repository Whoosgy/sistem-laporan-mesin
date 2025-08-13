<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MaintenanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute untuk halaman utama dengan dua pilihan box
Route::get('/', [PageController::class, 'home'])->name('home');

// Rute untuk menampilkan form produksi
Route::get('/produksi/create', [PageController::class, 'createProduksi'])->name('produksi.create');

// Rute untuk Menerima dan Menyimpan data dari form produksi
Route::post('/produksi', [PageController::class, 'storeProduksi'])->name('produksi.store');

// Rute untuk dasbor maintenance
Route::get('/maintenance', [MaintenanceController::class, 'index'])->name('maintenance.dashboard');
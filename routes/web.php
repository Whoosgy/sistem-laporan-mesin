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

// Rute untuk halaman utama ("/")
// Diberi nama 'home'
Route::get('/', [PageController::class, 'home'])->name('home');

// Rute untuk menampilkan form produksi ("/produksi/create")
// Diberi nama 'produksi.create'
Route::get('/produksi/create', [PageController::class, 'createProduksi'])->name('produksi.create');

// Rute untuk MENYIMPAN data dari form produksi ("/produksi")
// Diberi nama 'produksi.store'
Route::post('/produksi', [PageController::class, 'storeProduksi'])->name('produksi.store');

// Rute untuk dasbor maintenance ("/maintenance")
// Diberi nama 'maintenance.dashboard'
Route::get('/maintenance', [MaintenanceController::class, 'index'])->name('maintenance.dashboard');
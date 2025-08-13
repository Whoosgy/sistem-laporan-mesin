<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MaintenanceController extends Controller
{
    /**
     * Menampilkan halaman dasbor maintenance dengan statistik dan daftar laporan.
     */
    public function index(): View
    {
        // Ambil semua laporan produksi, urutkan dari yang terbaru.
        $laporanProduksi = Produksi::with('maintenance')->latest('tanggal_lapor')->get();

        // Hitung statistik
        $pendingCount = $laporanProduksi->where('maintenance', null)->count();
        $selesaiCount = Maintenance::where('status', 'Selesai')->count();
        $prosesCount = Maintenance::where('status', 'Dalam Proses')->count();


        return view('maintenance.dashboard', [
            'pendingCount' => $pendingCount,
            'prosesCount' => $prosesCount,
            'selesaiCount' => $selesaiCount,
            'semuaLaporan' => $laporanProduksi
        ]);
    }
}
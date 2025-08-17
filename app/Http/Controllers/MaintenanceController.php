<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class MaintenanceController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search', '');
        $sortField = $request->input('sortField', 'created_at');
        $sortDirection = $request->input('sortDirection', 'desc');
        $laporanProduksi = Produksi::with('maintenance')->latest('tanggal_lapor')->paginate(10);

        // Query dasar untuk mengambil data
        $query = Produksi::with('maintenance');

        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('nama_mesin', 'like', '%' . $search . '%')
                  ->orWhere('nama_pelapor', 'like', '%' . $search . '%')
                  ->orWhere('plant', 'like', '%' . $search . '%')
                  ->orWhere('keterangan', 'like', '%' . $search . '%')
                  ->orWhere('uraian_kerusakan', 'like', '%' . $search . '%');
            });
        }
        
        // Terapkan pengurutan
        $laporanProduksi = $query->orderBy($sortField, $sortDirection)->paginate(10);

        // Hitung statistik
        $pendingCount = Produksi::whereDoesntHave('maintenance')->count();
        $selesaiCount = Maintenance::where('status', 'Selesai')->count();
        $prosesCount = Maintenance::where('status', 'Dalam Proses')->count();

        // Kirim semua data ke view
        return view('maintenance.dashboard', [
            'pendingCount' => $pendingCount,
            'prosesCount' => $prosesCount,
            'selesaiCount' => $selesaiCount,
            'semuaLaporan' => $laporanProduksi,
            'search' => $search,
            'sortField' => $sortField,
            'sortDirection' => $sortDirection
        ]);
    }
}
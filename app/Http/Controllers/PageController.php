<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Produksi;
use App\Models\Maintenance;
use App\Exports\LaporanMaintenanceExport;
use Maatwebsite\Excel\Facades\Excel;

class PageController extends Controller
{
    /**
     * Menampilkan halaman utama (welcome) dengan data statistik.
     */
    public function home()
    {
        // Menghitung jumlah laporan untuk kartu status
        $pendingCount = Produksi::whereDoesntHave('maintenance')->orWhereHas('maintenance', function ($query) {
            $query->where('status', 'Pending');
        })->count();
        
        $belumSelesaiCount = Maintenance::where('status', 'Belum Selesai')->count();
        
        $selesaiCount = Maintenance::where('status', 'Selesai')->count();

        // Kirim data ke view
        return view('welcome', [
            'pendingCount' => $pendingCount,
            'belumSelesaiCount' => $belumSelesaiCount,
            'selesaiCount' => $selesaiCount,
        ]);
    }

    /**
     * Menampilkan form input produksi.
     */
    public function createProduksi(): View
    {
        return view('produksi.create');
    }

    /**
     * Menyimpan data laporan produksi baru ke database.
     */
    public function storeProduksi(Request $request)
    {
        // 1. Validasi data yang masuk dari form
        $validatedData = $request->validate([
            'tanggal_lapor' => 'required|date',
            'jam_lapor' => 'required',
            'shift' => 'required|string|max:20',
            'nama_mesin' => 'required|string|max:255',
            'plant' => 'nullable|string|max:100',
            'nama_pelapor' => 'required|string|max:255',
            'bagian_rusak' => 'nullable|string|max:255',
            'uraian_kerusakan' => 'required|string',
            'keterangan' => 'required|string|max:20',
        ]);

        // 2. Simpan data yang sudah divalidasi ke dalam tabel 'produksi'
        Produksi::create($validatedData);

        // 3. Kembalikan pengguna ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }

   /**
     * Memicu unduhan file Excel.
     */
    public function exportExcel(Request $request)
    {
        // Mengambil tanggal dari URL
        $startDate = $request->query('start');
        $endDate = $request->query('end');

        return Excel::download(new LaporanMaintenanceExport($startDate, $endDate), 'laporan-maintenance.xlsx');
    }

    /**
     * Memicu unduhan file CSV.
     */
    public function exportCsv(Request $request)
    {
        // Mengambil tanggal dari URL
        $startDate = $request->query('start');
        $endDate = $request->query('end');
        
        return Excel::download(new LaporanMaintenanceExport($startDate, $endDate), 'laporan-maintenance.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}
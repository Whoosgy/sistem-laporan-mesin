<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Produksi; 

class PageController extends Controller
{
    /**
     * Menampilkan halaman utama.
     */
    public function home(): View
    {
        return view('welcome');
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

        // 3. Kembalikan pengguna ke halaman utama dengan pesan sukses
        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }
}


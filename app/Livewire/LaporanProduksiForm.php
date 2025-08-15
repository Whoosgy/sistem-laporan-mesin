<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produksi;

class LaporanProduksiForm extends Component
{
    // Properti untuk menampung data dari input field
    public $tanggal_lapor;
    public $jam_lapor;
    public $shift = '1';
    public $plant;
    public $nama_mesin;
    public $nama_pelapor;
    public $bagian_rusak;
    public $uraian_kerusakan;

    // Properti untuk dropdown
    public $listPlant = [];
    public $listMesin = [];

    public function mount()
    {
        $this->listPlant = config('datamesin.plants');
        $this->listMesin = collect(config('datamesin.mesins'))->flatten()->unique()->sort()->values()->all();
    }

    public function updatedPlant($value)
    {
        if ($value && isset(config('datamesin.mesins')[$value])) {
            $this->listMesin = config('datamesin.mesins')[$value];
        } else {
            $this->listMesin = collect(config('datamesin.mesins'))->flatten()->unique()->sort()->values()->all();
        }
        $this->reset('nama_mesin');
    }

    public function save()
{
    $validatedData = $this->validate([
        'tanggal_lapor' => 'required|date',
        'jam_lapor' => 'required',
        'shift' => 'required|string|max:20',
        'plant' => 'nullable|string|max:100',
        'nama_mesin' => 'required|string|max:255',
        'nama_pelapor' => 'required|string|max:255',
        'bagian_rusak' => 'nullable|string|max:255',
        'uraian_kerusakan' => 'required|string',
    ]);

    Produksi::create($validatedData);

    // PERBAIKAN: Mengosongkan form langsung di sini
    $this->reset(
        'tanggal_lapor', 'jam_lapor', 'plant', 'nama_mesin',
        'nama_pelapor', 'bagian_rusak', 'uraian_kerusakan'
    );
    // Kita biarkan 'shift' tetap di nilai default-nya.

    // Mengirim "sinyal" ke browser
    $this->dispatch('laporan-sukses', 'Laporan kerusakan mesin berhasil dikirim!');
}

    // FUNGSI BARU UNTUK TOMBOL RESET
    public function resetForm()
    {
        $this->reset(); // Perintah Livewire untuk mereset semua properti publik
        $this->mount(); // Panggil mount lagi untuk mengisi ulang daftar mesin
    }

    public function render()
    {
        $laporanTerbaru = Produksi::with('maintenance')
                              ->latest('created_at')
                              ->take(10)
                              ->get();

        return view('livewire.laporan-produksi-form', [
            'semuaLaporan' => $laporanTerbaru
        ]);
    }
}
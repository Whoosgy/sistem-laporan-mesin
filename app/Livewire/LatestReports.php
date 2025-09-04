<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produksi;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Collection; 

class LatestReports extends Component
{
    /**
     * Inisialisasi properti sebagai Collection kosong.
     * Ini memastikan variabelnya tidak pernah null.
     * @var Collection
     */
    public Collection $laporanTerbaru;

    public function mount()
    {
        // Panggil method loadLaporan saat komponen pertama kali dimuat
        $this->loadLaporan();
    }

    #[On('echo:laporan,LaporanBaru')]
    public function loadLaporan()
    {
        // Method ini sekarang bisa dipanggil dari mana saja untuk me-refresh data
        $this->laporanTerbaru = Produksi::with('maintenance')
                                  ->latest()
                                  ->take(5)
                                  ->get();
    }

    public function render()
    {
        // Method render sekarang hanya fokus untuk menampilkan view
        return view('livewire.latest-reports');
    }
}
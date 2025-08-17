<?php

namespace App\Livewire\Maintenance;

use Livewire\Component;
use App\Models\Produksi;
use Livewire\Attributes\On;

class ViewLaporan extends Component
{
    public bool $isModalOpen = false;
    public ?Produksi $laporanProduksi = null;

    #[On('open-view-modal')]
    public function loadLaporan($produksiId)
    {
        // Ambil data laporan produksi lengkap dengan data maintenance terkait
        $this->laporanProduksi = Produksi::with('maintenance')->find($produksiId);

        // Jika data ditemukan, buka modal
        if ($this->laporanProduksi) {
            $this->isModalOpen = true;
        }
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function render()
    {
        return view('livewire.maintenance.view-laporan');
    }
}
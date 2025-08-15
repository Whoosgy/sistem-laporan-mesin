<?php

namespace App\Livewire\Maintenance;

use Livewire\Component;
use App\Models\Produksi;
use App\Models\Maintenance;
use Livewire\Attributes\On;

class UpdateLaporan extends Component
{
    public bool $isModalOpen = false;
    public ?Produksi $laporanProduksi = null;

    // Properti untuk form maintenance
    public $produksi_id, $waktu_perbaikan, $tanggal_selesai, $nama_teknisi, $jenis_perbaikan, $sparepart, $keterangan, $status;

    #[On('open-update-modal')]
    public function loadLaporan($produksiId)
    {
        $this->laporanProduksi = Produksi::with('maintenance')->find($produksiId);

        if ($this->laporanProduksi) {
            $this->produksi_id = $this->laporanProduksi->id;
            if ($this->laporanProduksi->maintenance) {
                $maintenance = $this->laporanProduksi->maintenance;
                $this->waktu_perbaikan = $maintenance->waktu_perbaikan;
                $this->tanggal_selesai = $maintenance->tanggal_selesai;
                
            } else {
                $this->reset('waktu_perbaikan', 'tanggal_selesai', 'nama_teknisi', 'jenis_perbaikan', 'sparepart', 'keterangan', 'status');
            }
            $this->isModalOpen = true;
        }
    }

    public function updateLaporan()
    {
       
        $this->isModalOpen = false;
        $this->dispatch('laporan-updated');
        $this->dispatch('laporan-sukses', 'Status laporan berhasil diperbarui!');
    }

    public function render()
    {
        return view('livewire.maintenance.update-laporan');
    }
}
<?php

namespace App\Livewire\Maintenance;

use Livewire\Component;
use App\Models\Produksi;
use Livewire\Attributes\On;

class ViewLaporan extends Component
{
    public bool $isModalOpen = false;
    public ?Produksi $laporanProduksi = null;
    public array $photoPaths = [];

    public bool $lightboxOpen = false;
    public string $lightboxImage = '';

    #[On('open-view-modal')]
    public function loadLaporan($produksiId)
    {
        $this->laporanProduksi = Produksi::with('maintenance')->find($produksiId);

        if ($this->laporanProduksi) {
            // Menambahkan logika untuk mengambil dan memproses path foto
            if (!empty($this->laporanProduksi->photo_path)) {

                 $decoded = json_decode($this->laporanProduksi->photo_path, true);
    
                if (is_array($decoded)) {
                    $this->photoPaths = $decoded;
                } else {
                    $this->photoPaths = [$this->laporanProduksi->photo_path];
                }
            } else {
                $this->photoPaths = [];
            }
            
            $this->isModalOpen = true;
        }
    }

     // Method untuk membuka lightbox
    public function openLightbox(string $imageUrl)
    {
        $this->lightboxImage = $imageUrl;
        $this->lightboxOpen = true;
    }

    // Method untuk menutup lightbox
    public function closeLightbox()
    {
        $this->reset('lightboxOpen', 'lightboxImage');
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        // Reset properti saat modal ditutup
        $this->reset('laporanProduksi', 'photoPaths');
        $this->reset('laporanProduksi', 'photoPaths');
    }

    public function render()
    {
        return view('livewire.maintenance.view-laporan');
    }
}
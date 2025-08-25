<?php

namespace App\Livewire;

use Livewire\Component;

class DownloadLaporanButton extends Component
{
    public bool $isOpen = false;
    public $startDate;
    public $endDate;

    public function mount()
    {
        // Mengatur tanggal default ke bulan ini
        $this->startDate = now()->startOfMonth()->format('Y-m-d');
        $this->endDate = now()->endOfMonth()->format('Y-m-d');
    }

    public function toggleDropdown()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function closeDropdown()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.download-laporan-button');
    }
}

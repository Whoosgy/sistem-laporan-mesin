<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produksi;
use App\Models\Maintenance;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;


#[Layout('components.layouts.app')]
// Menetapkan judul tab di sini
#[Title('Dasbor Maintenance')]
class MaintenanceDashboard extends Component
{
    use WithPagination;

    public string $search = '';
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';

    #[On('laporan-updated')]
    public function refreshDasbor()
    {
        // Tidak perlu isi, Livewire akan otomatis me-refresh
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function render()
    {
        $query = Produksi::with('maintenance');

        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('nama_mesin', 'like', '%' . $this->search . '%')
                  ->orWhere('nama_pelapor', 'like', '%' . $this->search . '%')
                  ->orWhere('plant', 'like', '%' . $this->search . '%')
                  ->orWhere('keterangan', 'like', '%' . $this->search . '%');
            });
        }

        $laporanProduksi = $query->orderBy($this->sortField, $this->sortDirection)->paginate(10);

        $pendingCount = Produksi::whereDoesntHave('maintenance')->count();
        $selesaiCount = Maintenance::where('status', 'Selesai')->count();
        $prosesCount = Maintenance::where('status', 'Dalam Proses')->count();

        return view('livewire.maintenance-dashboard', [
            'pendingCount' => $pendingCount,
            'prosesCount' => $prosesCount,
            'selesaiCount' => $selesaiCount,
            'semuaLaporan' => $laporanProduksi
        ]);
    }
}
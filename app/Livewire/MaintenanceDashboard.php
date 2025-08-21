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
#[Title('Dasbor Maintenance')]
class MaintenanceDashboard extends Component
{
    use WithPagination;

    public string $search = '';
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';

    #[On('laporan-updated')]
    public function refreshDasbor() {}

    #[On('laporan-updated-sukses')]
    public function refreshComponent() {}


    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function updatedPage()
    {
    $this->dispatch('scroll-to-table');
    }

    public function render()
    {
        $query = Produksi::with('maintenance');

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('nama_mesin', 'like', '%' . $this->search . '%')
                    ->orWhere('nama_pelapor', 'like', '%' . $this->search . '%')
                    ->orWhere('plant', 'like', '%' . $this->search . '%')
                    ->orWhere('keterangan', 'like', '%' . $this->search . '%');
            });
        }

        $laporanProduksi = $query->orderBy($this->sortField, $this->sortDirection)->paginate(10);

        $pendingCount = Produksi::whereDoesntHave('maintenance')->orWhereHas('maintenance', function ($query) {
            $query->where('status', 'Pending');
        })->count();
        $prosesCount = Maintenance::where('status', 'Belum Selesai')->count();

        $selesaiCount = Maintenance::where('status', 'Selesai')->count();

        // Data untuk grafik trend bulanan (6 bulan terakhir)
        $monthlyData = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthName = $date->format('M Y');
            $count = Produksi::whereYear('created_at', $date->year)
                            ->whereMonth('created_at', $date->month)
                            ->count();
            $monthlyData[] = [
                'month' => $monthName,
                'count' => $count
            ];
        }

        // Data berdasarkan plant
        $plantData = Produksi::selectRaw('plant, COUNT(*) as total')
                            ->groupBy('plant')
                            ->orderBy('total', 'desc')
                            ->get();

        return view('livewire.maintenance-dashboard', [
            'pendingCount' => $pendingCount,
            'prosesCount' => $prosesCount,
            'selesaiCount' => $selesaiCount,
            'semuaLaporan' => $laporanProduksi,
            'monthlyData' => $monthlyData,
            'plantData' => $plantData
        ]);
    }
}

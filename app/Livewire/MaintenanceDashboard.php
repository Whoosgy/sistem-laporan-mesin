<?php

namespace App\Livewire;

use App\Models\Maintenance;
use App\Models\Produksi;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Exports\LaporanMaintenanceExport;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('components.layouts.app')]
#[Title('Dashboard Maintenance')]
class MaintenanceDashboard extends Component
{
    use WithPagination;

    public string $search = '';
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';

    

    // Properti untuk filter status
    public string $statusFilter = '';

    #[On('laporan-updated-sukses')]
    public function refreshComponent()
    {

    }

    public function filterByStatus(string $status): void
    {
        $this->statusFilter = $status;
        $this->resetPage();
    }

     public function exportExcel()
    {
    
        $startDate = '1970-01-01';
        $endDate = now()->format('Y-m-d');

        return Excel::download(new LaporanMaintenanceExport($startDate, $endDate), 'laporan-maintenance.xlsx');
    }

     public function exportCsv()
    {

        $startDate = '1970-01-01';
        $endDate = now()->format('Y-m-d');

        return Excel::download(new LaporanMaintenanceExport($startDate, $endDate), 'laporan-maintenance.csv', \Maatwebsite\Excel\Excel::CSV);
    }



    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
        $this->resetPage();
    }

    public function updatedPage()
    {
        $this->dispatch('scroll-to-table');
    }

    public function render()
    {
        // Memulai query dasar
        $query = Produksi::with('maintenance');

        // Menerapkan filter pencarian
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('nama_mesin', 'like', '%' . $this->search . '%')
                    ->orWhere('nama_pelapor', 'like', '%' . $this->search . '%')
                    ->orWhere('plant', 'like', '%' . $this->search . '%')
                    ->orWhere('keterangan', 'like', '%' . $this->search . '%');
            });
        }

        // Menerapkan filter status
        $query->when($this->statusFilter, function ($query) {
            if ($this->statusFilter === 'Pending') {
                $query->where(function ($q) {
                    $q->whereDoesntHave('maintenance')
                      ->orWhereHas('maintenance', fn ($sub) => $sub->where('status', 'Pending'));
                });
            } else {
                $query->whereHas('maintenance', fn ($q) => $q->where('status', $this->statusFilter));
            }
        });

        // Menerapkan pengurutan dan paginasi
        $laporanProduksi = $query->orderBy($this->sortField, $this->sortDirection)
                                 ->paginate(10);

        // Menghitung jumlah untuk kartu status
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

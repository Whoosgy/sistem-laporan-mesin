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
    public string $filterCategory = '';
    public string $filterValue = '';

    public string $statusFilter = '';

    public ?string $keteranganFilter = null;

    public function mount(?string $keterangan = null)
    {
        $this->keteranganFilter = $keterangan;
    }

    #[On('laporan-updated-sukses')]
    public function refreshComponent() {}

    public function filterReports($category, $value)
    {
        $this->filterCategory = $category;
        $this->filterValue = $value;
        $this->resetPage();
    }
    public function resetAllFilters()
    {
        $this->filterCategory = '';
        $this->filterValue = '';
        $this->resetPage();
    }
    protected $queryString = [
        'search',
        'sortField',
        'sortDirection',
        'filterCategory' => ['except' => ''],
        'filterValue' => ['except' => ''],
    ];

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
        $cardBaseQuery = Produksi::query()
            ->when($this->keteranganFilter, function ($query) {
                $query->where('keterangan', $this->keteranganFilter);
            });

        $pendingCount = (clone $cardBaseQuery)->where(function ($query) {
            $query->whereDoesntHave('maintenance')->orWhereHas('maintenance', fn($q) => $q->where('status', 'Pending'));
        })->count();

        $prosesCount = (clone $cardBaseQuery)->whereHas('maintenance', fn($q) => $q->where('status', 'On Progress'))->count();
        $belumSelesaiCount = (clone $cardBaseQuery)->whereHas('maintenance', fn($q) => $q->where('status', 'Belum Selesai'))->count();
        $selesaiCount = (clone $cardBaseQuery)->whereHas('maintenance', fn($q) => $q->where('status', 'Selesai'))->count();


        // --- QUERY UNTUK MENAMPILKAN DATA DI TABEL ---
        $laporanProduksi = Produksi::with('maintenance')
            ->when($this->keteranganFilter, function ($query) {
                $query->where('keterangan', $this->keteranganFilter);
            })
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('nama_mesin', 'like', '%' . $this->search . '%')
                        ->orWhere('nama_pelapor', 'like', '%' . $this->search . '%')
                        ->orWhere('plant', 'like', '%' . $this->search . '%')
                        ->orWhere('uraian_kerusakan', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->filterCategory && $this->filterValue, function ($q) {
                if ($this->filterCategory === 'status') {
                    if ($this->filterValue === 'Pending') {
                        $q->where(function ($subQuery) {
                            $subQuery->whereDoesntHave('maintenance')
                                ->orWhereHas('maintenance', fn($sub) => $sub->where('status', 'Pending'));
                        });
                    } else {
                        $q->whereHas('maintenance', fn($sub) => $sub->where('status', $this->filterValue));
                    }
                } else {
                    $q->where($this->filterCategory, $this->filterValue);
                }
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.maintenance-dashboard', [
            'pendingCount'      => $pendingCount,
            'prosesCount'       => $prosesCount,
            'belumSelesaiCount' => $belumSelesaiCount,
            'selesaiCount'      => $selesaiCount,
            'semuaLaporan'      => $laporanProduksi,
        ]);
    }
}

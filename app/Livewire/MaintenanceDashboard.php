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

    public ?string $keteranganFilter = null;

    public function mount(?string $keterangan = null)
    {
        $this->keteranganFilter = $keterangan;
    }

    #[On('laporan-updated-sukses')]
    public function refreshComponent()
    {
        // Fungsi ini bisa digunakan untuk me-refresh data lain jika perlu
    }

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
    // Memulai query dasar pada model Produksi
    $query = Produksi::with('maintenance');

<<<<<<< HEAD
        $baseProduksiQuery = Produksi::query()->when($this->keteranganFilter, fn($q) => $q->where('keterangan', $this->keteranganFilter));
        
        $pendingCount = (clone $baseProduksiQuery)->where(function ($query) {
            $query->whereDoesntHave('maintenance')->orWhereHas('maintenance', fn ($q) => $q->where('status', 'Pending'));
        })->count();

        $baseMaintenanceQuery = Maintenance::query()->when($this->keteranganFilter, fn($q) => $q->whereHas('produksi', fn($sq) => $sq->where('keterangan', $this->keteranganFilter)));

        // : Mengganti nama variabel kembali ke $prosesCount agar cocok dengan view
        $prosesCount = (clone $baseMaintenanceQuery)->where('status', 'On Progress')->count();
        $belumSelesaiCount = (clone $baseMaintenanceQuery)->where('status', 'Belum Selesai')->count();
        $selesaiCount = (clone $baseMaintenanceQuery)->where('status', 'Selesai')->count();

        $monthlyData = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthName = $date->format('M Y');
            $count = Produksi::whereYear('created_at', $date->year)->whereMonth('created_at', $date->month)->count();
            $monthlyData[] = ['month' => $monthName, 'count' => $count];
        }

        $plantData = Produksi::selectRaw('plant, COUNT(*) as total')->groupBy('plant')->orderBy('total', 'desc')->get();

        return view('livewire.maintenance-dashboard', [
            'pendingCount'      => $pendingCount,
            'prosesCount'       => $prosesCount, 
            'belumSelesaiCount' => $belumSelesaiCount,
            'selesaiCount'      => $selesaiCount,
            'semuaLaporan'      => $laporanProduksi,
            'monthlyData'       => $monthlyData,
            'plantData'         => $plantData
        ]);
=======
    // Menerapkan filter pencarian
    if (!empty($this->search)) {
        $query->where(function ($q) {
            $q->where('nama_mesin', 'like', '%' . $this->search . '%')
                ->orWhere('nama_pelapor', 'like', '%' . $this->search . '%')
                ->orWhere('plant', 'like', '%' . $this->search . '%')
                ->orWhere('keterangan', 'like', '%' . $this->search . '%');
        });
>>>>>>> 0f6988f1109a9ce73eb2d2b38ed12840e341af61
    }

    // Menggabungkan logika filter ke dalam satu blok `when()`
    $query->when($this->filterCategory && $this->filterValue, function ($q) {
        if ($this->filterCategory === 'status') {
            if ($this->filterValue === 'pending') {
                $q->whereDoesntHave('maintenance');
            } else {
                $q->whereHas('maintenance', fn ($sub) => $sub->where('status', $this->filterValue));
            }
        } elseif ($this->filterCategory === 'plant') {
            $q->where('plant', $this->filterValue);
        } elseif ($this->filterCategory === 'keterangan') {
            $q->where('keterangan', $this->filterValue);
        }
    });

    $laporanProduksi = $query
        ->orderBy($this->sortField, $this->sortDirection)
        ->paginate(10);

    // Menghitung jumlah untuk kartu status (perbaikan logika)
    $baseProduksiQuery = Produksi::query();
    
    // Terapkan filter kategori ke query hitungan
    $baseProduksiQuery->when($this->filterCategory === 'keterangan' && $this->filterValue, function ($q) {
        $q->where('keterangan', $this->filterValue);
    });

    $pendingCount = (clone $baseProduksiQuery)->whereDoesntHave('maintenance')->count();
    $prosesCount = (clone $baseProduksiQuery)->whereHas('maintenance', fn ($q) => $q->where('status', 'On Progress'))->count();
    $belumSelesaiCount = (clone $baseProduksiQuery)->whereHas('maintenance', fn ($q) => $q->where('status', 'Belum Selesai'))->count();
    $selesaiCount = (clone $baseProduksiQuery)->whereHas('maintenance', fn ($q) => $q->where('status', 'Selesai'))->count();

    // Data untuk grafik trend bulanan dan plant (logika sama)
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
    
    $plantData = Produksi::selectRaw('plant, COUNT(*) as total')
                         ->groupBy('plant')
                         ->orderBy('total', 'desc')
                         ->get();

    return view('livewire.maintenance-dashboard', [
        'pendingCount'      => $pendingCount,
        'prosesCount'       => $prosesCount, // PERBAIKAN: Mengirim variabel dengan nama yang benar
        'belumSelesaiCount' => $belumSelesaiCount,
            'selesaiCount'      => $selesaiCount,
        'semuaLaporan'      => $laporanProduksi,
        'monthlyData'       => $monthlyData,
        'plantData'         => $plantData
    ]);
}
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produksi;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;

#[Layout('components.layouts.app')]
#[Title('Production report')]
class LaporanProduksiForm extends Component
{
    use WithPagination;
    use WithFileUploads;

    // Properti form
    public $tanggal_lapor, $jam_lapor, $shift = '', $plant, $nama_mesin, $nama_pelapor, $bagian_rusak, $uraian_kerusakan, $keterangan = '';
    public $photo;

    // Properti UI dan Logika
    public $listPlant = [];
    public $namaMesinPlaceholder = 'Pilih atau cari Mesin';
    public bool $isPlantManual = false;
    public bool $isModalOpen = false;

    // Properti untuk Pencarian dan Filter
    public string $search = '';
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';
    public string $filterCategory = '';
    public string $filterValue = '';

    // Query String untuk menjaga state URL
    protected $queryString = [
        'search',
        'sortField',
        'sortDirection',
        'filterCategory' => ['except' => ''],
        'filterValue' => ['except' => ''],
    ];

    // Metode Mount untuk inisialisasi awal
    public function mount()
    {
        $this->listPlant = config('datamesin.plants');
        $now = now('Asia/Jakarta');
        $this->tanggal_lapor = $now->format('Y-m-d');
        $this->jam_lapor = now()->format('H:i');
        $this->updatedJamLapor($this->jam_lapor);
    }

    // Aksi untuk filter
    public function filterReports($category, $value)
    {
        $this->filterCategory = $category;
        $this->filterValue = $value;
        $this->resetPage();
    }
    
    // Aksi untuk mereset semua filter
    public function resetAllFilters()
    {
        $this->filterCategory = '';
        $this->filterValue = '';
        $this->resetPage();
    }

    // Aksi untuk sorting
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

    // Metode yang dipanggil saat `search` diperbarui
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Logika bisnis untuk form
    protected function rules()
    {
        return [
            'tanggal_lapor' => 'required|date',
            'jam_lapor' => 'required',
            'shift' => 'required|string|max:20',
            'plant' => 'nullable|string|max:100',
            'nama_mesin' => 'required|string|max:255',
            'nama_pelapor' => 'required|string|max:255',
            'bagian_rusak' => 'nullable|string|max:255',
            'uraian_kerusakan' => 'required|string',
            'keterangan' => 'required|string|in:Mekanik,Elektrik,Utility,Calibraty',
            'photo' => 'nullable|image|max:102400',
        ];
    }
    
    public function updatedJamLapor($value)
    {
        if (!$value) {
            $this->shift = null;
            return;
        }
        if ($value >= '06:45' && $value < '15:15') {
            $this->shift = '1';
        } else if ($value >= '15:15' && $value < '22:45') {
            $this->shift = '2';
        } else {
            $this->shift = '3';
        }
    }

    public function updatedPlant($value)
    {
        $this->reset('nama_mesin');
        $manualInputPlants = ['SS', 'SC', 'PE', 'QC', 'GA', 'MT', 'FH'];
        $this->isPlantManual = in_array($value, $manualInputPlants);
        $this->namaMesinPlaceholder = $this->isPlantManual ? 'Lainnya (Input Manual)' : 'Pilih atau cari Mesin';
    }

    public function openConfirmationModal()
    {
        $this->validate();
        $this->isModalOpen = true;
    }
    
    public function closeModal()
    {
        $this->isModalOpen = false;
    }
    
    public function removePhoto()
    {
        $this->reset('photo');
    }

    public function save()
    {
        $validatedData = $this->validate();

        if ($this->photo) {
            $validatedData['photo_path'] = $this->photo->store('photos', 'public');
        }
        unset($validatedData['photo']);
        
        Produksi::create($validatedData);
        $this->closeModal();
        $this->resetForm();
        $this->dispatch('laporan-sukses', 'Laporan kerusakan mesin berhasil dikirim!');
        $this->dispatch('laporan-tersimpan');
    }

    public function resetForm()
    {
        $this->reset([
            'tanggal_lapor', 'jam_lapor', 'shift', 'plant', 'nama_mesin', 
            'nama_pelapor', 'bagian_rusak', 'uraian_kerusakan', 'keterangan', 'photo'
        ]);
        
        // Atur ulang nilai default
        $this->tanggal_lapor = now()->format('Y-m-d');
        $this->jam_lapor = now()->format('H:i');
        $this->updatedJamLapor($this->jam_lapor);
    }
    
    // Metode utama untuk merender view dan data
    public function render()
    {
        $manualInputPlants = ['SS', 'SC', 'PE', 'QC', 'GA', 'MT', 'FH'];
        $listMesinUntukDitampilkan = collect();
        $emptyMessage = 'Nama mesin tidak ditemukan.';

        if ($this->plant) {
            if (in_array($this->plant, $manualInputPlants)) {
                $listMesinUntukDitampilkan = collect();
                $emptyMessage = 'Tidak ada pilihan. Silakan input manual.';
            } elseif (array_key_exists($this->plant, config('datamesin.mesins'))) {
                $listMesinUntukDitampilkan = collect(config('datamesin.mesins')[$this->plant]);
            }
        } else {
            $emptyMessage = 'Pilih Plant untuk melihat daftar mesin.';
        }
        
        if (!empty($this->nama_mesin) && $listMesinUntukDitampilkan->isNotEmpty()) {
            $listMesinUntukDitampilkan = $listMesinUntukDitampilkan->filter(function ($nama) {
                return stripos($nama, $this->nama_mesin) !== false;
            });
        }
        
        $query = Produksi::query();
        
        // Menerapkan filter pencarian
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('nama_mesin', 'like', '%' . $this->search . '%')
                    ->orWhere('nama_pelapor', 'like', '%' . $this->search . '%')
                    ->orWhere('plant', 'like', '%' . $this->search . '%')
                    ->orWhere('uraian_kerusakan', 'like', '%' . $this->search . '%');
            });
        }
        
        // Menerapkan filter berdasarkan kategori
        $query->when($this->filterCategory && $this->filterValue, function ($q) {
            if ($this->filterCategory === 'status') {
                if ($this->filterValue === 'pending') {
                    $q->whereDoesntHave('maintenance');
                } else {
                    $q->whereHas('maintenance', fn ($q2) => $q2->where('status', $this->filterValue));
                }
            } elseif ($this->filterCategory === 'plant') {
                $q->where('plant', $this->filterValue);
            } elseif ($this->filterCategory === 'keterangan') {
                $q->where('keterangan', $this->filterValue);
            }
        });

        $laporanTerbaru = $query
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.laporan-produksi-form', [
            'listMesin' => $listMesinUntukDitampilkan,
            'emptyMessage' => $emptyMessage,
            'semuaLaporan' => $laporanTerbaru
        ]);
    }
}
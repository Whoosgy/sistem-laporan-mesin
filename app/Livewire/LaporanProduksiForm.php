<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produksi;

class LaporanProduksiForm extends Component
{
    // Properti untuk data form
    public $tanggal_lapor, $jam_lapor, $shift = '', $plant, $nama_mesin, $nama_pelapor, $bagian_rusak, $uraian_kerusakan, $keterangan = '';

    // Properti untuk dropdown & interaktivitas
    public $listPlant = [];
    public $namaMesinPlaceholder = 'Pilih atau cari Mesin';
    public bool $isPlantManual = false;
    public bool $isModalOpen = false;

    // PERBAIKAN: Menambahkan properti untuk search bar riwayat
    public string $search = '';
    public string $sortField = 'created_at'; 
    public string $sortDirection = 'desc';

     public function sortBy($field)
    {
        
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
        
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    // "Resep" validasi yang terpusat
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
            'keterangan' => 'required|string|max:20',
        ];
    }

    public function mount()
    {
        $this->listPlant = config('datamesin.plants');
    }

    public function updatedPlant($value)
    {
        $this->reset('nama_mesin');
        $manualInputPlants = ['SS', 'SC', 'PE', 'QC', 'GA'];
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
    
    public function setShift($value)
    {
        $this->shift = $value;
    }

    public function setPlant($value)
    {
        $this->plant = $value;
    }

    public function setNamaMesin($value)
    {
        $this->nama_mesin = $value;
    }

    public function setKeterangan($value)
    {
        $this->keterangan = $value;
    }

    public function save()
    {
        $validatedData = $this->validate();
        Produksi::create($validatedData);
        $this->closeModal();
        $this->resetForm();
        $this->dispatch('laporan-sukses', 'Laporan kerusakan mesin berhasil dikirim!');
    }

    public function resetForm()
    {
        $this->reset();
        $this->mount();
    }

    public function render()
    {
        $manualInputPlants = ['SS', 'SC', 'PE', 'QC', 'GA'];
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

        $query = Produksi::with('maintenance');

        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('nama_mesin', 'like', '%' . $this->search . '%')
                  ->orWhere('nama_pelapor', 'like', '%' . $this->search . '%')
                  ->orWhere('plant', 'like', '%' . $this->search . '%')
                  ->orWhere('uraian_kerusakan', 'like', '%' . $this->search . '%');
            });
        }

         $laporanTerbaru = $query->orderBy($this->sortField, $this->sortDirection)
                                ->take(10)
                                ->get();

        return view('livewire.laporan-produksi-form', [
            'listMesin' => $listMesinUntukDitampilkan,
            'emptyMessage' => $emptyMessage,
            'semuaLaporan' => $laporanTerbaru
        ]);
        
    }
}
<?php

namespace App\Livewire\Maintenance;

use Livewire\Component;
use App\Models\Produksi;
use App\Models\Maintenance;
use App\Models\Technician;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;

class UpdateLaporan extends Component
{
    public bool $isModalOpen = false;
    public ?Produksi $laporanProduksi = null;

    // Properti Form
    public $produksi_id;
    public $waktu_perbaikan;
    public $waktu_selesai;
    public $tanggal_selesai;
    public $jenis_perbaikan;
    public $sparepart;
    public $keterangan;
    public $keterangan_maintenance;
    public $status;
    
    // Properti untuk Pencarian dan Pemilihan Teknisi
    public string $searchQuery = '';
    public array $allTechnicians = [];
    public array $selectedTechnicians = [];
    public bool $showKeteranganDropdown = false;
    public function toggleKeteranganDropdown()
    {
        $this->showKeteranganDropdown = !$this->showKeteranganDropdown;
    }

    public function mount()
    {
        // Ambil semua data teknisi dari database saat awal
        $this->allTechnicians = \App\Models\Technician::all()->toArray();
    }
    #[Computed]
    public function filteredTechnicians()
    {
        return collect($this->allTechnicians)->filter(function ($technician) {
            // Kondisi 1: Tidak ada dalam daftar yang sudah dipilih
           $isAlreadySelected = collect($this->selectedTechnicians)->contains('id', $technician['id']);
            // Cocokkan dengan pencarian nama
            $matchesSearch = empty($this->searchQuery) || 
                             str_contains(strtolower($technician['name']), strtolower($this->searchQuery));

            return !$isAlreadySelected && $matchesSearch;
        })->values()->all();
    }
    
    // Fungsi untuk MEMILIH teknisi dari daftar
    public function selectTechnician($id, $name)
    {
        // Validasi: Maksimal 5 orang
        if (count($this->selectedTechnicians) < 5) {
            // Pastikan tidak double input
            $exists = collect($this->selectedTechnicians)->contains('id', $id);
            
            if (!$exists) {
                $this->selectedTechnicians[] = [
                    'id' => $id, 
                    'name' => $name
                ];
                $this->searchQuery = '';
            }
        }
    }
    // Fungsi untuk MENGHAPUS teknisi dari daftar pilihan
    public function removeTechnician($index)
    {
        if (isset($this->selectedTechnicians[$index])) {
            unset($this->selectedTechnicians[$index]);
            $this->selectedTechnicians = array_values($this->selectedTechnicians);
        }
    }
    public function setKeteranganMaintenance($value)
    {
        $this->keterangan_maintenance = $value;
        $this->showKeteranganDropdown = false;
    }
    protected function rules()
    {
        return [
            'tanggal_selesai' => 'required_if:status,Selesai|nullable|date',
            'waktu_selesai' => 'required_if:status,Selesai|nullable|string',
            'waktu_perbaikan' => 'required',
            'selectedTechnicians' => 'required|array|min:1|max:5',
            'jenis_perbaikan' => 'nullable|string',
            'sparepart' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'status' => 'required|string|in:Pending,On Progress,Belum Selesai,Selesai',
            'keterangan_maintenance' => 'nullable|string',
        ];
    
    }

    #[On('open-update-modal')]
    public function loadLaporan($produksiId)
    {
        $this->laporanProduksi = Produksi::with('maintenance.technicians')->find($produksiId);
    
        if ($this->laporanProduksi) {
            $this->produksi_id = $this->laporanProduksi->id;
    
            if ($this->laporanProduksi->maintenance) {
                $maintenance = $this->laporanProduksi->maintenance;
                $this->waktu_perbaikan = $maintenance->waktu_perbaikan;
                $this->waktu_selesai = $maintenance->waktu_selesai;
                $this->tanggal_selesai = $maintenance->tanggal_selesai;
                $this->jenis_perbaikan = $maintenance->jenis_perbaikan;
                $this->sparepart = $maintenance->sparepart;
                $this->keterangan = $maintenance->keterangan;
                $this->keterangan_maintenance = $maintenance->keterangan_maintenance;
                $this->status = $maintenance->status;

                $this->selectedTechnicians = $maintenance->technicians->map(function($tech) {
                    return [
                        'id' => $tech->id,
                        'name' => $tech->name,
                    ];
                })->toArray();

            } else {
                $this->reset(['waktu_perbaikan', 'tanggal_selesai', 'selectedTechnicians', 'jenis_perbaikan', 'sparepart', 'keterangan', 'waktu_selesai']);
                $this->status = 'Pending';
            }
            $this->searchQuery = '';
            $this->isModalOpen = true;
        }
        }
        public function updateLaporan()
        {
            $this->validate();
        
            $dataToSave = [
                'waktu_perbaikan' => $this->waktu_perbaikan,
                'waktu_selesai'   => $this->waktu_selesai ?? null,
                'tanggal_selesai' => $this->tanggal_selesai ?? null,
                'jenis_perbaikan' => $this->jenis_perbaikan ?? 'N/A',
                'sparepart'       => $this->sparepart ?? 'Tidak ada',
                'keterangan'      => $this->keterangan ?? 'Tidak ada',
                'keterangan_maintenance' => $this->keterangan_maintenance ?? 'Tidak ada',
                'status'          => $this->status,
            ];
        
            $maintenance = Maintenance::updateOrCreate(
                ['produksi_id' => $this->produksi_id],
                $dataToSave
            );
        
            $ids = collect($this->selectedTechnicians)->pluck('id')->toArray();
            $maintenance->technicians()->sync($ids);
        
            $this->isModalOpen = false;
            $this->dispatch('laporan-updated-sukses');
            $this->dispatch('laporan-sukses', 'Status laporan berhasil diperbarui!');
        }
        
            public function closeModal()
            {
                $this->isModalOpen = false;
            }
            public function render()
            {
                return view('livewire.maintenance.update-laporan');
            }
        }




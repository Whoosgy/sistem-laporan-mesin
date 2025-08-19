<?php

namespace App\Livewire\Maintenance;

use Livewire\Component;
use App\Models\Produksi;
use App\Models\Maintenance;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;

class UpdateLaporan extends Component
{
    public bool $isModalOpen = false;
    public ?Produksi $laporanProduksi = null;

    // Properti Form
    public $produksi_id;
    public $waktu_perbaikan;
    public $tanggal_selesai;
    public $jenis_perbaikan;
    public $sparepart;
    public $keterangan;
    public $status;

    public array $selectedTechnicians = [];

    // Properti untuk Pencarian
    public string $searchQuery = '';
    public $allTechnicians = [
        'SUYANTO', 'SAMIJAN', 'FAISAL.K', 'SUGENG', 'ARIF ARYANTO', 'RUSWIDI JOKO',
        'HANI ADNANI', 'TEDDY JHONY WN', 'AGGRIS YAYIT.T', 'M.ASAD RAMADHAN',
        'ANDHI KURNIASYAH', 'WAHYUDIN', 'TARMONO', 'SUAR SAPTO', 'ALI MUSTOFA',
        'ENDANG MULYADI', 'ARI MUHODARI', 'TURIMAN', 'BUDIYANTO', 'RIYAN INDRIYANA RAHARDI',
        'DEDI HARYAWAN', 'UJANG SUDRAJAT', 'DONI RAMADONI', 'RAHMAT HIDAYAT', 'FIRMAN HIDAYAT',
        'M.AZIZ TOYYIBIN', 'BUSTAMI', 'ROHMAN', 'YULIMANSYAH', 'SUJARWO', 'SUYATNO',
        'KASIMIN', 'BAKTI SUDARMONO', 'M.BASORI', 'AGUNG SUSENO', 'WIDODO', 'YAKUB',
        'SUKINO', 'AWALUDIN .F', 'SUPARTA'
    ];

  
    #[Computed]
    public function filteredTechnicians()
    {
        return collect($this->allTechnicians)->filter(function ($technician) {
            // Kondisi 1: Tidak ada dalam daftar yang sudah dipilih
            $notSelected = !in_array($technician, $this->selectedTechnicians);
            // Kondisi 2: Cocok dengan pencarian (jika ada)
            $matchesSearch = empty($this->searchQuery) || str_contains(strtolower($technician), strtolower($this->searchQuery));
            
            return $notSelected && $matchesSearch;
        })->values()->all();
    }

    // Fungsi untuk MEMILIH teknisi dari daftar
    public function selectTechnician($technicianName)
    {
        //  hanya 5 teknisi
       if (count($this->selectedTechnicians) < 5 && !in_array($technicianName, $this->selectedTechnicians)) {
            $this->selectedTechnicians[] = $technicianName;
            $this->searchQuery = ''; 
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

    protected function rules()
    {
        return [
            'waktu_perbaikan' => 'required',
            'tanggal_selesai' => 'required|date',
            'selectedTechnicians' => 'required|array|min:1|max:5',
            'jenis_perbaikan' => 'nullable|string',
            'sparepart' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'status' => 'required|string|in:Pending,Belum Selesai,Selesai',
        ];
    }

    #[On('open-update-modal')]
    public function loadLaporan($produksiId)
    {
        $this->laporanProduksi = Produksi::with('maintenance')->find($produksiId);

        if ($this->laporanProduksi) {
            $this->produksi_id = $this->laporanProduksi->id;

            if ($this->laporanProduksi->maintenance) {
                $maintenance = $this->laporanProduksi->maintenance;
                $this->waktu_perbaikan = $maintenance->waktu_perbaikan;
                $this->tanggal_selesai = $maintenance->tanggal_selesai;
                $this->selectedTechnicians = !empty($maintenance->nama_teknisi) ? explode(', ', $maintenance->nama_teknisi) : [];
                $this->jenis_perbaikan = $maintenance->jenis_perbaikan;
                $this->sparepart = $maintenance->sparepart;
                $this->keterangan = $maintenance->keterangan;
                $this->status = $maintenance->status;
            } else {
                $this->reset(['waktu_perbaikan', 'tanggal_selesai', 'selectedTechnicians', 'jenis_perbaikan', 'sparepart', 'keterangan']);
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
            'tanggal_selesai' => $this->tanggal_selesai,
            'nama_teknisi'    => implode(', ', $this->selectedTechnicians),
            'jenis_perbaikan' => $this->jenis_perbaikan ?? 'N/A',
            'sparepart'       => $this->sparepart ?? 'Tidak ada',
            'keterangan'      => $this->keterangan ?? 'Tidak ada',
            'status'          => $this->status,
        ];
        
        Maintenance::updateOrCreate(
            ['produksi_id' => $this->produksi_id],
            $dataToSave
        );

        $this->isModalOpen = false;
        $this->dispatch('laporan-updated-sukses');
        $this->dispatch('laporan-sukses', 'Status laporan berhasil diperbarui!');
    }
    
    public function render()
    {
        return view('livewire.maintenance.update-laporan');
    }
}

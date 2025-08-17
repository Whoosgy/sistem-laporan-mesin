<?php

namespace App\Livewire\Maintenance;

use Livewire\Component;
use App\Models\Produksi;
use App\Models\Maintenance;
use Livewire\Attributes\On;

class UpdateLaporan extends Component
{
    public bool $isModalOpen = false;
    public ?Produksi $laporanProduksi = null;

    // Properti untuk form maintenance
    public $produksi_id;
    public $waktu_perbaikan;
    public $tanggal_selesai;
    public $nama_teknisi;
    public $jenis_perbaikan;
    public $sparepart;
    public $keterangan;
    public $status;

    protected function rules()
    {
        return [
            'waktu_perbaikan' => 'required',
            'tanggal_selesai' => 'required|date',
            'nama_teknisi' => 'required|string',
            'jenis_perbaikan' => 'nullable|string',
            'sparepart' => 'nullable|string', // Aturan validasi ini sudah benar
            'keterangan' => 'nullable|string',
            'status' => 'required|string|in:Dalam Proses,Selesai',
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
                $this->nama_teknisi = $maintenance->nama_teknisi;
                $this->jenis_perbaikan = $maintenance->jenis_perbaikan;
                $this->sparepart = $maintenance->sparepart;
                $this->keterangan = $maintenance->keterangan;
                $this->status = $maintenance->status;
            } else {
                $this->reset('waktu_perbaikan', 'tanggal_selesai', 'nama_teknisi', 'jenis_perbaikan', 'sparepart', 'keterangan');
                $this->status = 'Dalam Proses';
            }

            $this->isModalOpen = true;
        }
    }

    public function updateLaporan()
    {
        // Jalankan validasi terlebih dahulu
        $this->validate();

        // PERBAIKAN: Siapkan data secara manual untuk memastikan
        // nilai null diubah menjadi nilai default sebelum disimpan.
        $dataToSave = [
            'waktu_perbaikan' => $this->waktu_perbaikan,
            'tanggal_selesai' => $this->tanggal_selesai,
            'nama_teknisi'    => $this->nama_teknisi,
            'jenis_perbaikan' => $this->jenis_perbaikan ?? 'N/A', // Jika null, simpan 'N/A'
            'sparepart'       => $this->sparepart ?? 'Tidak ada', // Jika null, simpan 'Tidak ada'
            'keterangan'      => $this->keterangan ?? 'Tidak ada', // Jika null, simpan 'Tidak ada'
            'status'          => $this->status,
        ];

        Maintenance::updateOrCreate(
            ['produksi_id' => $this->produksi_id],
            $dataToSave // Gunakan array data yang sudah disiapkan
        );

        $this->isModalOpen = false;
        // Ganti nama event agar lebih konsisten
        $this->dispatch('laporan-updated-sukses'); 
        $this->dispatch('laporan-sukses', 'Status laporan berhasil diperbarui!');
    }
    
    public function render()
    {
        return view('livewire.maintenance.update-laporan');
    }
}

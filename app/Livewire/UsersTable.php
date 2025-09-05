<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Produksi;
use Livewire\Component;


class UsersTable extends Component
{
  public function render()
{
    // Pastikan ini adalah nama model yang benar untuk tabel data Anda
    return view('livewire.users-table', [
        'model' => \App\Models\Produksi::class, // Contoh, jika Anda menampilkan data laporan
        
    'columns' => [
    'tanggal_pelapor' => 'Tanggal & Pelapor', // nama kolom database
    'mesin_plant' => 'Mesin & Plant',
    'uraian_singkat' => 'Uraian Singkat',
    'keterangan' => 'Keterangan',
    'status' => 'Status',
],
        
        // Nama-nama kolom di sini juga harus persis seperti di database
        'searchable' => ['tanggal_pelapor', 'mesin_plant', 'uraian_singkat', 'keterangan', 'status'],
    ]);
}
}
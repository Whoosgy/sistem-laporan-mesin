<?php

namespace App\Livewire;

use App\Models\Produksi;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

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
        $this->resetPage();
    }

    public function render()
    {
        $laporan = Produksi::with('maintenance')
            ->where(function ($query) {
                $query->where('nama_mesin', 'like', '%' . $this->search . '%')
                      ->orWhere('nama_pelapor', 'like', '%' . $this->search . '%')
                      ->orWhere('plant', 'like', '%' . $this->search . '%')
                      ->orWhere('keterangan', 'like', '%' . $this->search . '%')
                      ->orWhere('uraian_kerusakan', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(5); // Menampilkan 5 data per halaman

        return view('livewire.users-table', [
            'semuaLaporan' => $laporan,
        ]);
    }
}

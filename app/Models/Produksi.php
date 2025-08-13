<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne; // <-- Penting

class Produksi extends Model
{
    use HasFactory;

    protected $table = 'produksi';

    protected $fillable = [
        'tanggal_lapor',
        'jam_lapor',
        'shift',
        'nama_mesin',
        'plant',
        'nama_pelapor',
        'bagian_rusak',
        'uraian_kerusakan',
    ];


    public function maintenance(): HasOne
    {
        return $this->hasOne(Maintenance::class);
    }
}
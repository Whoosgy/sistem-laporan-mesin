<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use Illuminate\Database\Eloquent\Relations\BelongsToMany; 
class Maintenance extends Model
{
    use HasFactory;

    protected $table = 'maintenance';

    protected $fillable = [
        'produksi_id',
        'waktu_perbaikan',
        'waktu_selesai',
        'tanggal_selesai',
        'technician_id',
        'jenis_perbaikan',
        'sparepart',
        'keterangan',
        'keterangan_maintenance',
        'status',
    ];

    public function produksi(): BelongsTo
    {
        return $this->belongsTo(Produksi::class);
    }
    public function technicians(): BelongsToMany
    {
        return $this->belongsToMany(Technician::class, 'maintenance_technician');
    }
}


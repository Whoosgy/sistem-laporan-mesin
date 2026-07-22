<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 


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

    /**
     * Relasi ke Produksi//Many-to-One
     */
    public function produksi(): BelongsTo
    {
        return $this->belongsTo(Produksi::class, 'produksi_id');
    }

    /**
     * Relasi ke Teknisi//Many-to-Many
     */
    /**
     * Relasi ke Teknisi (Many-to-Many)
     */
    public function technicians(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Technician::class, 'maintenance_technician', 'maintenance_id', 'technician_id');
    }

    protected static function booted()
    {
        // Sinkronisasi saat data diupdate di Backend
        static::updated(function ($maintenance) {
            if ($maintenance->isDirty('keterangan') && $maintenance->produksi) {
                $maintenance->produksi->update([
                    'keterangan' => $maintenance->keterangan,
                ]);
            }
        });

        static::deleted(function ($maintenance) {
            if ($maintenance->produksi) {
                $maintenance->produksi()->delete();
            }
        });
    }
}
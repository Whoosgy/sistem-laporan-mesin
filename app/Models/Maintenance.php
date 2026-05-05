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

    /**
     * Relasi ke Produksi
     */
    public function produksi(): BelongsTo
    {
        return $this->belongsTo(Produksi::class, 'produksi_id');
    }

    /**
     * Relasi ke Teknisi
     */
    public function technicians(): BelongsToMany
    {
        return $this->belongsToMany(Technician::class, 'maintenance_technician', 'maintenance_id', 'technician_id');
    }

    /**
     * Logic Otomatis: Sinkronisasi pembaruan dan penghapusan data.
     */
    protected static function booted()
    {
        // Sinkronisasi saat data diupdate di Backend
        static::updated(function ($maintenance) {
            // Jika kolom 'keterangan' diubah, update juga di tabel produksi (Frontend)
            if ($maintenance->isDirty('keterangan') && $maintenance->produksi) {
                $maintenance->produksi->update([
                    'keterangan' => $maintenance->keterangan,
                ]);
            }
        });

        static::deleted(function ($maintenance) {
            // Saat tiket maintenance dihapus di backend (Filament), 
            // hapus juga laporan aslinya di tabel produksi (Frontend)
            if ($maintenance->produksi) {
                $maintenance->produksi()->delete();
            }
        });
    }
}
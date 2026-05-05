<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
 

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
        'keterangan',
        'photo_path',
    ];


         public function maintenance(): HasOne
    {
        return $this->hasOne(Maintenance::class, 'produksi_id');
    }

    /**
     * Logic Otomatis: Saat data produksi dibuat (created), 
     * buat juga baris di tabel maintenance jika belum ada.
     */
    protected static function booted()
    {
        static::created(function ($produksi) {
            // Cek apakah relasi maintenance sudah ada untuk menghindari duplikat
            if (!$produksi->maintenance()->exists()) {
                $produksi->maintenance()->create([
                    'status' => 'Pending',
                    'keterangan' => $produksi->keterangan, // Menyalin kategori (Mekanik/Elektrik)
                ]);
            }
        });

        static::deleted(function ($maintenance) {
        // Saat tiket maintenance dihapus di backend, hapus juga laporan aslinya di produksi
        if ($maintenance->produksi) {
            $maintenance->produksi()->delete();
        }
    });

        static::deleted(function ($produksi) {
            $produksi->maintenance()->delete();
        });
    }
}
    
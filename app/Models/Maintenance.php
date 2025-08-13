<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <-- Penting

class Maintenance extends Model
{
    use HasFactory;

    protected $table = 'maintenance';

    protected $fillable = [
        'produksi_id',
        'waktu_perbaikan',
        'tanggal_selesai',
        'nama_teknisi',
        'jenis_perbaikan',
        'sparepart',
        'keterangan',
        'status',
    ];

    /**
     * Mendefinisikan "jembatan" kembali ke Produksi
     *
     * Fungsi ini memberitahu: "Satu data Maintenance ini dimiliki oleh (belongsTo) satu Laporan Produksi."
     */
    public function produksi(): BelongsTo
    {
        return $this->belongsTo(Produksi::class);
    }
}
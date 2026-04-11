<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;

    protected $table = 'technicians';

    // Izinkan kolom 'name' untuk diisi
    protected $fillable = ['name'];

    // Relasi balik ke Maintenance (Many-to-Many)
    public function maintenances()
    {
        return $this->belongsToMany(Maintenance::class, 'maintenance_technician');
    }
}
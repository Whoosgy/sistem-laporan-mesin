// File: app/Models/Laporan.php

public function maintenance()
{
    // Ganti 'produksi_id' jika nama foreign key di tabel maintenance berbeda
    return $this->hasOne(Maintenance::class, 'produksi_id');
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $technicians = [
        'SUYANTO', 'SAMIJAN', 'FAISAL.K', 'SUGENG', 'ARIF ARYANTO', 'RUSWIDI JOKO',
        'HANI ADNANI', 'TEDDY JHONY WN', 'AGGRIS YAYIT.T', 'M.ASAD RAMADHAN',
        'ANDHI KURNIASYAH', 'WAHYUDIN', 'TARMONO', 'SUAR SAPTO', 'ALI MUSTOFA',
        'ENDANG MULYADI', 'ARI MUHODARI', 'TURIMAN', 'BUDIYANTO', 'RIYAN INDRIYANA RAHARDI',
        'DEDI HARYAWAN', 'UJANG SUDRAJAT', 'DONI RAMADONI', 'RAHMAT HIDAYAT', 'FIRMAN HIDAYAT',
        'M.AZIZ TOYYIBIN', 'BUSTAMI', 'ROHMAN', 'YULIMANSYAH', 'SUJARWO', 'SUYATNO',
        'KASIMIN', 'BAKTI SUDARMONO', 'M.BASORI', 'AGUNG SUSENO', 'WIDODO', 'YAKUB',
        'SUKINO', 'AWALUDIN .F', 'SUPARTA'
    ];

    foreach ($technicians as $name) {
        \App\Models\Technician::updateOrCreate(['name' => $name]);
    }
}
}

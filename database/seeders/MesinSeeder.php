<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mesin;

class MesinSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil data dari file datamesin.php kamu
        $data = include(config_path('datamesin.php'));

        foreach ($data['mesins'] as $plant => $daftarMesin) {
            foreach ($daftarMesin as $namaMesin) {
                Mesin::create([
                    'nama_mesin' => $namaMesin,
                    'plant' => $plant,
                ]);
            }
        }
    }
}
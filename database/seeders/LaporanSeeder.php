<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produksi;
use App\Models\Maintenance;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat 100 laporan produksi palsu
        Produksi::factory(1000)->create()->each(function ($produksi) {
            if (rand(1, 1000) <= 80) {
                $status = ['On Progress', 'Belum Selesai', 'Selesai'][rand(0, 2)];
                $teknisi = ['SUYANTO', 'SAMIJAN', 'FAISAL.K', 'SUGENG', 'ARIF ARYANTO'];

                Maintenance::create([
                    'produksi_id' => $produksi->id,
                    'status' => $status,
                    'waktu_perbaikan' => '09:00',
                    'tanggal_selesai' => ($status === 'Selesai') ? now()->format('Y-m-d') : null,
                    'waktu_selesai' => ($status === 'Selesai') ? '17:00' : null,
                    'nama_teknisi' => json_encode([$teknisi[rand(0, 4)]]),
                    'jenis_perbaikan' => 'Perbaikan ' . $produksi->bagian_rusak,
                    'sparepart' => 'Tidak ada',
                    'keterangan_maintenance' => ['TM', 'TE', 'TU', 'LM', 'LE', 'LU'][rand(0,5)],
                    'keterangan' => 'Tidak ada',
                ]);
            }
        });
    }
}

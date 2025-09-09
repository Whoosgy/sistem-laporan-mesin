<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produksi;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produksi>
 */
class ProduksiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produksi::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Mengambil daftar plant dan mesin dari file konfigurasi
        $plants = config('datamesin.plants');
        $plant = $this->faker->randomElement($plants);

        $mesins = config('datamesin.mesins.' . $plant, []); // Default ke array kosong jika tidak ada

        // PERBAIKAN: Menangani kasus di mana daftar mesin untuk sebuah plant kosong
        if (empty($mesins)) {
            $nama_mesin = 'Mesin Manual (' . $plant . ')';
        } else {
            $nama_mesin = $this->faker->randomElement($mesins);
        }

        $keteranganOptions = ['Mekanik', 'Elektrik', 'Utility', 'Calibraty'];

        return [
            'tanggal_lapor' => $this->faker->dateTimeBetween('-3 months', 'now')->format('Y-m-d'),
            'jam_lapor' => $this->faker->time('H:i'),
            'shift' => $this->faker->randomElement(['1', '2', '3']),
            'nama_pelapor' => $this->faker->name,
            'plant' => $plant,
            'nama_mesin' => $nama_mesin, // Sekarang tidak akan pernah null
            'bagian_rusak' => $this->faker->words(3, true),
            'uraian_kerusakan' => $this->faker->sentence(10),
            'keterangan' => $this->faker->randomElement($keteranganOptions),
            'photo_path' => null, // Biarkan kosong untuk saat ini
        ];
    }
}

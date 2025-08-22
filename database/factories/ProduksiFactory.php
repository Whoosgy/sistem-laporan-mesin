<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produksi>
 */
class ProduksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Daftar contoh data untuk dipilih secara acak
        $plants = ['Extrusion', 'Thermo', 'Printing', 'Injection', 'SS', 'SC', 'PE', 'QC', 'GA'];
        $mesins = ['Mesin A', 'Mesin B', 'Mesin C', 'Mesin D', 'Mesin E'];
        $keterangans = ['M', 'E', 'U', 'C'];
        $bagianRusak = ['Bearing', 'Motor', 'Sensor', 'Conveyor', 'Panel Listrik'];

        return [
            'tanggal_lapor' => $this->faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
            'jam_lapor' => $this->faker->time(),
            'shift' => $this->faker->randomElement(['1', '2', '3']),
            'plant' => $this->faker->randomElement($plants),
            'nama_mesin' => $this->faker->randomElement($mesins) . ' ' . $this->faker->numberBetween(1, 20),
            'nama_pelapor' => $this->faker->name(),
            'bagian_rusak' => $this->faker->randomElement($bagianRusak),
            'uraian_kerusakan' => $this->faker->sentence(10),
            'keterangan' => $this->faker->randomElement($keterangans),
        ];
    }
}

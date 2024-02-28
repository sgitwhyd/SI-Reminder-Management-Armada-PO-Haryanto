<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Armada>
 */
class ArmadaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gambar_armada' => $this->faker->imageUrl(640, 480, 'armada'),
            'no_polisi' => 'AD' . $this->faker->numberBetween(1000, 9999) . $this->faker->randomLetter . $this->faker->randomLetter,
            'no_lambung' => 'HM' . $this->faker->numberBetween(1000, 9999) . $this->faker->randomLetter . $this->faker->randomLetter,
            'no_stnk' => 'STNK' . $this->faker->numberBetween(1000, 9999) . $this->faker->randomLetter . $this->faker->randomLetter,
            'tahun' => $this->faker->year(),
            'trayek' => $this->faker->randomElement(['Jakarta - Bandung', 'Jakarta - Surabaya', 'Jakarta - Semarang', 'Jakarta - Yogyakarta', 'Jakarta - Malang', 'Jakarta - Solo', 'Jakarta - Bali', 'Jakarta - Lombok', 'Jakarta - Banyuwangi', 'Jakarta - Jember', 'Jakarta - Malang', 'Jakarta - Purwokerto', 'Jakarta - Cirebon', 'Jakarta - Tegal', 'Jakarta - Pekalongan', 'Jakarta - Kudus', 'Jakarta - Pati', 'Jakarta - Rembang', 'Jakarta - Blora', 'Jakarta - Tuban', 'Jakarta - Lamongan', 'Jakarta - Gresik', 'Jakarta - Sidoarjo', 'Jakarta - Mojokerto', 'Jakarta - Jombang', 'Jakarta - Nganjuk', 'Jakarta - Madiun', 'Jakarta - Magetan', 'Jakarta - Ngawi', 'Jakarta - Bojonegoro', 'Jakarta - Tulungagung', 'Jakarta - Trenggalek', 'Jakarta - Ponorogo', 'Jakarta - Pacitan', 'Jakarta - Bondowoso', 'Jakarta - Situbondo', 'Jakarta - Probolinggo', 'Jakarta - Pasuruan', 'Jakarta - Lumajang', 'Jakarta - Malang', 'Jakarta - Batu', 'Jakarta - Blitar', 'Jakarta - Kediri', 'Jakarta - Tulungagung', 'Jakarta - Trenggalek', 'Jakarta - Ponorogo', 'Jakarta - Pacitan', 'Jakarta - Bondowoso', 'Jakarta - Situbondo', 'Jakarta - Probolinggo', 'Jakarta - Pasuruan', 'Jakarta - Lumajang', 'Jakarta - Malang', 'Jakarta - Batu', 'Jakarta - Blitar', 'Jakarta - Kediri', 'Jakarta - Tulungagung', 'Jakarta - Trenggalek', 'Jakarta - Ponorogo', 'Jakarta - Pacitan', 'Jakarta - Bondowoso', 'Jakarta - Situbondo', 'Jakarta - Proboling']),
            'jenis_trayek' => $this->faker->randomElement(['AKAP', 'AKDP', 'PARIWISATA', 'MPU']),
        ];
    }
}

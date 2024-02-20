<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sparepart>
 */
class SparepartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_sparepart' => $this->faker->word,
            'nama_sparepart' => $this->faker->word,
            'stock' => $this->faker->randomNumber(),
            'harga' => $this->faker->randomNumber(),
            'status' => $this->faker->randomElement(['READY', 'KOSONG']),
            'keterangan' => $this->faker->word,
        ];
    }
}

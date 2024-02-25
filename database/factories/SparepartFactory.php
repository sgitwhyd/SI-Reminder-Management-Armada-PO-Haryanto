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
            'kode_sparepart' => $this->faker->isbn10(),
            'nama_sparepart' => $this->faker->unique()->sentence(2, true),
            'stock' => $this->faker->numberBetween(1, 50),
            'harga' => $this->faker->randomNumber(6, false),
            'status' => $this->faker->randomElement(['READY', 'KOSONG']),
            'keterangan' => $this->faker->sentence(5, true),
        ];
    }
}
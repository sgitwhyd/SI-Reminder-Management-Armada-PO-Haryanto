<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perbaikan>
 */
class PerbaikanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_armada' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'tanggal' => $this->faker->date(),
            'biaya' => $this->faker->randomNumber(),
            'keterangan' => $this->faker->word,
            'status' => $this->faker->randomElement(['selesai', 'menunggu konfirmasi kepala gudang']),
        ];
    }
}

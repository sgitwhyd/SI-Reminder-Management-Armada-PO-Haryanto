<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\M_perawatan>
 */
class PerawatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal' => $this->faker->date(),
            'id_armada' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'oli_gardan' => $this->faker->numberBetween(1, 3000),
            'oli_mesin' => $this->faker->numberBetween(1, 3000),
            'oli_transmisi' => $this->faker->numberBetween(1, 3000),
            'status' => $this->faker->randomElement(['selesai', 'menunggu konfirmasi kepala gudang']),
        ];
    }
}

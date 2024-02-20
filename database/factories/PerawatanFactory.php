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
            'oli_gardan' => $this->faker->word,
            'oli_mesin' => $this->faker->word,
            'oli_transmisi' => $this->faker->word,
            'status' => $this->faker->randomElement(['selesai', 'menunggu konfirmasi kepala gudang']),
        ];
    }
}

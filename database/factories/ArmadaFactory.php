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
            'no_polisi' => $this->faker->word,
            'no_lambung' => $this->faker->word,
            'no_stnk' => $this->faker->word,
            'tahun' => $this->faker->year(),
            'trayek' => $this->faker->word,
            'jenis_trayek' => $this->faker->randomElement(['AKAP', 'AKDP', 'PARIWISATA', 'MPU']),
        ];
    }
}

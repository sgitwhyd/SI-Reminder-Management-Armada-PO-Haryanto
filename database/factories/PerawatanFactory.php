<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

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
            'tanggal' => Carbon::now()->toDateString(),
            'id_armada' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'oli_gardan' => Carbon::now()->toDateString(),
            'oli_mesin' => Carbon::now()->addDays(5)->toDateString(),
            'oli_transmisi' => Carbon::now()->toDateString(),
        ];
    }
}

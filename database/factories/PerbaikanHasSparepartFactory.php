<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PerbaikanHasSparepart>
 */
class PerbaikanHasSparepartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'perbaikan_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'sparepart_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
        ];
    }
}

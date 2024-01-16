<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RekamMedisHasObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rekam_medis_id' => $this->faker->numberBetween(1, 10),
            'obat_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}

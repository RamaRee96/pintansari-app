<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RekamMedis>
 */
class RekamMedisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'patient_id' => $this->faker->numberBetween(1, 10),
            'diagnosa' => $this->faker->text,
            'keluhan' => $this->faker->sentence,
            'anamesis' => $this->faker->text,
            'keterangan' => $this->faker->text,
            'berat' => $this->faker->numberBetween(40, 100),
            'tinggi' => $this->faker->numberBetween(140, 200),
            'tensi' => $this->faker->randomNumber(3) . '/' . $this->faker->randomNumber(2),
            'status' => $this->faker->randomElement(['antri', 'sudah diperiksa']),
        ];
    }
}

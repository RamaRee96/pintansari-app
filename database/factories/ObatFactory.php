<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class ObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->word,
            'harga' => $this->faker->numberBetween(10, 1000),
            'kandungan' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['tersedia', 'tidak tersedia']),
            'stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}

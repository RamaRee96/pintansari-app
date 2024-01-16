<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'nama' => $this->faker->name,
           'usia' => $this->faker->numberBetween(1, 100),
           'jenis_kelamin' => $this->faker->randomElement(['pria', 'wanita']),
           'tanggal_lahir' => $this->faker->date,
           'alamat' => $this->faker->address,
           'no_telp' => $this->faker->phoneNumber,
           'pekerjaan' => $this->faker->jobTitle,
      ];

    }
}

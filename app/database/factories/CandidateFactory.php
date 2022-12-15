<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName() . $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'level' => $this->faker->randomElement(['medio', 'tecnico', 'superior']),
            'area' => $this->faker->sentence(2,true),
            'expected_salary' => $this->faker->numberBetween(1000,20000),
        ];
    }
}

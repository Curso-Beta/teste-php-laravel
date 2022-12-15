<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpportunityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'contract_type' => $this->faker->randomElement(['clt', 'pj', 'freelancer']),
            'accepts_applications' => $this->faker->boolean(85),
            'offered_salary' => $this->faker->numberBetween(1000, 20000),
            'company_id' => Company::factory(),
        ];
    }
}

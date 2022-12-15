<?php

namespace Database\Factories;

use App\Models\Candidate;
use App\Models\Opportunity;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'candidate_id' => Candidate::factory(),
            'opportunity_id' => Opportunity::factory(),
        ];
    }
}

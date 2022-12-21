<?php

namespace Database\Factories;

use App\Models\Vacancy;
use App\Models\Candidate;
use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Application::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => fn () => Candidate::factory()->create()->id,
            'vacancy_id' => fn () => Vacancy::factory()->create()->id,
        ];
    }
}

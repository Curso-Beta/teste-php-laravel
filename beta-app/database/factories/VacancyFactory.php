<?php

namespace Database\Factories;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacancyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vacancy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = sprintf('%s %s', $this->faker->firstName(), $this->faker->lastName);

        return [
            'name' => fn () => $name,
            'type_vacancy' => 1, 
            'status' => 1
        ];
    }
}

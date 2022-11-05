<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VagaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descricao'=>'Vaga teste',
            'tipo'=>'CLT',
            'status'=>'Ativo',
            'salario'=>'1200', 
        ];
    }
}

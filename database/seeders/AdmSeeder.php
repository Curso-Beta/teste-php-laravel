<?php

namespace Database\Seeders;

use App\Models\Adm;
use Illuminate\Database\Seeder;

class AdmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adm = new Adm();
        $adm->email ='adm@email.com';
        $adm->senha = '1234';
        $adm->save();

        \App\Models\Vaga::factory()->count(3)->create();
         
    }

}

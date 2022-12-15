<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seeders = [
            UserSeeder::class,
            CompanySeeder::class,
            CandidateSeeder::class,
            OpportunitySeeder::class,
        ];
        $this->call($seeders);
    }
}
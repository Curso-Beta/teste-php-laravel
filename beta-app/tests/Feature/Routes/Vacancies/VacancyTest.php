<?php

namespace Tests\Feature\Routes\Vacancies;

use Tests\TestCase;
use App\Models\Vacancy;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VacancyTest extends TestCase
{
    use DatabaseTransactions;

     /**
     * @group vacancies
     */
    public function testListVacanciesWithSuccess()
    {
        $vacancy = Vacancy::factory()->create();

        $response = $this
            ->get(
                route('vacancies.index', []),
            );

        $response->assertStatus(200);
    }
}

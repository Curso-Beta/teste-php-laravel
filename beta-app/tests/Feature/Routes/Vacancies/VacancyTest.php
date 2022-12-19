<?php

namespace Tests\Feature\Routes\Candidates;

use Tests\TestCase;
use App\Models\Vacancy;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CourseTest extends TestCase
{
    use DatabaseTransactions;

     /**
     * @group vacancies
     */
    public function testListVacanciesWithSucess()
    {
        $vacancy = Vacancy::factory()->create();

        $response = $this
            ->get(
                route('vacancies.index', []),
            );

        $response->assertStatus(200);
    }
}

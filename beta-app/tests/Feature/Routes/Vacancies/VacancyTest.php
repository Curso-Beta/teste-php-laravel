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
     * @group candidates
     */
    public function testListCandidateWithSucess()
    {
        $vacancy = Vacancy::factory()->create();

        $response = $this
            ->get(
                route('vacancies.index', []),
            );

        $response->assertStatus(200);
    }
}

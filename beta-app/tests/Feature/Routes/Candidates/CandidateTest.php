<?php

namespace Tests\Feature\Routes\Candidates;

use Tests\TestCase;
use App\Models\Candidate;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Scaffold\Course\Models\Course;
use Scaffold\Auth\Shared\Enums\UserTypeEnum;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CourseTest extends TestCase
{
    use DatabaseTransactions;

     /**
     * @group candidates
     */
    public function testListCandidateWithSucess()
    {
        $candidate = Candidate::factory()->create();

        $response = $this
            ->get(
                route('candidates.index', []),
            );

        $response->assertStatus(200);
    }
}

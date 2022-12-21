<?php

namespace Tests\Feature\Routes\Candidates;

use Tests\TestCase;
use App\Models\Candidate;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CandidateTest extends TestCase
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

    /**
     * @group candidates
     */
    public function testCreateCandidateWithSucess()
    {
        $candidate = Candidate::factory()->create();

        $data = [
            'name' => 'Ramon'
        ];

        $response =  $this->followingRedirects()
            ->post(
                route('candidates.store', $data),
            );

        $response->assertStatus(200);
    }

    /**
     * @group candidates
     */
    public function testUpdateCandidateWithSucess()
    {
        $candidate = Candidate::factory()->create();

        $data = [
            'name' => 'Ramon',
            'candidate' => $candidate
        ];

        $response = $this->followingRedirects()
            ->patch(
                route('candidates.update', $data, $candidate),
            );

        $response->assertStatus(200);
    }

    /**
     * @group candidates
     */
    public function testDestroyCandidateWithSucess()
    {
        $candidate = Candidate::factory()->create();

        $response = $this->followingRedirects()
            ->delete(
                route('candidates.destroy', $candidate),
            );

        $response->assertStatus(200);
    }
}

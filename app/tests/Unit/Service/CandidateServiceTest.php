<?php

namespace Tests\Unit\Service;

use App\Models\Candidate;
use App\Services\CandidateService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Mockery;
use Tests\TestCase;

class CandidateServiceTest extends TestCase
{
    protected $candidateMock;
    protected $service;

    protected function setUp(): void{
        parent::setUp();
        $this->candidateMock = Mockery::mock(Candidate::class);
        $this->service = new CandidateService($this->candidateMock);
    }

    public function test_candidate_list()
    {
        $data = [
            "limit" => 10,
            "orderBy" => "id",
            "sortedBy" => "asc",
        ];
        $this->candidateMock->shouldReceive('paginate')->andReturn(Mockery::mock(Paginator::class));
        $response = $this->service->list($data);
        $this->assertInstanceOf(LengthAwarePaginator::class, $response);
    }

    public function test_candidate_create()
    {
        $data = [
            "name"=>"teste",
            "email"=>"teste@teste",
            "phone"=>"2937600",
            "area"=>"tecnologia",
            "level"=>"tecnico",
            "expected_salary"=>8253,
        ];
        $this->candidateMock->shouldReceive('save')->with($data)->andReturn(Candidate::class);
        $response = $this->service->createCandidate($data);
        $this->assertInstanceOf(Candidate::class, $response);
    }

    public function test_candidate_update()
    {
        $data = [
            "name"=>"teste",
            "email"=>"teste@teste",
            "phone"=>"2937600",
            "area"=>"tecnologia",
            "level"=>"tecnico",
            "expected_salary"=>8253,
        ];
        $this->candidateMock->shouldReceive('update')->with($data)->andReturn(Candidate::class);
        $response = $this->service->updateCandidate($this->candidateMock, $data);
        $this->assertInstanceOf(Candidate::class, $response);
    }

    public function test_candidate_delete()
    {
        $this->candidateMock->shouldReceive('getAttribute')->with('id')->andReturn(1);
        $this->candidateMock->shouldReceive('destroy')->with($this->candidateMock->id)->andReturn();
        $this->service->deleteById($this->candidateMock->id);
        $this->assertDeleted('candidates', ['id'=>1]);
    }

}

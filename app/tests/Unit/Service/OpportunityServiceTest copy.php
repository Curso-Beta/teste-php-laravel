<?php

namespace Tests\Unit\Service;

use App\Models\Opportunity;
use App\Services\OpportunityService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Mockery;
use Tests\TestCase;

class OpportunityServiceTest extends TestCase
{
    protected $opportunityMock;
    protected $service;

    protected function setUp(): void{
        parent::setUp();
        $this->opportunityMock = Mockery::mock(Opportunity::class);
        $this->service = new OpportunityService($this->opportunityMock);
    }

    public function test_opportunity_list()
    {
        $this->opportunityMock->shouldReceive('paginate')->andReturn(Mockery::mock(Paginator::class));
        $response = $this->service->list(15);
        $this->assertInstanceOf(LengthAwarePaginator::class, $response);
    }

    public function test_opportunity_create()
    {
        $data = [
            "contract_type"=>"clt",
            "accepts_applications"=>true,
            "offered_salary"=>13500,
        ];
        $this->opportunityMock->shouldReceive('save')->with($data)->andReturn(Opportunity::class);
        $response = $this->service->createOpportunity($data);
        $this->assertInstanceOf(Opportunity::class, $response);
    }

    public function test_opportunity_update()
    {
        $data = [
            "contract_type"=>"clt",
            "accepts_applications"=>true,
            "offered_salary"=>13500,
        ];
        $this->opportunityMock->shouldReceive('update')->with($data)->andReturn(Opportunity::class);
        $response = $this->service->updateOpportunity($this->opportunityMock, $data);
        $this->assertInstanceOf(Opportunity::class, $response);
    }

    public function test_opportunity_delete()
    {
        $this->opportunityMock->shouldReceive('getAttribute')->with('id')->andReturn(1);
        $this->opportunityMock->shouldReceive('destroy')->with($this->opportunityMock->id)->andReturn();
        $this->service->deleteById($this->opportunityMock->id);
        $this->assertDeleted('opportunitys', ['id'=>1]);
    }

}

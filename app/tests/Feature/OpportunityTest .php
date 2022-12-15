<?php

namespace Tests\Feature;

use App\Models\Opportunity;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class OpportunityTest extends TestCase
{
    private $baseRoute = "/api/opportunities";

    public function setUp(): void{
        parent::setUp();
    }

    public function test_retrieve_opportunitys_list()
    {
        $response = $this->get($this->baseRoute);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data')
            ->has('links')
            ->has('meta')
        );
        $response->assertStatus(200);
    }

    public function test_opportunity_show()
    {
        $model = Opportunity::factory()->create();
        $route = $this->baseRoute . '/' . $model->id;
        $arrayedModel = [
            'id' => $model->id,
            'contract_type' => $model->contract_type,
            'accepts_applications' => $model->accepts_applications,
            'offered_salary' => $model->offered_salary,
        ];
        $response = $this->get($route);
        $response->assertJson($arrayedModel);
        $response->assertStatus(200);
    }

    public function test_opportunity_create()
    {
        $data = [
            'contract_type' => 'clt',
            'accepts_applications' => 'true',
            'offered_salary' => 1200
        ];
        $response = $this->post($this->baseRoute, $data);
        $response->assertStatus(201);
    }

    public function test_opportunity_update()
    {
        $data = [
            'contract_type' => 'clt',
            'accepts_applications' => 'true',
            'offered_salary' => 1200
        ];
        $model = Opportunity::factory()->create();
        $route = $this->baseRoute . '/' . $model->id;
        $response = $this->put($route, $data);
        $response->assertStatus(202);
    }

    public function test_opportunity_delete()
    {
        $model = Opportunity::factory()->create();
        $route = $this->baseRoute . '/' . $model->id;
        $response = $this->delete($route);
        $response->assertStatus(204);
    }
}

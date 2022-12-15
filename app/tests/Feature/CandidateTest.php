<?php

namespace Tests\Feature;

use App\Models\Candidate;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CandidateTest extends TestCase
{
    private $baseRoute = "/api/candidates";

    public function setUp(): void{
        parent::setUp();
    }

    public function test_retrieve_candidates_list()
    {
        $response = $this->get($this->baseRoute);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data')
            ->has('links')
            ->has('meta')
        );
        $response->assertStatus(200);
    }

    public function test_candidate_show()
    {
        $model = Candidate::factory()->create();
        $route = $this->baseRoute . '/' . $model->id;
        $arrayedModel = [
            'id' => $model->id,
            'name' => $model->name,
            'email' => $model->email,
            'phone' => $model->phone,
            'area' => $model->area,
            'level' => $model->level,
            'expected_salary' => $model->expected_salary,
        ];
        $response = $this->get($route);
        $response->assertJson($arrayedModel);
        $response->assertStatus(200);
    }

    public function test_candidate_create()
    {
        $data = [
            'name' => 'name',
            'email' => 'email@teste.com',
            'phone' => 'phone',
            'area' => 'area',
            'level' => 'tecnico',
            'expected_salary' => 12000,
        ];
        $response = $this->post($this->baseRoute, $data);
        $response->assertStatus(201);
    }

    public function test_candidate_update()
    {
        $data = [
            'name' => 'name',
            'email' => 'email@teste.com',
            'phone' => 'phone',
            'area' => 'area',
            'level' => 'tecnico',
            'expected_salary' => 98180,
        ];
        $model = Candidate::factory()->create();
        $route = $this->baseRoute . '/' . $model->id;
        $response = $this->put($route, $data);
        $response->assertStatus(202);
    }

    public function test_candidate_delete()
    {
        $model = Candidate::factory()->create();
        $route = $this->baseRoute . '/' . $model->id;
        $response = $this->delete($route);
        $response->assertStatus(204);
    }
}

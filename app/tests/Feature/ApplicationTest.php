<?php

namespace Tests\Feature;

use App\Models\Application;
use App\Models\Candidate;
use App\Models\Opportunity;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ApplicationTest extends TestCase
{
    private $baseRoute = "/api/applications";

    public function setUp(): void{
        parent::setUp();
    }

    public function test_retrieve_applications_list()
    {
        $response = $this->get($this->baseRoute);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data')
            ->has('links')
            ->has('meta')
        );
        $response->assertStatus(200);
    }

    public function test_application_show()
    {
        $model = Application::factory()->create();
        $route = $this->baseRoute . '/' . $model->id;
        $arrayedModel = [
            'id' => $model->id,
            'candidate' => $model->candidate->name,
            'opportunity' => $model->opportunity->contract_type." - ".$model->opportunity->offered_salary,
        ];
        $response = $this->get($route);
        $response->assertJson($arrayedModel);
        $response->assertStatus(200);
    }

    public function test_application_update()
    {
        $data = [
            "candidate_id" => 1,
            "opportunity_id"=>3,
        ];
        $model = Application::factory()->create();
        $route = $this->baseRoute . '/' . $model->id;
        $response = $this->put($route, $data);
        $response->assertStatus(202);
    }

    public function test_application_delete()
    {
        $model = Application::factory()->create();
        $route = $this->baseRoute . '/' . $model->id;
        $response = $this->delete($route);
        $response->assertStatus(204);
    }
}

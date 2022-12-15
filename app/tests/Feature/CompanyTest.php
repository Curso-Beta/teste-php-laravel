<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    private $baseRoute = "/api/companies";

    public function setUp(): void{
        parent::setUp();
    }

    public function test_retrieve_companys_list()
    {
        $response = $this->get($this->baseRoute);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data')
            ->has('links')
            ->has('meta')
        );
        $response->assertStatus(200);
    }

    public function test_company_show()
    {
        $model = Company::factory()->create();
        $route = $this->baseRoute . '/' . $model->id;
        $arrayedModel = [
            'id' => $model->id,
            'name' => $model->name,
        ];
        $response = $this->get($route);
        $response->assertJson($arrayedModel);
        $response->assertStatus(200);
    }

    public function test_company_create()
    {
        $data = [
            "name"=>"NameTest",
        ];
        $response = $this->post($this->baseRoute, $data);
        $response->assertStatus(201);
    }

    public function test_company_update()
    {
        $data = [
            "name"=>"Test Name",
        ];
        $model = Company::factory()->create();
        $route = $this->baseRoute . '/' . $model->id;
        $response = $this->put($route, $data);
        $response->assertStatus(202);
    }

    public function test_company_delete()
    {
        $model = Company::factory()->create();
        $route = $this->baseRoute . '/' . $model->id;
        $response = $this->delete($route);
        $response->assertStatus(204);
    }
}

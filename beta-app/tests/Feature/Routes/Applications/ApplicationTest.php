<?php

namespace Tests\Feature\Routes\Application;

use Tests\TestCase;
use App\Models\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApplicationTest extends TestCase
{
    use DatabaseTransactions;

     /**
     * @group application
     */
    public function testCreateApplicationWithSuccess()
    {
        $application = Application::factory()->create();

        $response = $this
            ->get(
                route('applications.store', $application),
            );

        $response->assertStatus(200);
    }
}

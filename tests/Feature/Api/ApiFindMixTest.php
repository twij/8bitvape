<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiFindMixTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Find Mix API endpoint
     *
     * @return void
     */
    public function testFindMix()
    {
        $this->seed();
        
        $response = $this->get('/api/mix/find/tropical');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["name" => "Tropical Space Pirate"]
            );

        $response = $this->get('/api/mix/find/invalid');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["error" => "not found"]
            );
    }
}

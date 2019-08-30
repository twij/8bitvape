<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiGetMixTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test getting a mix from api
     *
     * @return void
     */
    public function testApiGetMix()
    {
        $this->seed();

        $response = $this->get('/api/mix/spacepirate');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["name" => "Tropical Space Pirate"]
            );

        $response = $this->get('/api/mix/invalid');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["error" => "not found"]
            );
    }
}

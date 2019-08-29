<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiSearchNameTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test searching a name via api
     *
     * @return void
     */
    public function testSearchName()
    {
        $this->seed();
        
        $response = $this->get('/api/mix/search/space');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["0" => ["name" => "Tropical Space Pirate"]]
            );

        $response = $this->get('/api/mix/search/invalid');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["error" => "not found"]
            );
    }
}

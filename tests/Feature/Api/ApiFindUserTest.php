<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiFindUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Find User API endpoint
     *
     * @return void
     */
    public function testFindUser()
    {
        $this->seed();
        
        $response = $this->get('/api/user/find/barf');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["name" => "barf"]
            );

        $response = $this->get('/api/mix/find/invalid');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["error" => "not found"]
            );
    }
}

<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiGetUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test getting a user from the api
     *
     * @return void
     */
    public function testGetUser()
    {
        $this->seed();
        
        $response = $this->get('/api/user/barf');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["name" => "barf"]
            );

        $response = $this->get('/api/user/invalid');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["error" => "not found"]
            );
    }
}

<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class ApiGetUserTest extends TestCase
{
    /**
     * Test getting a user from the api
     *
     * @return void
     */
    public function testGetUser()
    {
        $response = $this->get('/api/user/barf');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["name" => "barf"]
            );

        $response = $this->get('/api/user/not a user');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["error" => "not found"]
            );
    }
}

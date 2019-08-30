<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiGetFlavourTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test getting a flavour via api
     *
     * @return void
     */
    public function testGetFlavour()
    {
        $this->seed();

        $response = $this->get('/api/flavour/lime');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["name" => "Lime"]
            );

        $response = $this->get('/api/flavour/invalid');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["error" => "not found"]
            );
    }
}

<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class ApiGetFlavourTest extends TestCase
{
    /**
     * Test getting a flavour via api
     *
     * @return void
     */
    public function testGetFlavour()
    {
        $response = $this->get('/api/flavour/spacepirate');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["name" => "Tropical Space Pirate"]
            );

        $response = $this->get('/api/flavour/iuhsdiuhsdiufh');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["error" => "not found"]
            );
    }
}

<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class ApiSearchNameTest extends TestCase
{
    /**
     * Test searching a name via api
     *
     * @return void
     */
    public function testSearchName()
    {
        $response = $this->get('/api/mix/search/space');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["0" => ["name" => "Tropical Space Pirate"]]
            );

        $response = $this->get('/api/mix/search/*&^$*&');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["error" => "not found"]
            );
    }
}

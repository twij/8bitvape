<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class ApiGetCommentsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetComments()
    {
        $response = $this->get('/api/comments/spacepirate');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["name" => "Tropical Space Pirate"]
            );

        $response = $this->get('/api/comments/&£^$^');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["error" => "not found"]
            );
    }
}

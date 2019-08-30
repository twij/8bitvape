<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiGetCommentsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetComments()
    {
        $this->seed();
        
        $response = $this->get('/api/comments/spacepirate');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["name" => "Tropical Space Pirate"]
            );

        $response = $this->get('/api/comments/invalid');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["error" => "not found"]
            );
    }
}

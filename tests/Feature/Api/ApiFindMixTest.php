<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class ApiFindMixTest extends TestCase
{
    /**
     * Test Find Mix API endpoint
     *
     * @return void
     */
    public function testFindMix()
    {
        $response = $this->get('/api/mix/find/tropical');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["name" => "Tropical Space Pirate"]
            );

        $response = $this->get('/api/mix/find/&£^$^');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["error" => "not found"]
            );
    }
}

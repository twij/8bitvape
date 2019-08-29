<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class ApiGetMixTest extends TestCase
{
    /**
     * Test getting a mix from api
     *
     * @return void
     */
    public function testApiGetMix()
    {
        $response = $this->get('/api/mix/spacepirate');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["name" => "Tropical Space Pirate"]
            );

        $response = $this->get('/api/mix/&£^$^');

        $response
            ->assertStatus(200)
            ->assertJson(
                ["error" => "not found"]
            );
    }
}

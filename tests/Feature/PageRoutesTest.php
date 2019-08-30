<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageRoutesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test route status
     *
     * @return void
     */
    public function testRoutes()
    {
        $this->seed();

        $response = $this->get('/');

        $response->assertStatus(200);

        $response = $this->get('/?search=space');

        $response->assertStatus(200);

        $response = $this->get('/?user=barf');

        $response->assertStatus(200);

        $response = $this->get('/?order=name&direction=DESC&contains=passionfruit&user=barf&search=test');

        $response->assertStatus(200);

        $response = $this->get('/mix/spacepirate');

        $response->assertStatus(200);

        $response = $this->get('/mix/invalid');

        $response->assertStatus(404);
    }
}

<?php

namespace Tests\Feature\Routes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MixTest extends TestCase
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

        $response = $this->get('/mix/spacepirate');
        $response->assertStatus(200);
        $response->assertViewHas('mix');
        $mix = $response->original->getData()['mix'];
        $this->assertInstanceOf('App\Jobs\MixJuice', $mix);

        $response = $this->get('/mix/invalid');
        $response->assertStatus(404);
    }
}

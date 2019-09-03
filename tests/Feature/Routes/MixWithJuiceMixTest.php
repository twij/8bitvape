<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MixWithJuiceMixTest extends TestCase
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

        $response = $this->get('/mix/spacepirate?quantity=2000&vg=60&pg=40&strength=8&base-strength=50&base-type=VG');
        $response->assertStatus(200);
        $response->assertViewHas('mix');
        $mix = $response->original->getData()['mix'];
        $this->assertInstanceOf('App\Jobs\MixJuice', $mix);
        $this->assertAttributeEquals(2000, 'quantity', $mix);
        $this->assertAttributeEquals(60.0, 'vg', $mix);
        $this->assertAttributeEquals(40.0, 'pg', $mix);
        $this->assertAttributeEquals(50.0, 'base_strength', $mix);
        $this->assertAttributeEquals(8.0, 'strength', $mix);
        $this->assertAttributeEquals(16.00, 'nicotine_percent', $mix);
        $this->assertAttributeEquals(880.0, 'vg_amount', $mix);
        $this->assertAttributeEquals(400.0, 'pg_amount', $mix);
        $this->assertArrayHasKey('name', $mix->flavours[0]);
        $this->assertArrayHasKey('slug', $mix->flavours[0]);
        $this->assertArrayHasKey('company', $mix->flavours[0]);
        $this->assertArrayHasKey('amount', $mix->flavours[0]);
        $this->assertArrayHasKey('percent', $mix->flavours[0]);
        $this->assertEquals('Pineapple', $mix->flavours[0]['name']);
        $this->assertEquals('pineapple', $mix->flavours[0]['slug']);
        $this->assertEquals('Cupcake World', $mix->flavours[0]['company']);
        $this->assertEquals(100.0, $mix->flavours[0]['amount']);
        $this->assertEquals('5', $mix->flavours[0]['percent']);

        $response = $this->get('/mix/invalid');
        $response->assertStatus(404);
    }
}

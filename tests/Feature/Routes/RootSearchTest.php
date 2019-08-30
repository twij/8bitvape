<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RootSearchTest extends TestCase
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

        $response = $this->get('/?search=space');
        $response->assertStatus(200);
        $response->assertViewHas('mixes');
        $response->assertViewHas('flavours');
        $response->assertViewHas('users');
        $mixes = $response->original->getData()['mixes'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $mixes);
    }
}

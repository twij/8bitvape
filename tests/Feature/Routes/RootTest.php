<?php

namespace Tests\Feature\Routes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RootTest extends TestCase
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
        $response->assertViewHas('mixes');
        $response->assertViewHas('flavours');
        $response->assertViewHas('users');
        $mixes = $response->original->getData()['mixes'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $mixes);
    }
}

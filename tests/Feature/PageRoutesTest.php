<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageRoutesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->seed();

        $response = $this->get('/');

        $response->assertStatus(200);

        $response = $this->get('/mix/spacepirate');

        $response->assertStatus(200);
    }
}

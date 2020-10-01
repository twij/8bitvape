<?php

namespace Tests\Unit\Jobs;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Jobs\MixJuice;
use App\Models\Mix;

class MixJuiceGetAmountTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetAmount()
    {
        $this->seed();

        $mix = Mix::find(1);
        $input = [];
        $job = new MixJuice($mix, $input);

        $amount = $job->getAmount(10.00);

        $this->assertEquals(3.0, $amount);
    }
}

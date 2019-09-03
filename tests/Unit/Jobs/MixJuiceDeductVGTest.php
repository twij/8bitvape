<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Jobs\MixJuice;
use App\Models\Mix;

class MixJuiceDeductVG extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testDeductVG()
    {
        $this->seed();

        $mix = Mix::find(1);
        $input = [];
        $job = new MixJuice($mix, $input);

        $job->vg_amount = 100;
        $job->pg_amount = 100;

        $job->deductVG(10.00);
        $this->assertEquals(90.0, $job->vg_amount);

        $job->deductVG(100.00);
        $this->assertEquals(0.0, $job->vg_amount);
        $this->assertEquals(90.0, $job->pg_amount);
    }
}

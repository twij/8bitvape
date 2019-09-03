<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Mix;
use App\Jobs\MixJuice;

class MixJuiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMixJuice()
    {
        $this->seed();

        $mix = Mix::find(1);

        $this->assertInstanceOf('\App\Models\Mix', $mix);

        $input = [];

        $mix_juice = MixJuice::dispatchNow($mix, $input);

        $this->assertInstanceOf('\App\Jobs\MixJuice', $mix_juice);

        $this->assertObjectHasAttribute('quantity', $mix_juice);
        $this->assertObjectHasAttribute('vg', $mix_juice);
        $this->assertObjectHasAttribute('pg', $mix_juice);
        $this->assertObjectHasAttribute('base_strength', $mix_juice);
        $this->assertObjectHasAttribute('strength', $mix_juice);
        $this->assertObjectHasAttribute('nicotine_percent', $mix_juice);
        $this->assertObjectHasAttribute('nicotine_ml', $mix_juice);
        $this->assertObjectHasAttribute('vg_amount', $mix_juice);
        $this->assertObjectHasAttribute('pg_amount', $mix_juice);
        $this->assertObjectHasAttribute('flavours', $mix_juice);
        $this->assertObjectHasAttribute('options', $mix_juice);
        $this->assertObjectHasAttribute('mix', $mix_juice);
    }
}

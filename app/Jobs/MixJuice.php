<?php

namespace App\Jobs;

use App\Models\Mix;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class MixJuice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mix;
    protected $options;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        Mix $mix,
        Array $options
    ) {
        $this->mix = $mix;
        $this->options = $options;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $quantity = array_key_exists('quantity', $this->options) ? $this->options['quantity'] : 30;
        $vg = array_key_exists('vg', $this->options) ? $this->options['vg'] : 80;
        $pg = array_key_exists('pg', $this->options) ? $this->options['pg'] : 20;
        $base_strength = array_key_exists('base-strength', $this->options) ? $this->options['base-strength'] : 72;
        $base_type = array_key_exists('base-type', $this->options) ? $this->options['base-type'] : 'VG';
        $strength = array_key_exists('strength', $this->options) ? $this->options['strength'] : 6;

        $nicotine_percent = number_format(($strength / $base_strength) * 100, 2);

        return 'hello';
        //dd($nicotine_percent);
    }
}

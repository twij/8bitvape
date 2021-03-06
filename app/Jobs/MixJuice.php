<?php

namespace App\Jobs;

use App\Models\Mix;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Collection;

class MixJuice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $mix;
    public $options;

    public $quantity;
    public $vg;
    public $pg;
    public $base_strength;
    public $base_type;
    public $strength;
    public $nicotine_percent;
    public $nicotine_ml;
    public $vg_amount;
    public $pg_amount;
    public $flavours;

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
        $this->quantity = array_key_exists('quantity', $this->options) ? (Float)$this->options['quantity'] : 30;
        $this->vg = array_key_exists('vg', $this->options) ? (Float)$this->options['vg'] : 0;
        $this->pg = array_key_exists('pg', $this->options) ? (Float)$this->options['pg'] : 0;
        $this->base_strength = array_key_exists(
            'base-strength',
            $this->options
        ) ? (Float)$this->options['base-strength'] : 72;
        $this->base_type = array_key_exists('base-type', $this->options) ? $this->options['base-type'] : 'VG';
        $this->strength = array_key_exists('strength', $this->options) ? (Float)$this->options['strength'] : 6;

        if ($this->pg == 0 && $this->vg == 0) {
            $this->vg = 80;
            $this->pg = 20;
        }

        if ($this->pg == 0 && !$this->vg == 100) {
            $this->pg = 100 - $this->vg;
        }

        if ($this->vg == 0 && !$this->pg == 100) {
            $this->vg = 100 - $this->pg;
        }

        if ($this->vg + $this->pg != 100) {
            $this->vg = 80;
            $this->pg = 20;
        }
    }

    /**
     * Execute the job.
     *
     * @return MixJuice
     */
    public function handle()
    {
        $this->nicotine_percent = number_format(($this->strength / $this->base_strength) * 100, 2);
        $this->nicotine_ml = $this->getAmount((Float)$this->nicotine_percent);

        $this->vg_amount = $this->getAmount((Float)$this->vg);
        $this->pg_amount = $this->getAmount((Float)$this->pg);

        if ($this->base_type == "VG") {
            $this->deductVG((Float)$this->nicotine_ml);
        } else {
            $this->deductPG((Float)$this->nicotine_ml);
        }

        $this->flavours = new Collection();

        foreach ($this->mix->flavours as $flavour) {
            $flavour_amount = $this->getAmount((Float)$flavour->pivot->percentage);
            $this->deductPG((Float)$flavour_amount);
            $flavour = [
                'name' => $flavour->name,
                'slug' => $flavour->slug,
                'company' => $flavour->company->name,
                'amount' => $flavour_amount,
                'percent' => $flavour->pivot->percentage
            ];
            $this->flavours->push($flavour);
        }

        return $this;
    }

    /**
     * Get amount from percentage
     *
     * @param Float $percent
     *
     * @return Float Amount in ml
     */
    public function getAmount($percent): Float
    {
        return (Float)($percent * $this->quantity) / 100;
    }

    /**
     * Remove PG from total mix
     *
     * @param Float $amount Amount to remove
     *
     * @return void
     */
    public function deductPG(Float $amount)
    {
        $this->pg_amount -= $amount;
        if ($this->pg_amount < 0) {
            $this->vg_amount += $this->pg_amount ;
            $this->pg_amount = 0;
        }
    }

    /**
     * Deduct VG from total mix
     *
     * @param Float $amount Amount to remove
     *
     * @return void
     */
    public function deductVG(Float $amount)
    {
        $this->vg_amount -= $amount;
        if ($this->vg_amount < 0) {
            $this->pg_amount += $this->vg_amount;
            $this->vg_amount = 0;
        }
    }
}

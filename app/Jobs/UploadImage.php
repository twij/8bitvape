<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class UploadImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $input;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        Array $input
    ) {
        $this->input = $input;
    }

    /**
     * Execute the job.
     *
     * @return \App\Models\Image Image model
     */
    public function handle(): ?\App\Models\Image
    {
        $path = Storage::putFile('images', $this->input['image']);

        if ($path) {
            $image = new Image();
            $image->name = $this->input['name'];
            $image->alt_text = $this->input['alt_text'];
            $image->path = $path;
            $image->save();
            return $image;
        } else {
            return null;
        }
    }
}

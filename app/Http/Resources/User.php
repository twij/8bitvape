<?php namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->username,
            'xp' => $this->xp,
            'mixes' => $this->mixes->map(
                function ($mix) {
                    return [
                        'name' => $mix->name,
                        'slug' => $mix->slug,
                    ];
                }
            )
        ];
    }
}

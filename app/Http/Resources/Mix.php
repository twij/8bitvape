<?php namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Mix extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'user' => $this->user->username,
            'description' => strip_tags($this->description),
            'flavours' => $this->flavours->map(
                function ($flavour) {
                    return [
                        'name' => $flavour->name,
                        'company' => $flavour->company->name,
                        'percentage' => $flavour->pivot->percentage
                    ];
                }
            )
        ];
    }
}

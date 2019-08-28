<?php namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Flavour extends JsonResource
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
            'company' => $this->company->name,
            'description' => $this->description
        ];
    }
}

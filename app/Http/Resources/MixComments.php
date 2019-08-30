<?php namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MixComments extends JsonResource
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
            'user' => $this->user->username,
            'comments' => $this->comments->map(
                function ($comment) {
                    return [
                        'user' => $comment->user ? $comment->user->username : 'Unknown',
                        'comment' => strip_tags($comment->comment),
                        'rating' => $comment->rating
                    ];
                }
            )
        ];
    }
}

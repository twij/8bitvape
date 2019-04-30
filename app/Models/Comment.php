<?php

namespace App\Models;

use App\Models\BaseModel;

class Comment extends BaseModel
{
    /**
     * Return related user
     *
     * @return Relationship User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Return related mix
     *
     * @return Relationship Mix
     */
    public function mix()
    {
        return $this->belongsTo('App\Model\Mix', 'id', 'related_id');
    }
}

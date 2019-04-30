<?php

namespace App\Models;

use App\Models\BaseModel;

class Comment extends BaseModel
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function mix()
    {
        return $this->belongsTo('App\Model\Mix', 'id', 'related_id');
    }
}

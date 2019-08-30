<?php

namespace App\Models;

use App\Models\BaseModel;

class Comment extends BaseModel
{
    /**
     * Return related user
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // /**
    //  * Return related mix
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\Relation Mix
    //  */
    // public function mix()
    // {
    //     return $this->belongsTo('App\Model\Mix', 'id', 'related_id');
    // }
}

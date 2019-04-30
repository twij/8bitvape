<?php namespace App\Models;

use App\Models\BaseModel;

class Mix extends BaseModel
{
    /**
     * Return related flavours
     *
     * @return Relationship Flavours
     */
    public function flavours()
    {
        return $this->belongsToMany('App\Models\Flavour')->withPivot('percentage');
    }

    /**
     * Return related user
     *
     * @return Relationship User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'related_id');
    }
}

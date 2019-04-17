<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Mix extends Model
{
    /**
     * Return related flavours
     *
     * @return Relationship Flavours
     */
    public function flavours()
    {
        return $this->belongsToMany('App\Flavour')->withPivot('percentage');
    }

    /**
     * Return related user
     *
     * @return Relationship User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

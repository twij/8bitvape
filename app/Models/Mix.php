<?php namespace App\Models;

use App\Models\BaseModel;

class Mix extends BaseModel
{
    protected $appends = ['rating'];
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

    /**
     * Return related comments
     *
     * @return Relationship Comments
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'related_id');
    }

    /**
     * Average rating from comments
     *
     * @return Query Average rating
     */
    public function getRatingAttribute()
    {
        return number_format($this->comments->avg('rating'), 1);
    }

    /**
     * Scope enabled models
     *
     * @param Query $query Query
     * 
     * @return Query Scoped query
     */
    public function scopeEnabled($query)
    {
        return $query->where('enabled', true);
    }

}

<?php namespace App\Models;

use App\Models\BaseModel;

class Mix extends BaseModel
{
    protected $appends = ['rating'];
    /**
     * Return related flavours
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation Flavours
     */
    public function flavours()
    {
        return $this->belongsToMany('App\Models\Flavour')->withPivot('percentage');
    }

    /**
     * Return related user
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Return related comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation Comments
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'related_id');
    }

    /**
     * Average rating from comments
     *
     * @return Float Average rating
     */
    public function getRatingAttribute()
    {
        return (float) number_format($this->comments->avg('rating'), 1);
    }

    /**
     * Scope enabled models
     *
     * @param \Illuminate\Database\Query\Builder $query Query
     *
     * @return \Illuminate\Database\Query\Builder Scoped query
     */
    public function scopeEnabled($query)
    {
        return $query->where('enabled', true);
    }
}

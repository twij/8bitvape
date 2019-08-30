<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * User relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Scope enabled pages
     *
     * @param \Illuminate\Database\Query\Builder $query Query
     *
     * @return \Illuminate\Database\Query\Builder Scoped query
     */
    public function scopeEnabled($query)
    {
        return $query->where('enabled', 1);
    }

    /**
     * Scope public pages
     *
     * @param \Illuminate\Database\Query\Builder $query Query
     *
     * @return \Illuminate\Database\Query\Builder Scoped query
     */
    public function scopePublic($query)
    {
        return $query->where('enabled', 1)->where('public', 1);
    }
}

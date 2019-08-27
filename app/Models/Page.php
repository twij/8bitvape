<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * User relationship
     *
     * @return Relationship User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Scope enabled pages
     *
     * @param Query $query Query
     * 
     * @return Query Scoped query
     */
    public function scopeEnabled($query)
    {
        return $query->where('enabled', 1);
    }

    /**
     * Scope public pages
     *
     * @param Query $query Query
     * 
     * @return Query Scoped query
     */
    public function scopePublic($query)
    {
        return $query->enabled()->where('public', 1);
    }
}

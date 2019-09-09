<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    /**
     * Price Options relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation Price Options
     */
    public function priceOptions(): ?\Illuminate\Database\Eloquent\Relations\Relation
    {
        return $this->hasMany('App\Models\PriceOption');
    }

    /**
     * Page relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation Page
     */
    public function page(): ?\Illuminate\Database\Eloquent\Relations\Relation
    {
        return $this->belongsTo('App\Models\Page');
    }

    /**
     * Images relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation Image
     */
    public function images(): ?\Illuminate\Database\Eloquent\Relations\Relation
    {
        return $this->belongsToMany('App\Models\Image', 'product_images');
    }

    /**
     * Scope enabled models
     *
     * @param \Illuminate\Database\Eloquent\Builder $query Query
     * @return \Illuminate\Database\Eloquent\Builder Scoped query
     */
    public function scopeEnabled(
        \Illuminate\Database\Eloquent\Builder $query
    ): ?\Illuminate\Database\Eloquent\Builder {
        return $query->where('enabled', true);
    }
}

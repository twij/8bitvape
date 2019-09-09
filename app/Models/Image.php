<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * Products relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation Products
     */
    public function products(): ?\Illuminate\Database\Eloquent\Relations\Relation
    {
        return $this->belongsToMany('App\Models\Product', 'product_images');
    }
}

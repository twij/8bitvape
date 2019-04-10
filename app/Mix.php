<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mix extends Model
{
    public function flavours(){
        return $this->belongsToMany('App\Flavour')->withPivot('percentage');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}

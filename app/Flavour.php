<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flavour extends Model
{
    //
    public function mixes(){
        return $this->belongsToMany('App\Mix');
    }

    public function company()
    {
        return $this->belongsTo('App\FlavourCompany', 'flavour_company_id', 'id');
    }
}

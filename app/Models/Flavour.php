<?php namespace App\Models;

use App\Models\BaseModel;

class Flavour extends BaseModel
{
    /**
     * Return related mixes
     *
     * @return Relationship Mixes
     */
    public function mixes()
    {
        return $this->belongsToMany('App\Models\Mix');
    }

    /**
     * Return related companies
     *
     * @return Relationship Companies
     */
    public function company()
    {
        return $this->belongsTo('App\Models\FlavourCompany', 'flavour_company_id', 'id');
    }
}

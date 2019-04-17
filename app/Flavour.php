<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Flavour extends Model
{
    /**
     * Return related mixes
     *
     * @return Relationship Mixes
     */
    public function mixes()
    {
        return $this->belongsToMany('App\Mix');
    }

    /**
     * Return related companies
     *
     * @return Relationship Companies
     */
    public function company()
    {
        return $this->belongsTo('App\FlavourCompany', 'flavour_company_id', 'id');
    }
}

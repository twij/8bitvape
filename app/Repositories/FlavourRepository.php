<?php namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Repository;

class FlavourRepository extends Repository {

    /**
     * Model
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Flavour';
    }

    function findBySlug($slug) 
    {
        return $this->model->where('slug', $slug)->first();
    }
}

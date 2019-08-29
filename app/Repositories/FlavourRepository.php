<?php namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Repository;

class FlavourRepository extends Repository
{

    /**
     * Model
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Flavour';
    }

    /**
     * Find a flavour by its slug
     *
     * @param String $slug Flavour slug
     *
     * @return \App\Models\BaseModel Model
     */
    public function findBySlug(String $slug): \App\Models\BaseModel
    {
        return $this->model->where('slug', $slug)->first();
    }
}

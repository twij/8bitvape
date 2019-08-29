<?php namespace App\Repositories;

use App\Repositories\Repository;
use App\Models\Page;

class PageRepository extends Repository
{

    /**
     * Company model
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Page';
    }

    /**
     * Get a page by its slug
     *
     * @param String $slug Page slug
     * 
     * @return \App\Models\BaseModel
     */
    public function findBySlug(String $slug): \App\Models\BaseModel
    {
        return $this->model->public()->where('slug', $slug)->first();
    }

    /**
     * Get a page by its path
     *
     * @param String $path Page path
     * 
     * @return \App\Models\BaseModel
     */
    public function findByPath(String $path): \App\Models\BaseModel
    {
        return $this->model->public()->where('path', $path)->first();
    }
}
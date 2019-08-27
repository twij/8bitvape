<?php namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Repository;

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
     * @return App\Models\PageModel
     */
    public function findBySlug($slug)
    {
        return $this->model->public()->where('slug', $slug)->first();
    }

    /**
     * Get a page by its path
     *
     * @param String $path Page path
     * 
     * @return App\Models\PageModel
     */
    public function findByPath($path)
    {
        return $this->model->public()->where('path', $path)->first();
    }
}
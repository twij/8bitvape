<?php namespace App\Repositories;

use App\Repositories\Repository;

class ProductRepository extends Repository
{

    /**
     * Company model
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Product';
    }

    /**
     * Get a page by its slug
     *
     * @param String $slug Page slug
     *
     * @return \App\Models\Product
     */
    public function findBySlug(String $slug): ?\App\Models\Product
    {
        return $this->model->enabled()->where('slug', $slug)->first();
    }

    /**
     * Get enabled products
     *
     * @return \Illuminate\Database\Eloquent\Builder Enabled models
     */
    public function getEnabled(): ?\Illuminate\Database\Eloquent\Builder
    {
        return $this->model->enabled();
    }
}

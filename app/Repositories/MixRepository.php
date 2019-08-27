<?php namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Criteria\Mix\LessThan2DaysOld;
use App\Repositories\Repository;

class MixRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Mix';
    }

    /**
     * Find a mix by its slug
     *
     * @param String $slug Mix slug
     *
     * @return App\Mix Mix Model
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)
            ->enabled()
            ->with(['user', 'flavours', 'flavours.company', 'comments'])
            ->first();
    }

    /**
     * Search for a mix
     *
     * @param String $term Search Term
     *
     * @return App\Mix Mix model
     */
    public function search($term)
    {
        return $this->model
            ->enabled()
            ->where('name', 'like', '%'.$term.'%')
            ->get();
    }
}

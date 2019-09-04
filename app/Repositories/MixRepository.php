<?php namespace App\Repositories;

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
     * @return \App\Models\Mix Mix Model
     */
    public function findBySlug(String $slug): ?\App\Models\Mix
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
     * @return \Illuminate\Database\Query\Builder $query
     */
    public function search(String $term, String $orderBy = 'id')
    {
        $this->applyCriteria();

        return $this->model
            ->enabled()
            ->orderBy($orderBy)
            ->where('name', 'like', '%'.$term.'%');
    }
}

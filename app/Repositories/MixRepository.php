<?php namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Criteria\Mix\LessThan2DaysOld;
use App\Repositories\Repository;

class MixRepository extends Repository {

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Mix';
    }

    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->with(['flavours', 'flavours.company'])->first();
    }
}

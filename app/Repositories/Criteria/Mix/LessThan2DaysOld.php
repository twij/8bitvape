<?php namespace App\Repositories\Criteria\Mix;

use App\Repositories\Criteria\Criteria;
use App\Repositories\Contracts\RepositoryInterface;

class LessThan2DaysOld extends Criteria
{

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $query = $model->get();
        return $query;
    }
}

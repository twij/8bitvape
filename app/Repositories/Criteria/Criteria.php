<?php namespace App\Repositories\Criteria;

use App\Repositories\Contracts\RepositoryInterface as Repository;
use App\Repositories\Contracts\RepositoryInterface;

abstract class Criteria
{

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    abstract public function apply($model, Repository $repository);
}

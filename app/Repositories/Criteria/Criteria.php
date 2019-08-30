<?php namespace App\Repositories\Criteria;

use App\Repositories\Contracts\RepositoryInterface as Repository;
use App\Repositories\Contracts\RepositoryInterface;

abstract class Criteria
{

    /**
     * @param \App\Models\BaseModel $model      Model
     * @param RepositoryInterface   $repository Repository
     *
     * @return mixed
     */
    abstract public function apply($model, Repository $repository);
}

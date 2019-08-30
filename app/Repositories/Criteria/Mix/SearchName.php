<?php namespace App\Repositories\Criteria\Mix;

use App\Models\User;
use App\Repositories\Criteria\Criteria;
use App\Repositories\Contracts\RepositoryInterface;

class SearchName extends Criteria
{
    protected $term;

    /**
     * Constructor
     *
     * @param String $term  Term to search
     */
    public function __construct($term)
    {
        $this->term = $term;
    }

    /**
     * @param \App\Models\BaseModel $model      Model
     * @param RepositoryInterface   $repository Repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('name', 'like', '%'.$this->term.'%');
    }
}

<?php namespace App\Repositories\Criteria;

use App\Repositories\Criteria\Criteria;
use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Support\Facades\Schema;

class OrderBy extends Criteria
{

    protected $column;
    protected $direction;

    /**
     * Constructor
     *
     * @param String $column    Column to order
     * @param String $direction Direction of order
     */
    public function __construct($column = 'id', $direction = 'ASC')
    {
        $this->column = $column;
        $this->direction = $direction;
    }

    /**
     * @param \App\Models\BaseModel $model      Model
     * @param RepositoryInterface   $repository Repository
     *
     * @return mixed Query
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->orderBy($this->column, $this->direction);
    }
}

<?php namespace App\Repositories\Criteria\Mix;

use App\Models\User;
use App\Repositories\Criteria\Criteria;
use App\Repositories\Contracts\RepositoryInterface;

class CreatedByUser extends Criteria
{
    protected $user;

    /**
     * Constructor
     *
     * @param \App\Models\User $user User
     */
    public function __construct(
        User $user
    ) {
        $this->user = $user;
    }

    /**
     * @param \App\Models\BaseModel $model      Model
     * @param RepositoryInterface   $repository Repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('user_id', $this->user->id);
    }
}

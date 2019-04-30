<?php namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Repository;

class CommentRepository extends Repository
{

    /**
     * Company model
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Comment';
    }
}

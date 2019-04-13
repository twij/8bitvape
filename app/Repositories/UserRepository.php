<?php namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Repository;

class UserRepository extends Repository {

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\User';
    }

    public function findByUsername($username)
    {
        return $this->model->where('username', $username)->with(['mixes'])->first();
    }

    public function search($term)
    {
        return $this->model->where('username', 'like', '%'.$term.'%')->first();
    }
}

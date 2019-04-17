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

    /**
     * Find a user by their username
     *
     * @param String $username Username
     * 
     * @return App\User User model
     */
    public function findByUsername($username)
    {
        return $this->model->where('username', $username)->with(['mixes'])->first();
    }

    /**
     * Search for a user
     *
     * @param String $term Search term
     * 
     * @return App\User User model
     */
    public function search($term)
    {
        return $this->model->where('username', 'like', '%'.$term.'%')->first();
    }
}

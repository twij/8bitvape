<?php namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Repository;

class UserRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\User';
    }

    /**
     * Find a user by their username
     *
     * @param String $username Username
     *
     * @return \App\Models\User User model
     */
    public function findByUsername(String $username): ?\App\Models\User
    {
        return $this->model->where('username', $username)->with(['mixes'])->first();
    }

    /**
     * Search for a user
     *
     * @param String $term Search term
     *
     * @return mixed User model
     */
    public function search(String $term)
    {
        return $this->model->where('username', 'like', '%'.$term.'%')
            ->with('mixes')->get();
    }
}

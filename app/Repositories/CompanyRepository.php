<?php namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Repository;

class CompanyRepository extends Repository {

    /**
     * Company model
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Company';
    }
}

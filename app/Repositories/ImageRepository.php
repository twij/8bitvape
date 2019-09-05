<?php namespace App\Repositories;

use App\Repositories\Repository;

class ImageRepository extends Repository
{

    /**
     * Company model
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Image';
    }
}

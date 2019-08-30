<?php namespace App\Traits;

use App\Repositories\Criteria\OrderBy;
use App\Repositories\Criteria\Mix\ContainsFlavour;
use App\Repositories\Criteria\Mix\CreatedByUser;
use App\Repositories\Criteria\Mix\SearchName;

trait MixCriteria
{

    /**
     * Order mixes
     *
     * @return void
     */
    public function orderBy()
    {
        if (array_key_exists('direction', $this->input)) {
            $direction = $this->input['direction'];
        } else {
            $direction = 'ASC';
        }
        
        if (array_key_exists('order', $this->input)) {
            $this->mixRepository->pushCriteria(
                new OrderBy($this->input['order'], $direction)
            );
        }
    }

    /**
     * Juice contains flavour
     *
     * @return void
     */
    public function juiceContains()
    {
        if (array_key_exists('contains', $this->input)) {
            $this->mixRepository->pushCriteria(
                new ContainsFlavour(
                    $this->flavourRepository,
                    $this->input['contains']
                )
            );
        }
    }

    /**
     * Created by a user
     *
     * @return void
     */
    public function createdByUser()
    {
        if (array_key_exists('user', $this->input)) {
            $user = $this->userRepository
                ->findByUsername($this->input['user']);
            $this->mixRepository->pushCriteria(
                new createdByUser($user)
            );
        }
    }

    /**
     * Simple name search
     *
     * @return void
     */
    public function searchName()
    {
        if (array_key_exists('search', $this->input)) {
            $this->mixRepository->pushCriteria(
                new SearchName($this->input['search'])
            );
        }
    }

    /**
     * Run all filters
     *
     * @return void
     */
    public function filter()
    {
        $this->searchName();
        $this->createdByUser();
        $this->juiceContains();
        $this->orderBy();
    }
}

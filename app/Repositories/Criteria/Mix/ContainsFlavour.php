<?php namespace App\Repositories\Criteria\Mix;

use App\Repositories\Criteria\Criteria;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\FlavourRepository;

class ContainsFlavour extends Criteria
{

    protected $flavour;
    protected $flavourRepository;

    /**
     * Constructor
     *
     * @param FlavourRepository $flavourRepository Repository
     * @param String            $flavour           Model
     */
    public function __construct(
        FlavourRepository $flavourRepository,
        $flavour
    ) {
        $this->flavourRepository = $flavourRepository;
        $this->flavour = $flavour;
    }

    /**
     * @param \App\Models\BaseModel $model      Model
     * @param RepositoryInterface   $repository Repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        if ($flavour = $this->flavourRepository->findBySlug($this->flavour)) {
            return $model->whereHas(
                'flavours',
                function ($query) use ($flavour) {
                    $query->where('flavour_id', $flavour->id);
                }
            );
        }
    }
}

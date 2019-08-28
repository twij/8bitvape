<?php namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Repositories\FlavourRepository;
use App\Repositories\UserRepository;

class FilterComposer
{

    protected $userRepository;
    protected $flavourRepository;

    /**
     * Constructor
     * 
     * @param UserRepository    $userRepository    User Repository
     * @param FlavourRepository $flavourRepository Flavour Repository
     */
    public function __construct(
        UserRepository $userRepository,
        FlavourRepository $flavourRepository
    ) {
        $this->userRepository = $userRepository;
        $this->flavourRepository = $flavourRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(
            'users', $this->userRepository->all()->pluck('username')
        )->with(
            'flavours', $this->flavourRepository->all()->pluck('slug', 'name')->sort()
        );
    }
}
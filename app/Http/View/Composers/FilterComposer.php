<?php namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Repositories\FlavourRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Cache;

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
     * @param View $view View template
     *
     * @return void
     */
    public function compose(View $view)
    {
        $usernames = Cache::remember(
            '_usernames',
            60 * 60 * 12,
            function () {
                return $this->userRepository->all()->pluck('username');
            }
        );

        $flavours = Cache::remember(
            '_flavours',
            60 * 60 * 12,
            function () {
                return $this->flavourRepository
                    ->all()->pluck('slug', 'name')->sort();
            }
        );

        $view->with('users', $usernames)->with('flavours', $flavours);
    }
}

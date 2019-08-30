<?php

namespace App\Http\Controllers;

use App\Models\Mix;
use App\Repositories\MixRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Traits\MixCriteria;
use App\Repositories\FlavourRepository;
use App\Repositories\UserRepository;

class MixController extends Controller
{
    use MixCriteria;

    protected $mixRepository;
    protected $flavourRepository;
    protected $userRepository;
    protected $input;

    /**
     * Constructor
     *
     * @param MixRepository     $mixRepository     Mixes Repository
     * @param FlavourRepository $flavourRepository Flavours Repository
     * @param UserRepository    $userRepository    User Repository
     */
    public function __construct(
        MixRepository $mixRepository,
        FlavourRepository $flavourRepository,
        UserRepository $userRepository
    ) {
        $this->mixRepository = $mixRepository;
        $this->flavourRepository = $flavourRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request Request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
    {
        $input = $this->input = array_filter(
            $request->validate(
                [
                    'order' => [
                        'nullable',
                        Rule::in('name', 'created_at')
                    ],
                    'direction' => [
                        'nullable',
                        Rule::in('ASC', 'DESC')
                    ],
                    'contains' => 'nullable|exists:flavours,slug',
                    'user' => 'nullable|exists:users,username',
                    'search' => 'nullable|string'
                ]
            )
        );

        $this->filter();

        $mixes = $this->mixRepository->paginate(20);

        return view('index', compact('mixes', 'input'));
    }

    /**
     * Display the specified resource.
     *
     * @param String $slug Mix Slug
     *
     * @return \Illuminate\View\View
     */
    public function show(String $slug): \Illuminate\View\View
    {
        $mix = $this->mixRepository->findBySlug($slug);

        if ($mix) {
            return view('mix', compact('mix'));
        }

        abort(404);
    }
}

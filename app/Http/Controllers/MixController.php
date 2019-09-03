<?php

namespace App\Http\Controllers;

use App\Repositories\MixRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Traits\MixCriteria;
use App\Repositories\FlavourRepository;
use App\Repositories\UserRepository;
use App\Jobs\MixJuice;

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
    public function show(String $slug, Request $request): \Illuminate\View\View
    {
        $input = $this->input = array_diff(
            array_map(
                'trim',
                $request->validate(
                    [
                        'quantity' => 'nullable|integer|min:1',
                        'vg' => 'nullable|integer|min:0|max:100',
                        'pg' => 'nullable|integer|min:0|max:100',
                        'base-strength' => 'nullable|integer|min:1|max:100',
                        'base-type' => [
                            'nullable',
                            Rule::in('VG', 'PG')
                        ],
                        'strength' => 'nullable|integer|min:0|max:36',
                    ]
                )
            ),
            array('')
        );

        $mix = $this->mixRepository->findBySlug($slug);
        
        if ($mix) {
            $mix = MixJuice::dispatchNow($mix, $input);
            return view('mix', compact('mix'));
        }

        abort(404);
    }
}

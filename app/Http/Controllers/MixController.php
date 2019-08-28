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
     * @param MixRepository     $MixRepository     Mixes Repository
     * @param FlavourRepository $FlavourRepository Flavours Repository
     * @param UserRepository    $userRepository    User Repository
     */
    public function __construct(
        MixRepository $MixRepository,
        FlavourRepository $flavourRepository,
        UserRepository $userRepository
    ) {
        $this->mixRepository = $MixRepository;
        $this->flavourRepository = $flavourRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     * 
     * @param Request $request Request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $this->input = array_filter($request->validate(
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
        ));

        $this->filter();

        $mixes = $this->mixRepository->paginate(20);

        return view('index', compact('mixes', 'input'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request Request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param String $slug Mix Slug
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $mix = $this->mixRepository->findBySlug($slug);

        if ($mix) {
            return view('mix', compact('mix'));
        }

        abort(404);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Mix $mix Mix
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Mix $mix)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request Request
     * @param \App\Models\Mix          $mix     Mix
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mix $mix)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Mix $mix Mix
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mix $mix)
    {
        //
    }

}

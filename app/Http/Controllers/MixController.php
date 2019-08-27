<?php

namespace App\Http\Controllers;

use App\Models\Mix;
use App\Repositories\MixRepository;
use App\Repositories\Criteria\OrderBy;
use Illuminate\Http\Request;

class MixController extends Controller
{
    protected $mixRepository;

    /**
     * Constructor
     *
     * @param MixRepository $MixRepository Mixes Repository
     */
    public function __construct(MixRepository $MixRepository)
    {
        $this->mixRepository = $MixRepository;
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
        $term = $request->query('search');

        if ($term) {
            $mixes = $this->mixRepository->search($term)->paginate(20);
        } else {
            $mixes = $this->mixRepository->paginate(20);
        }

        return view('index', compact('mixes', 'term'));
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

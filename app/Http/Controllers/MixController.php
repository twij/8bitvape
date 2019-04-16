<?php

namespace App\Http\Controllers;

use App\Mix;
use App\Repositories\MixRepository;
use App\Repositories\Criteria\Mix\LessThan2DaysOld;
use Illuminate\Http\Request;

class MixController extends Controller
{
    protected $mixRepository;

    public function __construct(MixRepository $MixRepository){
        $this->mixRepository = $MixRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->mixRepository->pushCriteria(new LessThan2DaysOld());
        $mixes = \Response::json($this->mixRepository->all());

        return $mixes;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mix  $mix
     * @return \Illuminate\Http\Response
     */
    public function show(Mix $mix)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mix  $mix
     * @return \Illuminate\Http\Response
     */
    public function edit(Mix $mix)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mix  $mix
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mix $mix)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mix  $mix
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mix $mix)
    {
        //
    }
}

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

    public function getBySlug($slug){
        $mix = $this->mixRepository->findBySlug($slug);

        if (!$mix) {
            return json_encode(['error' => 'not found']);
        }

        $flavours = [];

        foreach ($mix->flavours as $flavour) {
            $flv = [
                'name' => $flavour->name,
                'company' => $flavour->company->name,
                'percentage' => $flavour->pivot->percentage
            ];
            array_push($flavours, $flv);
        }

        return json_encode(
            [
                'name' => $mix->name,
                'user' => $mix->user->username,
                'flavours' => $flavours
            ]
        );
    }

    public function search($term)
    {
        $mixes = $this->mixRepository->search($term);

        if (!$mixes) {
            return json_encode(['error' => 'not found']);
        }

        $results = [];

        foreach ($mixes as $mix) {
            $result = [
                'name' => $mix->name,
                'user' => $mix->user->username,
                'slug' => $mix->slug
            ];
            array_push($results, $result);
        }

        return json_encode($results);
    }

    public function find($term)
    {
        $mixes = $this->mixRepository->search($term);

        if (!count($mixes)) {
            return json_encode(['error' => 'not found']);
        }

        $mix = $mixes->first();

        $flavours = [];

        foreach ($mix->flavours as $flavour) {
            $flv = [
                'name' => $flavour->name,
                'company' => $flavour->company->name,
                'percentage' => $flavour->pivot->percentage
            ];
            array_push($flavours, $flv);
        }

        return json_encode(
            [
                'name' => $mix->name,
                'user' => $mix->user->username,
                'flavours' => $flavours
            ]
        );
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

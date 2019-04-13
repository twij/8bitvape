<?php

namespace App\Http\Controllers;

use App\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function show(Update $update)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function edit(Update $update)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Update $update)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function destroy(Update $update)
    {
        //
    }

    public function getUser($username)
    {
        $user = $this->userRepository->findByUsername($username);

        if (!$user) {
            return json_encode(['not found']);
        }

        $mixes = [];

        foreach ($user->mixes as $mix) {
            $flavours = [];

            foreach ($mix->flavours as $flavour) {
                $flv = [
                    'name' => $flavour->name,
                    'company' => $flavour->company->name,
                    'percentage' => $flavour->pivot->percentage
                ];
                array_push($flavours, $flv);
            }
            $mix = (
                [
                    'name' => $mix->name,
                    'flavours' => $flavours
                ]
            );
            array_push($mixes, $mix);
        }

        return json_encode([
            'name' => $user->username,
            'xp' => $user->xp,
            'mixes' => $mixes
        ]);
    }
}

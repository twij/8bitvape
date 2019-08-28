<?php namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use App\Repositories\FlavourRepository;
use App\Repositories\MixRepository;
use App\Repositories\UserRepository;
use App\Http\Resources\Mix as MixResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Flavour as FlavourResource;
use App\Http\Resources\MixComments as MixCommentsResource;

class ApiController extends Controller
{
    protected $companyRepository;
    protected $flavourRepository;
    protected $mixRepository;
    protected $userRepository;

    /**
     * Constructor
     *
     * @param CompanyRepository $companyRepository Company Repository
     * @param FlavourRepository $flavourRepository Flavour Repository
     * @param MixRepository     $mixRepository     Mix Repository
     * @param UserRepository    $userRepository    User Repository
     */
    public function __construct(
        CompanyRepository $companyRepository,
        FlavourRepository $flavourRepository,
        MixRepository $mixRepository,
        UserRepository $userRepository
    ) {
        $this->companyRepository = $companyRepository;
        $this->flavourRepository = $flavourRepository;
        $this->mixRepository = $mixRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Get a mix via its slug
     *
     * @param String $slug Mix slug
     *
     * @return Illuminate\Http\JsonResponse Json encoded mix
     */
    public function getMixBySlug($slug)
    {
        if ($mix = $this->mixRepository->findBySlug($slug)) {
            return response()->json(new MixResource($mix));
        }
        
        return response()->json(['error' => 'not found']);
    }

    /**
     * Search mixes for text string
     *
     * @param String $term Search query
     *
     * @return Illuminate\Http\JsonResponse Json encoded search results
     */
    public function searchMixes($term)
    {
        if ($mixes = $this->mixRepository->search($term)->get()) {
            return response()->json(
                $mixes->map(
                    function ($item, $key) {
                        return [
                            'name' => $item->name,
                            'user' => $item->user->username,
                            'slug' => $item->slug
                        ];
                    }
                )
            );
        }
        return response()->json(['error' => 'not found']);
    }

    /**
     * Search mixes, return closest match
     *
     * @param String $term Search Term
     *
     * @return Illuminate\Http\JsonResponse Json encoded mix
     */
    public function findMix($term)
    {
        if (count($mixes = $this->mixRepository->search($term)->get())) {
            return response()->json(new MixResource($mixes->first()));
        }
        return response()->json(['error' => 'not found']);
    }

    /**
     * Get a user's mixes by their username
     *
     * @param String $username Username string
     *
     * @return Illuminate\Http\JsonResponse Json encoded user info
     */
    public function getUser($username)
    {
        if ($user = $this->userRepository->findByUsername($username)) {
            return response()->json(new UserResource($user));
        }
        return response()->json(['error' => 'not found']);
    }

    /**
     * Get information about flavour
     *
     * @param String $slug Flavour slug
     *
     * @return Illuminate\Http\JsonResponse Json encoded flavour info
     */
    public function getFlavour($slug)
    {
        if ($flavour = $this->flavourRepository->findBySlug($slug)) {
            return response()->json(new FlavourResource($flavour));
        }
        return response()->json(['error' => 'not found']);
    }

    /**
     * Get comments for a mix
     *
     * @param String $slug Mix slug
     *
     * @return Illuminate\Http\JsonResponse Json encoded comments
     */
    public function getComments($slug)
    {
        if ($mix = $this->mixRepository->findBySlug($slug)) {
            return response()->json(new MixCommentsResource($mix));
        }
        return response()->json(['error' => 'not found']);
    }
}

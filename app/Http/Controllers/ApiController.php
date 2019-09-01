<?php namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use App\Repositories\FlavourRepository;
use App\Repositories\MixRepository;
use App\Repositories\UserRepository;
use App\Http\Resources\Mix as MixResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Flavour as FlavourResource;
use App\Http\Resources\MixComments as MixCommentsResource;
use Illuminate\Http\JsonResponse;

class 
ApiController extends Controller
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
     * @return JsonResponse Json encoded mix
     */
    public function getMixBySlug(String $slug): JsonResponse
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
     * @return JsonResponse Json encoded search results
     */
    public function searchMixes(String $term): JsonResponse
    {
        $mixes = $this->mixRepository->search($term)->get();

        if ($mixes && $mixes->count() > 0) {
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
     * @return JsonResponse Json encoded mix
     */
    public function findMix(String $term): JsonResponse
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
     * @return JsonResponse Json encoded user info
     */
    public function getUser(String $username): JsonResponse
    {
        if ($user = $this->userRepository->findByUsername($username)) {
            return response()->json(new UserResource($user));
        }
        return response()->json(['error' => 'not found']);
    }

    /**
     * Search for a user
     *
     * @param String $username Username string
     *
     * @return JsonResponse Json encoded user info
     */
    public function findUser(String $username): JsonResponse
    {
        if ($user = $this->userRepository->search($username)->first()) {
            return response()->json(new UserResource($user));
        }
        return response()->json(['error' => 'not found']);
    }

    /**
     * Get information about flavour
     *
     * @param String $slug Flavour slug
     *
     * @return JsonResponse Json encoded flavour info
     */
    public function getFlavour(String $slug): JsonResponse
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
     * @return JsonResponse Json encoded comments
     */
    public function getComments(String $slug): JsonResponse
    {
        if ($mix = $this->mixRepository->findBySlug($slug)) {
            return response()->json(new MixCommentsResource($mix));
        }
        return response()->json(['error' => 'not found']);
    }
}

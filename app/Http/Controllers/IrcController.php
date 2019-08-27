<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CompanyRepository;
use App\Repositories\FlavourRepository;
use App\Repositories\MixRepository;
use App\Repositories\UserRepository;

class IrcController extends Controller
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
     * @return String Json encoded mix
     */
    public function getMixBySlug($slug)
    {
        $mix = $this->mixRepository->findBySlug($slug);

        if (!$mix) {
            return response()->json(['error' => 'not found']);
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

        return response()->json(
            [
                'name' => $mix->name,
                'user' => $mix->user->username,
                'description' => strip_tags($mix->description),
                'flavours' => $flavours
            ]
        );
    }

    /**
     * Search mixes for text string
     *
     * @param String $term Search query
     *
     * @return String Json encoded search results
     */
    public function searchMixes($term)
    {
        $mixes = $this->mixRepository->search($term)->get();

        if (!$mixes) {
            return response()->json(['error' => 'not found']);
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

        return response()->json($results);
    }

    /**
     * Search mixes, return closest match
     *
     * @param String $term Search Term
     *
     * @return String Json encoded mix
     */
    public function findMix($term)
    {
        $mixes = $this->mixRepository->search($term)->get();

        if (!count($mixes)) {
            return response()->json(['error' => 'not found']);
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

        return response()->json(
            [
                'name' => $mix->name,
                'user' => $mix->user->username,
                'description' => strip_tags($mix->description),
                'flavours' => $flavours
            ]
        );
    }

    /**
     * Get a user's mixes by their username
     *
     * @param String $username Username string
     *
     * @return String Json encoded user info
     */
    public function getUser($username)
    {
        $user = $this->userRepository->findByUsername($username);

        if (!$user) {
            return response()->json(['error' => 'not found']);
        }

        $mixes = [];

        foreach ($user->mixes as $mix) {
            $mix = (
                [
                    'name' => $mix->name,
                    'slug' => $mix->slug,
                ]
            );
            array_push($mixes, $mix);
        }

        return response()->json(
            [
                'name' => $user->username,
                'xp' => $user->xp,
                'mixes' => $mixes
            ]
        );
    }

    /**
     * Get information about flavour
     *
     * @param String $slug Flavour slug
     *
     * @return String Json encoded flavour info
     */
    public function getFlavour($slug)
    {
        $flavour = $this->flavourRepository->findBySlug($slug);

        if (!$flavour) {
            return response()->json(['error' => 'not found']);
        }

        return response()->json(
            [
                'name' => $flavour->name,
                'company' => $flavour->company->name,
                'description' => $flavour->description
            ]
        );
    }

    /**
     * Get comments for a mix
     *
     * @param String $slug Mix slug
     *
     * @return String Json encoded comments
     */
    public function getComments($slug)
    {
        $mix = $this->mixRepository->findBySlug($slug);

        if (!$mix) {
            return response()->json(['error' => 'not found']);
        }

        $comments = [];

        foreach ($mix->comments as $comment) {
            if ($comment->user) {
                $username = $comment->user->username;
            } else {
                $username = "Unknown";
            }
            $com = [
                'user' => $username,
                'comment' => strip_tags($comment->comment),
                'rating' => $comment->rating
            ];
            array_push($comments, $com);
        }

        return response()->json(
            [
                'name' => $mix->name,
                'user' => $mix->user->username,
                'comments' => $comments
            ]
        );
    }
}

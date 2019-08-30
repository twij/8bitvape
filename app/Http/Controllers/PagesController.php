<?php

namespace App\Http\Controllers;

use App\Repositories\PageRepository;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    protected $pageRepository;

    /**
     * Constructor
     *
     * @param PageRepository $pageRepository Repository
     */
    public function __construct(
        PageRepository $pageRepository
    ) {
        $this->pageRepository = $pageRepository;
    }

    /**
     * Show a page
     *
     * @param String $path Page path
     *
     * @return \Illuminate\View\View Page view
     */
    public function show(String $path) : \Illuminate\View\View
    {
        $page = $this->pageRepository->findByPath($path);
        
        if ($page) {
            return view('page', compact('page'));
        } else {
            abort(404);
        }
    }
}

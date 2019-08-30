<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{
    protected $companyRepository;

    /**
     * Constructor
     *
     * @param CompanyRepository $companyRepository Repository
     */
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }
}

<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\MixRepository;
use App\Repositories\CompanyRepository;
use App\Mix;
use App\Company;

class RepositoryServiceProvider extends ServiceProvider{

public function register()
    {
        $this->app->singleton("App\Repositories\Contracts\RepositoryInterface",function(){
            return new MixRepository(new Mix());
        });
        $this->app->singleton("App\Repositories\Contracts\RepositoryInterface",function(){
            return new CompanyRepository(new Company());
        });
    }
}

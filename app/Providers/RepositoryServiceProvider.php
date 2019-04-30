<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\MixRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\UserRepository;
use App\Repositories\FlavourRepository;
use App\Models\Mix;
use App\Models\Company;
use App\Models\User;
use App\Models\Flavour;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton("App\Repositories\Contracts\RepositoryInterface", function () {
            return new MixRepository(new Mix());
        });
        $this->app->singleton("App\Repositories\Contracts\RepositoryInterface", function () {
            return new CompanyRepository(new Company());
        });
        $this->app->singleton("App\Repositories\Contracts\RepositoryInterface", function () {
            return new UserRepository(new User());
        });
        $this->app->singleton("App\Repositories\Contracts\RepositoryInterface", function () {
            return new FlavourRepository(new Flavour());
        });
    }
}

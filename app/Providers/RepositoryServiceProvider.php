<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\MixRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\UserRepository;
use App\Repositories\FlavourRepository;
use App\Repositories\PageRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ImageRepository;
use App\Models\Mix;
use App\Models\Company;
use App\Models\User;
use App\Models\Flavour;
use App\Models\Page;
use App\Models\Product;
use App\Models\Image;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            "App\Repositories\Contracts\RepositoryInterface",
            function () {
                return new MixRepository(app(), collect(new Mix()));
            }
        );
        $this->app->singleton(
            "App\Repositories\Contracts\RepositoryInterface",
            function () {
                return new CompanyRepository(app(), collect(new Company()));
            }
        );
        $this->app->singleton(
            "App\Repositories\Contracts\RepositoryInterface",
            function () {
                return new UserRepository(app(), collect(new User()));
            }
        );
        $this->app->singleton(
            "App\Repositories\Contracts\RepositoryInterface",
            function () {
                return new FlavourRepository(app(), collect(new Flavour()));
            }
        );
        $this->app->singleton(
            "App\Repositories\Contracts\RepositoryInterface",
            function () {
                return new PageRepository(app(), collect(new Page()));
            }
        );
        $this->app->singleton(
            "App\Repositories\Contracts\RepositoryInterface",
            function () {
                return new ProductRepository(app(), collect(new Product()));
            }
        );
        $this->app->singleton(
            "App\Repositories\Contracts\RepositoryInterface",
            function () {
                return new ImageRepository(app(), collect(new Image()));
            }
        );
    }
}

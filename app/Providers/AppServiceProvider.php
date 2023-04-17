<?php

namespace App\Providers;

use App\Mail\BlastengineTransport;
use App\View\Components\Modals\JobOffer\Search\Domain;
use App\View\Components\Modals\JobOffer\Search\Occupation;
use App\View\Components\Modals\JobOffer\Search\Prefecture;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('search-prefectures', Prefecture::class);
        Blade::component('search-occupations', Occupation::class);
        Blade::component('search-domains', Domain::class);

        Paginator::useBootstrapFour();

        Mail::extend('blastengine', function (array $config) {
            return new BlastengineTransport($config['url'], $config['token']);
        });
    }
}

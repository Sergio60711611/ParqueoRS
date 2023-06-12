<?php

namespace App\Providers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Facades\URL;
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
    if($this->app->environment('production')) {
        URL::forceScheme('https');
    }
    AbstractPaginator::useBootstrap();
    }
}



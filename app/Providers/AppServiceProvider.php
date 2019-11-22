<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('postalcode', 'App\Rules\Postalcode@passes');
        Validator::extend('coordinate', 'App\Rules\Coordinate@passes');
        Validator::extend('telephone', 'App\Rules\Telephone@passes');
    }
}

<?php

namespace Selfreliance\Representatives;

use Illuminate\Support\ServiceProvider;

class RepresentativesAdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__.'/routes.php';
        $this->app->make('Selfreliance\Representatives\RepresentativesAdminController');
        $this->loadViewsFrom(__DIR__.'/views', 'representatives');

        $this->publishes([
            __DIR__.'/public/' => public_path('vendor/airdropadmin'),
        ], 'assets');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
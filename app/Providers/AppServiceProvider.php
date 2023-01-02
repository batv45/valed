<?php

namespace App\Providers;

use App\Services\Radius\RadiusService;
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
        if( config('radius.database.db_host') ){
            $this->app->bind(RadiusService::class, function ($app) {
                return new RadiusService('radius');
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ( config('app.env') == 'production' || config('app.force_https') ){
            \URL::forceScheme('https');
        }
    }
}

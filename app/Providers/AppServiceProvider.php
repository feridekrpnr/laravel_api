<?php

namespace App\Providers;
use Illuminate\Http\jResourcesson\Json\Recource;
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
        //Resource::withoutWrapping(); //data anahtarının gelmesini önler

    }
}

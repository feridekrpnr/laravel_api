<?php

namespace App\Providers;
use Illuminate\Http\Resources;
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
        Resources\Json\JsonResource::withoutWrapping(); //data anahtarının gelmesini önler

    }
}

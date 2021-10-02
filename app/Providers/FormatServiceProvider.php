<?php

namespace App\Providers;

use App\Services\Formater;
use Illuminate\Support\ServiceProvider;

class FormatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('format',function(){
            return new Formater();
        });
    }
}

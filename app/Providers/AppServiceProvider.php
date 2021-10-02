<?php

namespace App\Providers;

use App\Services\FormatService;
use Illuminate\Support\Str;
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
        Str::macro('runtime', function($minutes) {
            $runtime = Str::of(number_format($minutes / 60, 2))->explode('.');

            return $runtime[0] . 'h ' . number_format($runtime[1] / 100 * 60) . 'm';
        });
    }
}

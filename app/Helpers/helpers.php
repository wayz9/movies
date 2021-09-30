<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

if (!function_exists('tmdb')) {

    function tmdb($endpoint, $key = 'results', $url = 'v3'): Collection
    {
        switch ($url) {
            case 'v4':
                $url = config('services.tmdb.url_v4');
                break;

            default:
                $url = config('services.tmdb.url_v3');
                break;
        }

        return collect(
            Http::withToken(config('services.tmdb.auth_key'))
                ->get("{$url}{$endpoint}")
                ->json()[$key]
        );
    }
}

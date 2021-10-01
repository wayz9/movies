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

if(! function_exists('response_tmdb')) {

    function response_tmdb($endpoint, $url = 'v3'): Collection
    {
        switch ($url) {
            case 'v4':
                $url = config('services.tmdb.url_v4');
                break;

            default:
                $url = config('services.tmdb.url_v3');
                break;
        }

        $response = Http::withToken(config('services.tmdb.auth_key'))
            ->get("{$url}{$endpoint}");

        if($response->failed()) {
            return abort(404);
        }

        return collect($response->json());
    }
}

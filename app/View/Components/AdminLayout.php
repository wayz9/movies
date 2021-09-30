<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    public function render()
    {
        $adminMovieGenres = Cache::remember('genres_movies', now()->addMonths(6), function () {
            return tmdb('genre/movie/list', 'genres')->all();
        });

        $adminTvGenres = Cache::remember('genres_tv', now()->addMonths(6), function () {
            return tmdb('genre/tv/list', 'genres')->all();
        });

        return view('layouts.admin', compact('adminMovieGenres', 'adminTvGenres'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\Facades\Format;

class AdminController extends Controller
{
    public function index()
    {
        $movies = Format::format(tmdb('movie/popular')->take(5));

        (request('time_window') == 'week')
            ? $trending = Format::format(tmdb('trending/movie/week')->take(5))
            : $trending = Format::format(tmdb('trending/movie/day')->take(5));

        $actors = Format::actor(tmdb('trending/person/week')->take(5));

        return view('admin.index', compact('movies', 'trending', 'actors'));
    }
}

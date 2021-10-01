<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function index()
    {
        /* $movies = tmdb('movie/popular')->take(12);

        (request('time_window') == 'week')
            ? $trending = tmdb('trending/movie/week')->take(12)
            : $trending = tmdb('trending/movie/day')->take(12);

        $actors = tmdb('trending/person/week')->take(12); */

        return view('admin.index', /* compact('movies', 'trending', 'actors') */);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    public function show($id, $page = 1)
    {
        Str::contains(request()->url(), 'movie')
            ? $records = tmdb("discover/movie?with_genres={$id}&page={$page}")
            : $records = tmdb("discover/tv?with_genres={$id}&page={$page}");

        return view('genre.show');
    }
}

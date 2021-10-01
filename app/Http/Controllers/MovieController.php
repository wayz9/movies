<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        $movies = tmdb("/movie/popular")->take(15);

        return view('movie.index', compact('movies'));
    }

    public function show($id)
    {
        $movie = response_tmdb("movie/{$id}?append_to_response=videos,credits");

        return view('movie.show', compact('movie'));
    }
}

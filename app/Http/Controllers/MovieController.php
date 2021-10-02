<?php

namespace App\Http\Controllers;

use App\Services\Facades\Format;

class MovieController extends Controller
{
    public function index($page = 1)
    {
        abort_if($page > 500, 204);

        $movies = Format::format(tmdb("/movie/popular?page={$page}")->take(15));

        return view('movie.index', compact('movies'));
    }

    public function show($id)
    {
        $movie = Format::media(response_tmdb("movie/{$id}?append_to_response=videos,credits,reviews,keywords"));

        return view('movie.show', compact('movie'));
    }
}

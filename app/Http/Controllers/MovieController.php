<?php

namespace App\Http\Controllers;

use App\Services\Facades\Format;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index($page = 1)
    {
        abort_if($page > 500, 204);

        $movies = Format::format(tmdb("/movie/popular?page={$page}")->take(20));

        return view('movie.index', compact('movies'));
    }

    public function show($id)
    {
        $movie = response_tmdb("movie/{$id}?append_to_response=videos,credits");

        return view('movie.show', compact('movie'));
    }
}

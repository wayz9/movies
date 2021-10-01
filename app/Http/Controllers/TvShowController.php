<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TvShowController extends Controller
{
    public function index()
    {
        $tvs = tmdb("/tv/popular")->take(15);

        return view('tvshow.index', compact('tvs'));
    }

    public function show($id)
    {
        $tvshow = response_tmdb("tv/{$id}?append_to_response=videos,credits");

        return view('tvshow.show', compact('tvshow'));
    }
}

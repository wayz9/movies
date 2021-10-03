<?php

namespace App\Http\Controllers;

use App\Services\Facades\Format;
use Illuminate\View\View;

class TvShowController extends Controller
{
    public function index($page = 1): View
    {
        abort_if($page > 500, 204);

        $tvs = Format::format(tmdb("/tv/popular?page={$page}")->take(15));

        return view('tvshow.index', compact('tvs'));
    }

    public function show($id): View
    {
        $tvshow = Format::media(response_tmdb("tv/{$id}?append_to_response=videos,credits,reviews,keywords"));

        return view('tvshow.show', compact('tvshow'));
    }
}

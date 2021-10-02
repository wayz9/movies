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
        $tvshow = response_tmdb("tv/{$id}?append_to_response=videos,credits");

        return view('tvshow.show', compact('tvshow'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\Facades\Format;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index($page = 1)
    {
        abort_if($page > 500, 204);

        $actors = Format::actors(tmdb("/person/popular?page={$page}")->take(15));

        return view('actor.index', compact('actors'));
    }

    public function show($id)
    {
        $cast = Format::format(collect(response_tmdb("person/{$id}/combined_credits")['cast']))->values();
        $actor = Format::person(response_tmdb("person/{$id}"));
        return view('actor.show', compact('actor', 'cast'));
    }
}

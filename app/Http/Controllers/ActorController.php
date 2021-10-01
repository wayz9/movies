<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        $actors = tmdb("/person/popular")->take(15);

        return view('actor.index', compact('actors'));
    }

    public function show($id)
    {
        $credits = response_tmdb("person/{$id}/combined_credits");
        $actor = response_tmdb("person/{$id}");

        dd($credits, $actor);

        return view('actor.show');
    }
}

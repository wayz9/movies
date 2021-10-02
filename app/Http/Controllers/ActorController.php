<?php

namespace App\Http\Controllers;

use App\Services\Facades\Format;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index($page = 1)
    {
        abort_if($page > 500, 204);

        $actors = Format::actor(tmdb("/person/popular")->take(15));

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

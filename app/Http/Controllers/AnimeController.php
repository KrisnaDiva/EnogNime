<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function index()
    {
        return view('anime.index',[
            'animes'=>Anime::orderBy('title', 'asc')->filter(request(['search']))->paginate(7)
        ]);
    }
    public function show(Anime $anime)
    {
        return view('anime.show',[
            'anime'=>$anime,
            'episodes'=>$anime->episodes()->orderBy('episode_number','desc')->get()
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index()
    {
        return view('index',[
            'episodes'=>Episode::with('anime')->latest()->get()
        ]);
    }
    public function show(Episode $episode)
    {
        return view('episode.show',[
            'episode'=>$episode
        ]);
    }
    
}

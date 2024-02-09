<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        return view('list.index',[
            'items'=>Season::orderBy('name','asc')->get()
        ]);
    }
    public function show(Season $season)
    {
        return view('list.show',[
            'item'=>$season
        ]);
    }
}

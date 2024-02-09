<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    public function index()
    {
        return view('list.index',[
            'items'=>Studio::orderBy('name','asc')->get()
        ]);
    }
    public function show(Studio $studio)
    {
        return view('list.show',[
            'item'=>$studio
        ]);
    }

}

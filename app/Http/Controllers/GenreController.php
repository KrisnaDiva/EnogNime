<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return view('list.index',[
            'items'=>Genre::orderBy('name','asc')->get()
        ]);
    }
    public function show(Genre $genre)
    {
        return view('list.show',[
            'item'=>$genre
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Genre;

use Illuminate\Http\Request;

class GenreDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.genre.index',[
            'genres'=>Genre::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.genre.create',[
            'genres'=>Genre::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>'required|max:255',
            'slug'=>'required|unique:genres'
        ]);
        Genre::create($validatedData);
        return redirect()->route('genres.index')->with('success','New Genre Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return view('list.show',[
            'item'=>$genre
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('dashboard.genre.edit',[
            'genre'=>$genre
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $rules=[
            'name'=>'required|max:255'
        ];
        
        if($request->slug!=$genre->slug){
            $rules['slug']='required|unique:genres';
        }
        $validatedData=$request->validate($rules);
        $genre->update($validatedData);
        return redirect()->route('genres.index')->with('success','Genre Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        Genre::destroy($genre->id);
        return redirect()->route('genres.index')->with('success','Genre Has Been Deleted');
    }

   
}

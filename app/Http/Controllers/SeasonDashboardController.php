<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class SeasonDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.season.index',[
            'seasons'=>Season::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.season.create',[
            'seasons'=>Season::all()
        ]);//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>'required|max:255',
            'slug'=>'required|unique:seasons'
        ]);
        Season::create($validatedData);
        return redirect()->route('seasons.index')->with('success','New Season Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Season $season)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Season $season)
    {
        return view('dashboard.season.edit',[
            'season'=>$season
        ]
    );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Season $season)
    {
        $rules=[
            'name'=>'required|max:255'
        ];
        
        if($request->slug!=$season->slug){
            $rules['slug']='required|unique:seasons';
        }
        $validatedData=$request->validate($rules);
        $season->update($validatedData);
        return redirect()->route('seasons.index')->with('success','Season Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Season $season)
    {
        Season::destroy($season->id);
        return redirect()->route('seasons.index')->with('success','Season Has Been Deleted');
    }
   
}

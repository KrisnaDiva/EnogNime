<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Episode;
use App\Models\Link;
use Illuminate\Http\Request;

class EpisodeDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.episode.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Anime $anime)
    {
        
        return view('dashboard.episode.create',[
            'anime'=>$anime,
            'episode'=>$anime->episodes()->max('episode_number')
        ]);
    }
    public function createBy(Anime $anime)
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validatedData=$request->validate([
            'title'=>'required|max:255',
            'slug'=>'required|unique:episodes',
            'episode_number'=>'required|max:255',
        ]);
        $validatedData['anime_id']=$request->anime_id;
        $validatedData['user_id']=auth()->user()->id;
       $episode= Episode::create($validatedData);
       $slug=$request->animeslug;
        $jumlahlink=$request->inputlink;
         for($i=1;$i<=$jumlahlink;$i++){
             $name="link$i";
             Link::create([
                 'episode_id'=>$episode->id,
                 'url'=>$request->$name
             ]);
         }
        return redirect()->route('animes.index')->with('success','New Episode Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Episode $episode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Episode $episode)
    {
        return view('dashboard.episode.edit',[
            'episode'=>$episode,
            'links'=>$episode->links
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Episode $episode)
    {

        $rules=[
            'title'=>'required|max:255',
            'episode_number'=>'required|max:255',
           
        ];
        if($request->slug!=$episode->slug){
            $rules['slug']='required|unique:episodes';
        }
        $validatedData=$request->validate($rules);
       $episode->update($validatedData);
       $i=1;
      foreach($episode->links as $link){
       
           $name="link$i";
           Link::where('id', $link->id)->where('episode_id', $episode->id)
           ->update(['url' => $request->$name ]);
           $i++;
      }
     
        return redirect()->route('animes.index')->with('success','Episode Has Been Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Episode $episode)
    {
        //
    }
}

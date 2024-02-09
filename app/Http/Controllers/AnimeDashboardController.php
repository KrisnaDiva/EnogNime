<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\AnimeGenre;
use App\Models\AnimeStudio;
use App\Models\Genre;
use App\Models\Season;
use App\Models\Status;
use App\Models\Studio;
use App\Models\Type;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AnimeDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.anime.index',[
            'animes'=>Anime::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.anime.create',[
            'animes'=>Anime::all(),
            'statuses'=>Status::all(),
            'types'=>Type::all(),
            'seasons'=>Season::all(),
            'genres'=>Genre::all(),
            'studios'=>Studio::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $validatedData=$request->validate([
            'title'=> 'required|max:255',
            'slug'=>'required|unique:animes',
            'status_id'=>'required',
            'type_id'=>'required',
            'season_id'=>'required',
            'image'=>'image|file|max:1024', //satuan kb,harus tambahin file didepannnya agar dibaca kb
            'trailer'=> 'required|max:255',
            'rating'=> 'required|max:255',
            'total_episode'=> 'required|max:255',
            'release'=> 'required|max:255',
            'duration'=> 'required|max:255',
            'synopsis'=>'required'
        ]);
        if($request->file('image')){
            $validatedData['image']=$request->file('image')->store('anime-images');
        }
        $jumlahStudio=$request->inputStudio;
        $jumlahGenre=$request->inputGenre;

        try {
            DB::beginTransaction();
            $anime= Anime::create($validatedData);

        for($i=1;$i<=$jumlahStudio;$i++){
            $name="studio$i";
           $anime->studios()->attach($request->$name);
        }
        for($i=1;$i<=$jumlahGenre;$i++){
            $name="genre$i";
            $anime->genres()->attach($request->$name);
        }
            DB::commit();
            return redirect()->route('animes.index')->with('success','New Anime Has Been Added!');
        } catch (QueryException $error) {
            DB::rollBack();
            return redirect()->route('animes.index')->with('success',"Can't Add New Anime!");
        }       
       
        

        
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Anime $anime)
    {
       return view('dashboard.anime.show',[
        'anime'=>$anime,
        'episodes'=>$anime->episodes
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anime $anime)
    {
        return view('dashboard.anime.edit',[
            'anime'=>$anime,
            'statuses'=>Status::All(),
            'types'=>Type::All(),
            'seasons'=>Season::All(),
            'genres'=>Genre::All(),
            'studios'=>Studio::All()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anime $anime)
    {

        $rules=[
            'title'=> 'required|max:255',
            'status_id'=>'required',
            'type_id'=>'required',
            'season_id'=>'required',
            'image'=>'image|file|max:1024', //satuan kb,harus tambahin file didepannnya agar dibaca kb
            'trailer'=> 'required|max:255',
            'rating'=> 'required|max:255',
            'total_episode'=> 'required|max:255',
            'release'=> 'required|max:255',
            'duration'=> 'required|max:255',
            'synopsis'=>'required'
        ];
        if($request->slug!=$anime->slug){
            $rules['slug']='required|unique:animes';
        }
        $validatedData=$request->validate($rules);
        if($request->file('image')){
            if($anime->image){
                 Storage::delete($anime->image);
            }
            $validatedData['image']=$request->file('image')->store('anime-images');
        }


       $anime->update($validatedData);
       $i=1;
      foreach($anime->studios()->get() as $studio){
           $name="studio$i";
           AnimeStudio::where('anime_id', $anime->id)->where('studio_id', $studio->id)
           ->update(['studio_id' => $request->$name ]);
           $i++;
      }
      $i=1;
      foreach($anime->genres()->get() as $genre){
           $name="genre$i";
           AnimeGenre::where('anime_id', $anime->id)->where('genre_id', $genre->id)
           ->update(['genre_id' => $request->$name ]);
           $i++;
      }
        return redirect()->route('animes.index')->with('success','New Anime Has Been Added!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anime $anime)
    {
        //
    }

  
    
}

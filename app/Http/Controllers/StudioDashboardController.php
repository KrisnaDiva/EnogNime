<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;

class StudioDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.studio.index',[
            'studios'=>Studio::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.studio.create',[
            'studios'=>Studio::all()
        ]);//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>'required|max:255',
            'slug'=>'required|unique:studios'
        ]);
        Studio::create($validatedData);
        return redirect()->route('studios.index')->with('success','New Studio Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Studio $studio)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Studio $studio)
    {
        return view('dashboard.studio.edit',[
            'studio'=>$studio
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Studio $studio)
    {
        $rules=[
            'name'=>'required|max:255'
        ];
        
        if($request->slug!=$studio->slug){
            $rules['slug']='required|unique:studios';
        }
        $validatedData=$request->validate($rules);
        $studio->update($validatedData);
        return redirect()->route('studios.index')->with('success','Studio Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Studio $studio)
    {
        Studio::destroy($studio->id);
        return redirect()->route('studios.index')->with('success','Studio Has Been Deleted');
    }
}

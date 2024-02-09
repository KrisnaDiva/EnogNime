<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.type.index',[
            'types'=>Type::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.type.create',[
            'types'=>Type::all()
        ]);//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>'required|max:255',
            'slug'=>'required|unique:types'
        ]);
        Type::create($validatedData);
        return redirect()->route('types.index')->with('success','New Type Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('dashboard.type.edit',[
            'type'=>$type
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $rules=[
            'name'=>'required|max:255'
        ];
        
        if($request->slug!=$type->slug){
            $rules['slug']='required|unique:types';
        }
        $validatedData=$request->validate($rules);
        $type->update($validatedData);
        return redirect()->route('types.index')->with('success','Type Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        Type::destroy($type->id);
        return redirect()->route('types.index')->with('success','Type Has Been Deleted');
    }
}

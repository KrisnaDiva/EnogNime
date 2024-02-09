<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.status.index',[
            'statuses'=>status::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.status.create',[
            'statuses'=>status::all()
        ]);//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>'required|max:255',
            'slug'=>'required|unique:statuses'
        ]);
        Status::create($validatedData);
        return redirect()->route('statuses.index')->with('success','New Status Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        return view('dashboard.status.edit',[
            'status'=>$status
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Status $status)
    {
        $rules=[
            'name'=>'required|max:255'
        ];
        
        if($request->slug!=$status->slug){
            $rules['slug']='required|unique:statuses';
        }
        $validatedData=$request->validate($rules);
        $status->update($validatedData);
        return redirect()->route('statuses.index')->with('success','Status Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        Status::destroy($status->id);
        return redirect()->route('statuses.index')->with('success','Status Has Been Deleted');
    }
}

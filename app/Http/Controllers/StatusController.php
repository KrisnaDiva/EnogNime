<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        return view('list.index',[
            'items'=>Status::orderBy('name','asc')->get()
        ]);
    }
    public function show(Status $status)
    {
        return view('list.show',[
            'item'=>$status
        ]);
    }
}

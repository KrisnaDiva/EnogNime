<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return view('list.index',[
            'items'=>Type::orderBy('name','asc')->get()
        ]);
    }
    public function show(Type $type)
    {
        return view('list.show',[
            'item'=>$type
        ]);
    }
}

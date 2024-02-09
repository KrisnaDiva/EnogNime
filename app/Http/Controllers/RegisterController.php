<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password as RulesPassword;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index');
    }
    public function store(Request $request){
        $validatedData=$request->validate([
          'name'=>'required|max:255',
          'username'=>'required|min:3|max:255|unique:users',
          'email'=>'required|email:dns|unique:users',
          lo
         ]);
         $validatedData['password']=bcrypt($validatedData['password']);
         User::create($validatedData);
         //$request->session()->flash('success','Registration Success Please Login');
         return redirect()->route('login')->with('success','Registration Success Please Login');
      }
}

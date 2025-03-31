<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
       $request->valdate([
        'name'=>'requird|max:255',
        "email"=> 'required',
        'password'=> 'required',
       ]);

       $user = User::create($request->all());

       Auth::login($user);

       return redirect()->route('home')->with('success','user registered');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('home')->with('success','Lgout user');
    } 
}

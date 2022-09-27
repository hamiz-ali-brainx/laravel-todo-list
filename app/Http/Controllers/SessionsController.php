<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //login view
    public function create(){
    
        return view('sessions.login');
    }


    //authorize user from the database
    public function store(Request $request){
        $credentials = $request->validate([
            'email' => ['required'],
            'password'=> ['required'],
       ]) ;
    
    
        if(Auth::attempt($credentials)){
            session()->flash("success", 'Great! You have Successfully LoggedIn');
            return redirect('/');
        }

        return back()->withErrors(['email'=>'Credentials are not correct']);

    }

   //logout user
    
    public function destroy(){
       Auth::logout();
       return redirect('/login')->with('Success', 'Goodbye!');
    }
}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;




class RegistrationController extends Controller
{


        // return registration view
    public function registration()
    {
        return view('auth.registration');
    }


    // post user to the database
    public function postRegistration(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        

        $data = $request->all();
        $user = $this->create($data);
        Auth::login($user);
        session()->flash("success", 'Great! You have Successfully Registered Yourself');
        return redirect("/");
    }


    //create user
    public function create(array $data){
        return User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password'])
        ]);
    }
}

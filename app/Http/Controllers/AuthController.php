<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //display the form for sign in
    public function create()
    {
        return inertia('Auth/Login');
    }

    //handle the form when login is submitted,create the session
    public function store(Request $request)
    {
        //validate the data
        if(! Auth::attempt($request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string',
            ]),true)){
                throw  ValidationException::withMessages([
                    'email' => 'Authentication failed'
                ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/listing');
    }
    //user logs out
    public function destroy()
    {

    }
}

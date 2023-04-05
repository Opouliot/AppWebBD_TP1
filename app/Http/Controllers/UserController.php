<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
     {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if(Auth::attempt($credentials))
        {

            $token = $request->user()->createToken('token');
        }

        return ['token' => $token->plainTextToken];
    }
    
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }
}

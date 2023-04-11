<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $token = $request->user()->createToken('token');
        }

        return ['token' => $token->plainTextToken];
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }

    public function show(string $id)
    {
        if (Auth::user()->id != $id) {
            throw new Exception("Vous n'avez pas accès à ce profil!", 403);
        }
        return (new UserResource(User::find($id)))->response()->setStatusCode(200);
    }

    public function store(Request $request)
    {


        if (User::all()->where('email', $request->email)->count() >= 1) {
            throw new Exception("Cet email est déjà utilisé!", 403);
        }
        $user = User::create($request->all());
        return $user;
    }

    public function update(Request $request, string $id)
    {
        if (Auth::user()->id != $id) {
            throw new Exception("Vous n'avez pas accès à ce profil!", 403);
        }

        $user = User::find($id);

        if (User::all()->where('email', $request->email)->count() >= 1) {
            throw new Exception("Cet email est déjà utilisé!", 403);
        }
        $user->email = $request->email;
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->role_id = $request->role_id;
        $user->update();
        return $user;
    }

    public function updatePassword(Request $request, string $id)
    {
        if (Auth::user()->id != $id) {
            throw new Exception("Vous n'avez pas accès à ce profil!", 403);
        }

        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->update();
        return $user;
    }
}

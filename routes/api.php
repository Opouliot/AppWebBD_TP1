<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("films", "App\Http\Controllers\FilmController@index");
Route::get("films/{id}", "App\Http\Controllers\FilmController@show");
// CHECKER MODEL ACTOR_FILM DVRAIT ETRE ROUTE ENTRE ACTORS et FILMS BELONGSTOMANY AT BELONGS TO MANY
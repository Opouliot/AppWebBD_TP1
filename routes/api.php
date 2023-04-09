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
Route::get("films/{id}/actors", "App\Http\Controllers\FilmController@showActors");
Route::post("films", "App\Http\Controllers\FilmController@store")->middleware('auth:sanctum', 'admin');
Route::post("login", "App\Http\Controllers\UserController@login");
route::post("logout", "App\Http\Controllers\UserController@logout")->middleware('auth:sanctum');
route::delete("films/{id}", "App\Http\Controllers\FilmController@destroy")->middleware('auth:sanctum', 'admin');
route::post("critics", "App\Http\Controllers\CriticController@store")->middleware('auth:sanctum', 'only_one_review');
route::get("user/{id}", "App\Http\Controllers\UserController@show")->middleware('auth:sanctum');
route::post("user", "App\Http\Controllers\UserController@store");
route::patch("user/{id}", "App\Http\Controllers\UserController@update")->middleware('auth:sanctum');
route::patch("user/{id}/password", "App\Http\Controllers\UserController@updatePassword")->middleware('auth:sanctum');
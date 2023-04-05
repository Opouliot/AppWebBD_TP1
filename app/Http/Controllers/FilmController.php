<?php

namespace App\Http\Controllers;

use App\Http\Resources\FilmResourceNoActorsNoCritics;
use App\Http\Resources\FilmResource;
use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FilmResourceNoActorsNoCritics::collection(Film::all())->response()->setStatusCode(200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $film = Film::create($request->all());
        return $film;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return (new FilmResource(Film::find($id)))->response()->setStatusCode(200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showActors(string $id)
    {
        return Film::find($id)->actors;
    }
}

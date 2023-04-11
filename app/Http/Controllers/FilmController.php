<?php

namespace App\Http\Controllers;

use App\Http\Resources\FilmResourceNoActorsNoCritics;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Database\Events\QueryExecuted;
use Exception;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if (!$request->hasAny(['keywords', 'rating', 'maxlength'])) {
                return FilmResourceNoActorsNoCritics::collection(Film::all())->response()->setStatusCode(200);
            }

            $films = DB::table('films');

            if ($request->has('keywords')) {
                $films->where('title', $request->keywords);
            }

            if ($request->has('rating')) {
                $films->where('rating', $request->rating);
            }

            if ($request->has('maxlength')) {
                $films->where('length', $request->maxlength);
            }

            return $films->get();
        } catch (Exception $ex) {
            abort(500, 'server error');
        }
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'release_year' => 'required',
            'length' => 'required',
            'description' => 'required',
            'rating' => 'required',
            'language_id' => 'required',
            'special_features' => 'required',
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            abort(422, 'Invalid data');
        }

        $film = Film::create($request->all());
        return $film;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            return (new FilmResource(Film::findOrFail($id)))->response()->setStatusCode(200);
        } catch (QueryException $ex) {
            abort(404, 'Invalid id');
        } catch (Exception $ex) {
            abort(500, 'server error');
        }
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
        return Film::destroy($id);
    }

    public function showActors(string $id)
    {
        try {
            return Film::findOrFail($id)->actors;
        } catch (QueryException $ex) {
            abort(404, 'Invalid id');
        } catch (Exception $ex) {
            abort(500, 'server error');
        }
    }
}

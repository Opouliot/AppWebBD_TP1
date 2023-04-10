<?php

namespace App\Http\Controllers;

use App\Models\Critic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CriticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

            'user_id' => 'required',
            'film_id' => 'required',
            'score' => 'required',
            'comment' => 'required'
        ]);

        if ($validator->fails()) {
            abort(422, 'Invalid data');
        }

        $critic = Critic::create($request->all());
        return $critic;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}

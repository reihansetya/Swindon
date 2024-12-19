<?php

namespace App\Http\Controllers;

use App\Models\Lyrics;
use App\Http\Requests\StoreLyricsRequest;
use App\Http\Requests\UpdateLyricsRequest;

class LyricsController extends Controller
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
    public function store(StoreLyricsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Lyrics $lyrics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lyrics $lyrics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLyricsRequest $request, Lyrics $lyrics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lyrics $lyrics)
    {
        //
    }
}

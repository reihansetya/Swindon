<?php

namespace App\Http\Controllers;

use App\Models\Albums;
use App\Http\Requests\StoreAlbumsRequest;
use App\Http\Requests\UpdateAlbumsRequest;

class AlbumsController extends Controller
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
    public function store(StoreAlbumsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        $album = Albums::where('slug', $slug)->firstOrFail();
        $release = date('Y', strtotime($album->release_date));
        $albumWithSingle = $album->with('singles')->first();

        return view('discography.album', compact('album', 'release', 'albumWithSingle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Albums $albums)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumsRequest $request, Albums $albums)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Albums $albums)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Singles;
use App\Http\Requests\StoreSinglesRequest;
use App\Http\Requests\UpdateSinglesRequest;

class SinglesController extends Controller
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
    public function store(StoreSinglesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        $single = Singles::where('slug', $slug)->firstOrFail();

        return view('discography.single', compact('single'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Singles $singles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSinglesRequest $request, Singles $singles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Singles $singles)
    {
        //
    }
}

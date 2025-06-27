<?php

namespace App\Http\Controllers;

use App\Models\Singles;
use App\Http\Requests\StoreSinglesRequest;
use App\Http\Requests\UpdateSinglesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    public function store(Request $request)
    {
        //
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            // 'album_id' => 'required|integer|exists:albums,id',
            // 'category' => 'required|integer|exists:categories,id',
            'release_date' => 'nullable|date',
            'spotify_url' => 'nullable|url',
        ]);

        // Jika validasi gagal, return response dengan error
        if ($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'errors' => $validator->errors(),
                ],
                422,
            );
        }

        // Generate slug dari title
        $slug = Str::slug($request->title);

        // Check jika slug sudah ada, tambahkan angka di belakang jika perlu
        $originalSlug = $slug;
        $counter = 1;
        while (Singles::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Simpan data ke dalam database
        $single = Singles::create([
            'id' => Str::uuid()->toString(), // Generate UUID
            'title' => $request->title,
            'slug' => $slug,
            'album_id' => $request->album,
            'category_id' => 2,
            'release_date' => $request->release_date,
            'spotify_url' => $request->spotify_url,
            'description' => $request->description,
            'produced_by' => $request->produced_by,
            'recorded_at' => $request->recorded_at,
        ]);

        //Return response sukses
        return redirect()->back()->with('success', 'Single berhasil ditambahkan!');

        //retrun ke halaman sebelumnya
        // return redirect()->back()->with('success', 'Album berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        $single = Singles::where('slug', $slug)->firstOrFail();
        $release = date('Y', strtotime($single->release_date));


        return view('discography.single', compact('single', 'release'));
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

<?php

namespace App\Http\Controllers;

use App\Models\Albums;
use App\Http\Requests\StoreAlbumsRequest;
use App\Http\Requests\UpdateAlbumsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showCreateAlbum()
    {
        return view('admin.create_album');
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
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
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
        while (Albums::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Simpan data ke dalam database
        $album = Albums::create([
            'id' => Str::uuid()->toString(), // Generate UUID
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => 1,
            'release_date' => $request->release_date,
            'spotify_url' => $request->spotify_url,
            'description' => $request->description,
            'produced_by' => $request->produced_by,
            'recorded_at' => $request->recorded_at,
        ]);

        // Return response sukses
        // return response()->json(
        //     [
        //         'success' => true,
        //         'data' => $album,
        //     ],
        //     201,
        // );

        //retrun ke halaman sebelumnya
        return redirect()->back()->with('success', 'Album berhasil ditambahkan!');
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

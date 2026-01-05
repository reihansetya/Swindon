<?php

namespace App\Http\Controllers;

use App\Models\Singles;
use App\Http\Requests\StoreSinglesRequest;
use App\Http\Requests\UpdateSinglesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Images;

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
        // dd($request);

        //
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            // 'album_id' => 'required|integer|exists:albums,id',
            // 'category' => 'required|integer|exists:categories,id',
            'release_date' => 'nullable|date',
            'spotify_url' => 'nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);


        if ($validator->fails()) {
            // 2. UBAH RESPONS VALIDATOR
            // Kita redirect kembali ke halaman form dengan error-nya
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(); // withInput() agar data yg sudah diisi tidak hilang
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

        $albumId = $request->album;

        // Simpan data ke dalam database
        $single = Singles::create([
            'id' => Str::uuid()->toString(), // Generate UUID
            'title' => $request->title,
            'slug' => $slug,
            'album_id' => $albumId,
            'category_id' => 2,
            'release_date' => $request->release_date,
            'spotify_url' => $request->spotify_url,
            'description' => $request->description,
            'produced_by' => $request->produced_by,
            'recorded_at' => $request->recorded_at,
        ]);

        // === 3. TAMBAHKAN LOGIKA UPLOAD GAMBAR === //
        if ($request->hasFile('image')) {
            // 1. Simpan file gambar ke storage/app/public/images
            $imagePath = $request->file('image')->store('images', 'public');

            // 2. Gunakan updateOrCreate untuk menyimpan ke tabel 'images'
            // Ini akan membuat gambar baru yg terhubung dgn $single->id
            // Sesuai dengan logika one-to-one yang kita bahas sebelumnya.
            Images::updateOrCreate(
                ['single_id' => $single->id], // Kunci pencarian
                [
                    'id' => Str::uuid()->toString(),
                    'image_path' => $imagePath,
                    'type' => 'single', // Tipe 'single'
                    'album_id' => $albumId ? $albumId : null // Pastikan album_id null
                ]
            );

            $image_id = Images::where('single_id', $single->id)->first()->id;

            Singles::where('id', $single->id)->update(['image_id' => $image_id]);
        }

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

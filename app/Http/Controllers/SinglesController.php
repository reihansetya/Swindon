<?php

namespace App\Http\Controllers;

use App\Models\Singles;
use App\Models\Albums;
use App\Models\Category;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SinglesController extends Controller
{
    protected ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

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
     * Menyimpan single baru ke database.
     */
    public function store(Request $request)
    {
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

        // === UPLOAD GAMBAR MENGGUNAKAN ImageService === //
        if ($request->hasFile('image')) {
            try {
                // Gunakan ImageService untuk menyimpan gambar
                $this->imageService->storeImage(
                    $request->file('image'),
                    $single->id,
                    'single',
                    $albumId
                );
            } catch (\Exception $e) {
                // Jika gagal upload gambar, hapus single yang baru dibuat
                $single->delete();

                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Gagal mengunggah gambar: ' . $e->getMessage());
            }
        }

        // Return response sukses
        return redirect()->back()->with('success', 'Single berhasil ditambahkan!');
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
    public function edit($id)
    {
        $single = Singles::with('lyrics')->findOrFail($id);
        // Gunakan nama jamak agar sesuai dengan isi compact
        $albums = Albums::all();
        $categories = Category::all();

        return view('admin.edit_single', compact('single', 'albums', 'categories'));
    }

    /**
     * Memperbarui data single yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        $single = Singles::findOrFail($id);

        // Validasi input (release_date dibuat nullable agar sinkron dengan database)
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'release_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg',
        ]);

        // Update data teks single
        $single->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'album_id' => $request->album_id,
            'category_id' => $request->category_id,
            'release_date' => $request->release_date,
            'genre' => $request->genre,
            'spotify_url' => $request->spotify_url,
            'youtube_embed' => $request->youtube_embed,
            'description' => $request->description,
            'produced_by' => $request->produced_by,
            'recorded_at' => $request->recorded_at,
        ]);

        // === UPLOAD GAMBAR MENGGUNAKAN ImageService (menggantikan gambar lama secara otomatis) === //
        if ($request->hasFile('image')) {
            try {
                // Gunakan ImageService untuk menyimpan gambar (otomatis hapus gambar lama)
                $this->imageService->storeImage(
                    $request->file('image'),
                    $single->id,
                    'single',
                    $request->album_id
                );
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Gagal mengunggah gambar: ' . $e->getMessage());
            }
        }

        return redirect()->route('admin.dashboard')->with('success', 'Single updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $single = Singles::findOrFail($id);
        $single->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Single deleted successfully');
    }
}

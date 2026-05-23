<?php

namespace App\Http\Controllers;

use App\Models\Albums;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Services\ImageService;

class AlbumsController extends Controller
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
            'image' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);

        // Jika validasi gagal, return response dengan error
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
        while (Albums::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Simpan data ke dalam database
        $album = Albums::create([
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => 1,
            'release_date' => $request->release_date,
            'spotify_url' => $request->spotify_url,
            'description' => $request->description,
            'produced_by' => $request->produced_by,
            'recorded_at' => $request->recorded_at
        ]);

        // Proses upload gambar menggunakan ImageService
        if ($request->hasFile('image')) {
            try {
                $this->imageService->storeImage(
                    $request->file('image'),
                    $album->id,
                    'album'
                );
            } catch (\Exception $e) {
                // Jika penyimpanan gambar gagal, hapus album yang baru dibuat
                $album->delete();

                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Gagal mengunggah gambar. Silakan coba lagi.');
            }
        }

        // Return ke halaman sebelumnya dengan pesan sukses
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

    public function edit($id)
    {
        $album = Albums::findOrFail($id);
        return view('admin.edit_album', compact('album'));
    }

    public function update(Request $request, $id)
    {
        $album = Albums::findOrFail($id);

        // Validasi input termasuk gambar (opsional saat update)
        $request->validate([
            'title' => 'required',
            'release_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg'
        ]);

        // Perbarui data album
        $album->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'release_date' => $request->release_date,
            'description' => $request->description,
            'produced_by' => $request->produced_by,
            'recorded_at' => $request->recorded_at,
        ]);

        // Proses upload gambar baru menggunakan ImageService (otomatis menghapus gambar lama)
        if ($request->hasFile('image')) {
            try {
                $this->imageService->storeImage(
                    $request->file('image'),
                    $album->id,
                    'album'
                );
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Gagal mengunggah gambar: ' . $e->getMessage());
            }
        }

        return redirect()->route('admin.dashboard')->with('success', 'Album updated successfully');
    }

    public function destroy($id)
    {
        $album = Albums::findOrFail($id);
        $album->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Album deleted successfully');
    }
}

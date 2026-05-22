<?php

namespace App\Http\Controllers;

use App\Models\Lyrics;
use App\Models\Singles;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LyricsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // For lyrics index, we might just redirect to dashboard
        // as the list is shown there in this app's flow
        return redirect()->route('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Ambil data singles untuk dropdown pilihan lagu
        $singles = Singles::all();
        $selectedSingleId = $request->query('single_id');

        return view('admin.create_lyric', compact('singles', 'selectedSingleId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'single_id' => 'required|exists:singles,id',
            'lyrics_text' => 'required|string',
        ]);

        // Pastikan belum ada lirik untuk single ini sebelumnya
        $existingLyric = Lyrics::where('single_id', $request->single_id)->first();
        if ($existingLyric) {
            return redirect()->back()
                ->withErrors(['single_id' => 'Lagu ini sudah memiliki lirik! Silakan edit lirik yang ada.'])
                ->withInput();
        }

        // Ambil data single untuk referensi penamaan slug
        $single = Singles::findOrFail($request->single_id);

        $slug = Str::slug($single->title . '-lyrics');

        // Check if slug already exists, append counter if necessary
        $originalSlug = $slug;
        $counter = 1;
        while (Lyrics::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        Lyrics::create([
            'single_id' => $request->single_id,
            'lyrics_text' => $request->lyrics_text,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Lirik berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lyric = Lyrics::findOrFail($id);
        $singles = Singles::all();

        return view('admin.edit_lyric', compact('lyric', 'singles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lyric = Lyrics::findOrFail($id);

        $request->validate([
            'single_id' => 'required|exists:singles,id',
            'lyrics_text' => 'required|string',
        ]);

        // Cek jika lagu diubah, pastikan lagu baru belum punya lirik (kecuali milik lirik ini sendiri)
        if ($request->single_id != $lyric->single_id) {
            $existingLyric = Lyrics::where('single_id', $request->single_id)->first();
            if ($existingLyric) {
                return redirect()->back()
                    ->withErrors(['single_id' => 'Lagu yang Anda pilih sudah memiliki lirik lain!'])
                    ->withInput();
            }
        }

        $single = Singles::findOrFail($request->single_id);
        $slug = Str::slug($single->title . '-lyrics');

        // Check if slug already exists, ignore current lyric's slug
        $originalSlug = $slug;
        $counter = 1;
        while (Lyrics::where('slug', $slug)->where('id', '!=', $lyric->id)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $lyric->update([
            'single_id' => $request->single_id,
            'lyrics_text' => $request->lyrics_text,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Lirik berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lyric = Lyrics::findOrFail($id);
        $lyric->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Lirik berhasil dihapus!');
    }
}

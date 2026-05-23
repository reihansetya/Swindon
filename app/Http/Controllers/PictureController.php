<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    public function index()
    {
        return view('admin/insert_picture');
    }

    public function store(Request $req)
    {
        $req->validate([
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if (!$req->hasFile('image')) {
            return back()->withErrors(['image' => 'No image file was uploaded.']);
        }

        // Logika One-to-Many untuk General (Footage)
        foreach ($req->file('image') as $file) {
            $imagePath = $file->store('images', 'public');
            Images::create([
                'id' => Str::uuid(),
                'image_path' => $imagePath,
                'type' => 'general',
                'album_id' => null,
                'single_id' => null
            ]);
        }

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }

    /**
     * Menghapus gambar dari storage dan database.
     */
    public function destroy($id)
    {
        $image = Images::findOrFail($id);

        // Hapus file fisik dari storage
        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        // Hapus record dari database
        $image->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Gambar berhasil dihapus.');
    }
}

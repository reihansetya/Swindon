<?php

namespace App\Http\Controllers;

use App\Models\Albums;
use App\Models\Category;
use App\Models\Singles;
use Illuminate\Http\Request;
use App\Models\Images;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator; // Pastikan Validator di-import

class PictureController extends Controller
{
    public function index()
    {
        return view('admin/insert_picture');
    }

    public function store(Request $req)
    {
        $req->validate([
            // 'category' => 'required|in:Album,Single,General',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if (!$req->hasFile('image')) {
            return back()->withErrors(['image' => 'No image file was uploaded.']);
        }
        // Logika One-to-Many untuk General (Footage)
        // Di sini, kita biarkan loop karena 'General' boleh banyak
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
}

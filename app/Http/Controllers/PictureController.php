<?php

namespace App\Http\Controllers;

use App\Models\Albums;
use App\Models\Category;
use App\Models\Singles;
use Illuminate\Http\Request;
use App\Models\Images;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PictureController extends Controller
{
    public function index()
    {
        $albums = Albums::all();
        $singles = Singles::all();
        $category = Category::all();

        return view('admin/insert_picture', compact('albums', 'singles', 'category'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'category' => 'required|in:Album,Single,General',
            'album_id' => 'nullable|exists:albums,id',
            'single_id' => 'nullable|exists:singles,id',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        // Handle the uploaded picture
        if ($req->hasFile('image')) {
            foreach ($req->file('image') as $file) {
                $imagePath = $file->store('images', 'public');

                $image = new Images();
                $image->id = Str::uuid();
                $image->image_path = $imagePath;
                $image->type = strtolower($req->category);

                if ($req->category === 'Album') {
                    $image->album_id = $req->album_id;
                } elseif ($req->category === 'Single') {
                    $image->single_id = $req->single_id;
                }

                $image->save();

                // return redirect()->back()->with('success', 'Image uploaded successfully.');
            }
        } else {
            return back()->withErrors(['image' => 'No image file was uploaded.']);
        }

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }
}

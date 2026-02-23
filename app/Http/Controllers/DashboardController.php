<?php

namespace App\Http\Controllers;

use App\Models\Albums;
use App\Models\Images;
use App\Models\Singles;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Optimation: Eager loading and reduced queries
        $albumWithImage = Albums::with('images')->get();
        $singleWithImage = Singles::with('images')->get();

        // Merge collections if all combined data is needed
        $albumsAndSingles = $albumWithImage->merge($singleWithImage);

        // Keep 'albums' and 'singles' variables for backward compatibility in view,
        // since $albumWithImage is literally all albums now.
        $albums = $albumWithImage;
        $singles = $singleWithImage;

        return view('admin.dashboard', compact('albums', 'singles', 'albumsAndSingles', 'albumWithImage', 'singleWithImage'));
    }

    public function showAllData() {}
}

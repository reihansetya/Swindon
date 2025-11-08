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
        $albums = Albums::all();
        $singles = Singles::all();
        $images = Images::all();

        // $albumWithImages = Albums::whereHas('images', function ($query) {
        //     $query->whereNotNull('id');
        // })
        //     ->with('images')
        //     ->get();

        $albumWithImage = Albums::with('images')->get();
        $singleWithImage = Singles::with('images')->get(); ;

        $albumsAndSingles = $albums->merge($singles);

        return view('admin.dashboard', compact('albums', 'singles', 'albumsAndSingles', 'albumWithImage', 'singleWithImage'));
    }

    public function showAllData() {}
}

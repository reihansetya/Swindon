<?php

namespace App\Http\Controllers;

use App\Models\Albums;
use App\Models\Lyrics;
use App\Models\Singles;
use Attribute;
use Illuminate\Http\Request;

class DiscographyController extends Controller
{
    //
    public function index(Request $request)
    {
        $type = $request->query('type', 'all');

        if ($type === 'albums') {
            $items = Albums::all();
        } elseif ($type === 'singles') {
            $items = Singles::all();
        } else {
            $albums = Albums::all();
            $singles = Singles::all();
            $items = $albums->merge($singles);
        }

        return view('discography.index', compact('items', 'type'));
    }

    public function albumShow($slug)
    {
        $album = Albums::where('slug', $slug)->firstOrFail();
        $release = date('Y', strtotime($album->release_date));
        $albumWithSingle = $album->singles()->get();

        return view('discography.album', compact('album', 'release', 'albumWithSingle'));
    }

    public function singleShow($slug)
    {
        $single = Singles::where('slug', $slug)->firstOrFail();
        $release = date('Y', strtotime($single->release_date));
        $lyricsWithSingle = $single->with('lyrics')->first();

        return view('discography.single', compact('single', 'release', 'lyricsWithSingle'));
    }
}

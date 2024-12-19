<?php

namespace App\Http\Controllers;

use App\Models\Albums;
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
            $items = $albums->merge($singles)->sortByDesc('release_date');
        }

        return view('discography.index', compact('items', 'type'));
    }
}

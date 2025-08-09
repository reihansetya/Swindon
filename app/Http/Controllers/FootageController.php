<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;

class FootageController extends Controller
{
    //

    public function index()
    {
        $images = Images::latest()->get();
        return view('footage', compact('images'));
    }
}

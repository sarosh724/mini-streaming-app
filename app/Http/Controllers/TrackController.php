<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index($category){

        $tracks = Track::where('category', $category)->get();

        return view('music',compact('tracks', 'category'));
    }

    public function show($category, $id){
        $track = Track::find($id);

        return view('single-music', compact('track', 'category'));
    }

    public function listing()
    {
        $tracks = Track::all();

        return view('welcome', compact(['tracks']));
    }
}

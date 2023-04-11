<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index(Request $request, $category){

        $search = $request->search;
        if(strlen($search) > 0){
            $tracks = Track::where('title', 'like', '%'.$request->search.'%')->get();
        }
        else {
            $tracks = Track::where('category', $category)->get();
        }

        return view('music',compact('tracks', 'category', 'search'));
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

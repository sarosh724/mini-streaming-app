<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index($category){
        $music = Music::where('category', $category)->get();

//        return view('',compact('music'));
    }
}

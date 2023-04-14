<?php

namespace App\Http\Controllers;

use App\Models\MusicCategory;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $data = [];
        $musicCategories = MusicCategory::pluck('name','id')->toArray();
        $i=0;
        foreach ($musicCategories as $key => $item){
            $data['data'][$i]['name'] = $item;
            $data['data'][$i]['y'] = Track::where('music_category_id', $key)->count();
            $i++;
        }

//        return $data;

        return view('admin.dashboard', compact('data'));
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()
                ->regenerate();

            return redirect('admin');
        }

        return back()
            ->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ])
            ->onlyInput('username');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $overAllRating = Rate::where('track_id', $id)->select(DB::raw('SUM(rating) AS sum, COUNT(*) AS count'))->get();
        $avgRating = $overAllRating[0]->count <> 0 ? round(($overAllRating[0]->sum / $overAllRating[0]->count),1) : 0;
        $personalRating = Rate::where('track_id', $id)->where('user_id', Auth::id())->first();

        return view('single-music', compact('track', 'category', 'personalRating', 'avgRating'));
    }

    public function listing()
    {
        $tracks = Track::all();

        return view('welcome', compact(['tracks']));
    }

    function rateTrack(Request $request){
        if($request->action == 'add/update'){
            $rate = Rate::where('track_id',$request->track_id)->where('user_id', Auth::id())->first();
            if($rate){
                $rate->update(['rating' => $request->rating]);
            }
            else{
                Rate::create(['user_id' => Auth::id(), 'track_id' => $request->track_id, 'rating' => $request->rating]);
            }
        }
        else{
            Rate::where('track_id',$request->track_id)->where('user_id', Auth::id())->delete();
        }

        return true;
    }
}

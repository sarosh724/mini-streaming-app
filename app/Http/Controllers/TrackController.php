<?php

namespace App\Http\Controllers;

use App\Models\MusicCategory;
use App\Models\Rate;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class TrackController extends Controller
{
    public function index(Request $request, $category){

        if(!(MusicCategory::find($category))){
            abort('404');
        }
        $search = $request->search;
        if(strlen($search) > 0){
            $tracks = Track::with('category')->where('music_category_id', $category)
                ->where('title', 'like', '%'.$request->search.'%')
                ->get();
        }
        else {
            $tracks = Track::with('category')->where('music_category_id', $category)->get();
        }

        return view('music',compact('tracks', 'category', 'search'));
    }

    public function show($category, $id){
        if(!(MusicCategory::find($category)) || !(Track::find($id))){
            abort('404');
        }
        $track = Track::with('category')->find($id);
        $overAllRating = Rate::where('track_id', $id)->select(DB::raw('SUM(rating) AS sum, COUNT(*) AS count'))->get();
        $avgRating = $overAllRating[0]->count <> 0 ? round(($overAllRating[0]->sum / $overAllRating[0]->count),1) : 0;
        $personalRating = Rate::where('track_id', $id)->where('user_id', Auth::id())->first();

        return view('single-music', compact('track', 'category', 'personalRating', 'avgRating'));
    }

    public function listing(Request $request)
    {
        $search = $request->search;
        if(strlen($search) > 0){
            $tracks = Track::where('title', 'like', '%'.$request->search.'%')
                ->get();
        }
        else {
            $tracks = Track::all();
        }

        $musicCategories = MusicCategory::all();

        return view('welcome', compact(['tracks', 'musicCategories','search']));
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

    public function trackListing(Request $request)
    {
        if($request->category_id){
            $data = Track::with('category')->where('music_category_id', $request->category_id)->get();
        }
        else{
            $data = Track::with('category')->get();
        }

        if ($request->param == 'json') {
            return response()->json(['data' => $data]);
        }
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('title', function ($data) {
                    return $data->title;
                })
                ->addColumn('type', function ($data) {
                    return $data->type;
                })
                ->addColumn('category', function ($data) {
                    return $data->category->name;
                })
                ->addColumn('actions', function ($data) {
                    $actions = '<div class="d-flex"><a href="javascript:void(0);" data-id="' . $data->id . '"class="btn btn-sm btn-edit btn-primary mr-1" ><i class="fal fa-edit mr-1"></i>Edit</a>
                                <a href="javascript:void(0);" data-id="' . $data->id . '"class="btn btn-sm btn-delete btn-danger" >Delete</a></div>';
                    return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('admin.track.listing');
    }

    public function trackModal($id = null)
    {
        $musicCategories = MusicCategory::all();
        if (isset($id)) {
            $res['title'] = 'Edit Music Track';
            $data = Track::find($id);
            $res['html'] = view('admin.track.form', compact(['data','musicCategories']))->render();
        } else {
            $res['title'] = 'Add Music Track';
            $res['html'] = view('admin.track.form',compact('musicCategories'))->render();
        }

        return response()->json($res);
    }

    public function store(Request $request, $id=null)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'category' => 'required',
            'track_file'  =>  'required|file|mimes:mp3,mp4|max:20000',
            'track_thumbnail' => 'required|file|image|mimes:jpeg,png,jpg|max:2000'
        ]);

        if ($validate->fails()) {
            return redirect('admin/track')->withErrors($validate->errors());
        }

        $thumbNailDestinationPath = 'assets/thumbnails';
        $extension = $request->track_file->extension();

        if($extension == 'mp4'){
            $destinationPath = 'assets/videos';
            $type = 'video';
        }
        else{
            $destinationPath = 'assets/audios';
            $type = 'audio';
        }

        $file = time().$request->track_file->getClientOriginalName();
        $request->track_file->move(public_path($destinationPath), $file);

        $thumbnail = time().$request->track_thumbnail->getClientOriginalName();
        $request->track_thumbnail->move(public_path($thumbNailDestinationPath), $thumbnail);

        try {
            DB::beginTransaction();
            $musicTracl = $id ? Track::find($id) : new Track();
            $musicTracl->title = $request->title;
            $musicTracl->music_category_id = $request->category;
            $musicTracl->file_path = $file;
            $musicTracl->thumbnail_path = $thumbnail;
            $musicTracl->type = $type;
            $musicTracl->save();
            DB::commit();

            return redirect('admin/track');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect('admin/track');
        }

    }

    public function destroy(Track $track, $id)
    {
        $track = $track::find($id);
        if (!$track) {
            $res['success'] = 0;
            $res['message'] = 'Track Not Found';
        } else {
            $track->destroy($id);
            $res['success'] = 1;
        }

        return response()->json($res);
    }

}

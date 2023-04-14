<?php

namespace App\Http\Controllers;

use App\Models\MusicCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class MusicCategoryController extends Controller
{
    public function index(Request $request)
    {
        $data = MusicCategory::all();
        if ($request->param == 'json') {
            return response()->json(['data' => $data]);
        }
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('actions', function ($data) {
                    $actions = '<div class="d-flex"><a href="javascript:void(0);" data-id="' . $data->id . '"class="btn btn-sm btn-edit btn-primary mr-1" ><i class="fal fa-edit mr-1"></i>Edit</a>
                                <a href="javascript:void(0);" data-id="' . $data->id . '"class="btn btn-sm btn-delete btn-danger" >Delete</a></div>';
                    return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('admin.music-category.listing');
    }

    public function musicCategoryModal($id = null)
    {
        if (isset($id)) {
            $res['title'] = 'Edit Music Category';
            $data = MusicCategory::find($id);
            $res['html'] = view('admin.music-category.form', compact(['data']))->render();
        } else {
            $res['title'] = 'Add Music Category';
            $res['html'] = view('admin.music-category.form')->render();
        }

        return response()->json($res);
    }

    public function store(Request $request, $id=null)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect('admin/music-category')->withErrors($validate->errors());
        }
        try {
            DB::beginTransaction();
            $musicCategory = $id ? MusicCategory::find($id) : new MusicCategory();
            $musicCategory->name = $request->name;
            $musicCategory->save();
            DB::commit();

            return redirect('admin/music-category');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect('admin/music-category');
        }
    }

    public function destroy(MusicCategory $musicCategory, $id)
    {
        $musicCategory = $musicCategory::find($id);
        if (!$musicCategory) {
            $res['success'] = 0;
            $res['message'] = 'Music Category Not Found';
        } else {
            $musicCategory->destroy($id);
            $res['success'] = 1;
        }

        return response()->json($res);
    }
}

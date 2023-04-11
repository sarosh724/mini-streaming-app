<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller

{

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */

    public function store(Request $request)
    {
        if(!Auth::check()){
            return redirect('/login');
        }

        $request->validate([

            'body' => 'required',

        ]);

        $input = $request->all();

        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return back();
    }
}

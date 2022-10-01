<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'comment'=>'required',
        ]);
        $input['user_id'] = auth()->user()->id;
        // $input['parent_id'] = 0;
        Comment::create($input);
        return back();
    }
    public function reply(Request $request)
    {
        // \dd($request->all());
        $request->validate([
            'comment'=>'required',
        ]);
        $reply = $request->all();
        $reply['user_id'] = auth()->user()->id;
        // \dd($reply);
        Comment::create($reply);
        $rep = Comment::all();
        // \dd($rep);
        return \view('product-detail',\compact('rep'));
    }
}

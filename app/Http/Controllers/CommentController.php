<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Post $post , Request $request){

        request()->validate([
            'body' => 'required',
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $request->input('body')
        ]);

        return back();
    }

}

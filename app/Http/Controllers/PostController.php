<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index')->with([
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show')->with([
            'post' => $post,
            'comments' => $post->comments
        ]);
    }
}

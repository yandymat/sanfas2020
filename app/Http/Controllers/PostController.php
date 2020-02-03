<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function details($slug)
    {
        $tag = Tag::all();
        $post = Post::where('slug',$slug)->first();
        $randoposts = Post::all()->random(3);
        return view('post', compact('post','randoposts','tag'));
    }
}

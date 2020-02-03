<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Tag;
use App\Pays;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_approved',false)->get();
        $tags = Tag::latest()->get();
        $pays = Pays::latest()->get();
        $sliders = Slider::latest()->get();
        return view('admin.dashboard', compact('posts','tags','pays','sliders'));
    }
}

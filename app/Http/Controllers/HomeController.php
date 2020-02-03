<?php

namespace App\Http\Controllers;

use App\Universite;
use App\Slider;
use App\Pays;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->take(3)->get();
        $pays = Pays::all();
        $sliders = Slider::latest()->get();
        $universites = Universite::latest()->get();
        return view('welcome',compact('posts','pays','sliders','universites'));
    }
    public function apropos()
    {
        return view('page.apropos');
    }

    public function opportunite()
    {
        $posts = Post::where('is_approved',true)->orderby('id','desc')->get();
        $pays = Pays::all();
        return view('page.opportunite',compact('posts','pays'));
    }

    public function universite()
    {
        $universites = Universite::all();
        return view('page.universite',compact('universites'));
    }
    public function contact()
    {
        return view('page.contact');
    }

}

<?php

namespace App\Http\Controllers\Auteur;

use App\Pays;
use App\Notifications\NewAuteurPost;
use App\Tag;
use App\Post;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::User()->posts()->latest()->get();
        return view('auteur.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pays = Pays::all();
        $tags = Tag::all();
        return view('auteur.post.create', compact('pays','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'title' => 'required',
            'image' => 'required',
            'pays' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image))
        {
            ///make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //check slider dir is exists
            if (!Storage::disk('public')->exists('post'))
            {
                Storage::disk('public')->makeDirectory('post');
            }

            //resize image for slider and upload

            $postImage = Image::make($image)->resize(1600,1066)->save($imageName);
            Storage::disk('public')->put('post/'.$imageName,$postImage);


        } else {

            $imageName = "default.png";
        }

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if (isset($request->status))
        {
            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->is_approved = false;
        $post->save();

        $post->pays()->attach($request->pays);
        $post->tags()->attach($request->tags);

        $users = User::where('role_id','1')->get();
        Notification::send ($users, new NewAuteurPost($post));
        Toastr::success('Post ajouté avec succès :)' ,'Succes');
        return redirect()->route('auteur.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ($post->user_id != Auth::id())
        {
            return redirect()->back();
        }
        return view('auteur.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
         if ($post->user_id != Auth::id())
        {
            return redirect()->back();
        }
        $pays = Pays::all();
        $tags = Tag::all();
        return view('auteur.post.edit', compact('post','pays','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
         if ($post->user_id != Auth::id())
        {
            return redirect()->back();
        }

         $this->validate($request,[
            'title' => 'required',
            'image' => 'image',
            'pays' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image))
        {
            ///make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //check slider dir is exists
            if (!Storage::disk('public')->exists('post'))
            {
                Storage::disk('public')->makeDirectory('post');
            }

            //Delete old post image
            if (Storage::disk('public')->exists('post/'.$post->image))
            {
                Storage::disk('public')->delete('post/'.$post->image);
            }


            //resize image for slider and upload

            $postImage = Image::make($image)->resize(1600,1066)->save($imageName);
            Storage::disk('public')->put('post/'.$imageName,$postImage);


        } else {

            $imageName = $post->image;
        }

        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if (isset($request->status))
        {
            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->is_approved = false;
        $post->save();

        $post->pays()->sync($request->pays);
        $post->tags()->sync($request->tags);

        Toastr::success('Post modifié avec succès :)' ,'Succes');
        return redirect()->route('auteur.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
         if ($post->user_id != Auth::id())
        {
            return redirect()->back();
        }

        if (Storage::disk('public')->exists('post/'.$post->image))
        {
            Storage::disk('public')->delete('post/'.$post->image);
        }

        $post->pays()->detach();
        $post->tags()->detach();
        $post->delete();
        Toastr::success('Post supprimé avec succès :)' ,'Succès');
        return redirect()->back();
    }
}

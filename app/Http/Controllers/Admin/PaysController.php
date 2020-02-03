<?php

namespace App\Http\Controllers\Admin;

use App\Pays;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pays = Pays::latest()->get();
       return view('admin.pays.index', compact('pays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pays.create');
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

            'name'=> 'required|unique:pays',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        //get form image

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) 
        {
           //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

           //check pays dir is exists
            if (!Storage::disk('public')->exists('pays')) 
            {
                Storage::disk('public')->makeDirectory('pays');
            }

            //resize image for pays and upload

            $paysimage = Image::make($image)->resize(46,46)->save($imageName);
            Storage::disk('public')->put('pays/'.$imageName,$paysimage);

            //check pays slider dir is exists

            if (!Storage::disk('public')->exists('pays/slider')) 
            {
                Storage::disk('public')->makeDirectory('pays/slider');
            }

            //resize image for slider and upload

            $slider = Image::make($image)->resize(500,333)->save($imageName);
            Storage::disk('public')->put('pays/slider/'.$imageName,$slider);

        } else {

            $imageName = "default.png";
        }

        $pays = new pays();
        $pays->name = $request->name;
        $pays->slug = $slug;
        $pays->image = $imageName;
        $pays->save();
        Toastr::success('Pays ajouté avec succès :)' ,'Succes');
        return redirect()->route('admin.pays.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pays = Pays::find($id);
        return view('admin.pays.edit',compact('pays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'name'=> 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg'
        ]);

        //get form image

        $image = $request->file('image');
        $slug = str_slug($request->name);
        $pays = Pays::find($id);
        if (isset($image)) 
        {
           //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

           //check pays dir is exists
            if (!Storage::disk('public')->exists('pays')) 
            {
                Storage::disk('public')->makeDirectory('pays');
            }

            //delete old image

            if (Storage::disk('public')->exists('pays/'.$pays->image)) 
            {
                Storage::disk('public')->delete('pays/'.$pays->image);
            }

            //resize image for pays and upload

            $paysimage = Image::make($image)->resize(46,46)->save($imageName);
            Storage::disk('public')->put('pays/'.$imageName,$paysimage);

            //check pays slider dir is exists

            if (!Storage::disk('public')->exists('pays/slider')) 
            {
                Storage::disk('public')->makeDirectory('pays/slider');
            }

            //delete old slider image

            if (Storage::disk('public')->exists('pays/slider/'.$pays->image)) 
            {
                Storage::disk('public')->delete('pays/slider/'.$pays->image);
            }

            //resize image for slider and upload

            $slider = Image::make($image)->resize(500,333)->save($imageName);
            Storage::disk('public')->put('pays/slider/'.$imageName,$slider);

        } else {

            $imageName = $pays->image;
        }

        $pays->name = $request->name;
        $pays->slug = $slug;
        $pays->image = $imageName;
        $pays->save();
        Toastr::success('Pays modifié avec succès :)' ,'Succes');
        return redirect()->route('admin.pays.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pays = Pays::find($id);

        if (Storage::disk('public')->exists('pays/'.$pays->image)) 
        {
            Storage::disk('public')->delete('pays/'.$pays->image);
        }

        if (Storage::disk('public')->exists('pays/slider/'.$pays->image)) 
        {
            Storage::disk('public')->delete('pays/slider/'.$pays->image);
        }

        $pays->delete();
        Toastr::success('Pays supprimé avec succès :)' ,'Succès');
        return redirect()->back();
    }
}

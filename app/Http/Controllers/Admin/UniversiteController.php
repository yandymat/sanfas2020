<?php

namespace App\Http\Controllers\Admin;

use App\Universite;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UniversiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universites = Universite::latest()->get();
        return view('admin.universite.index',compact('universites'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.universite.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $this->validate($request,[
    
                'name'=> 'required|unique:universites',
                'image' => 'required|mimes:jpeg,bmp,png,jpg',
                'lien'=> 'required'
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
                if (!Storage::disk('public')->exists('universites')) 
                {
                    Storage::disk('public')->makeDirectory('universites');
                }
    
                //resize image for pays and upload
    
                $paysimage = Image::make($image)->resize(600,400)->save($imageName);
                Storage::disk('public')->put('universites/'.$imageName,$paysimage);
    
    
            } else {
    
                $imageName = "default.png";
            }
    
            $universites = new Universite();
            $universites->name = $request->name;
            $universites->lien = $request->lien;
            $universites->slug = $slug;
            $universites->image = $imageName;
            $universites->save();
            Toastr::success('Université partenaire ajouté avec succès :)' ,'Succes');
            return redirect()->route('admin.universite.index');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $universites = Universite::find($id);

        if (Storage::disk('public')->exists('universites/'.$universites->image)) 
        {
            Storage::disk('public')->delete('universites/'.$universites->image);
        }

        $universites->delete();
        Toastr::success('Université supprimé avec succès :)' ,'Succès');
        return redirect()->back();
    }
}

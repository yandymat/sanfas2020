<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sliders = Slider::latest()->get();
       return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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

            'name'=> 'required|unique:sliders',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        //get form image

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) 
        {
           ///make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

           //check slider dir is exists
            if (!Storage::disk('public')->exists('slider')) 
            {
                Storage::disk('public')->makeDirectory('slider');
            }

            //resize image for slider and upload

            $sliderimage = Image::make($image)->save($imageName);
            Storage::disk('public')->put('slider/'.$imageName,$sliderimage);

            //check slider min dir is exists

            if (!Storage::disk('public')->exists('slider/min')) 
            {
                Storage::disk('public')->makeDirectory('slider/min');
            }

            //resize image for min and upload

            $min = Image::make($image)->resize(46,46)->save($imageName);
            Storage::disk('public')->put('slider/min/'.$imageName,$min);

        } else {

            $imageName = "default.png";
        }

        $sliders = new slider();
        $sliders->name = $request->name;
        $sliders->texte = $request->texte;
        $sliders->slug = $slug;
        $sliders->image = $imageName;
        $sliders->save();
        Toastr::success('Slider ajouté avec succès :)' ,'Succes');
        return redirect()->route('admin.slider.index');
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
        $sliders = Slider::find($id);
        return view('admin.slider.edit',compact('sliders'));
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

            'name'=> 'required|unique:sliders',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        //get form image

        $image = $request->file('image');
        $slug = str_slug($request->name);
        $sliders = Slider::find($id);
        if (isset($image)) 
        {
           ///make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

           //check slider dir is exists
            if (!Storage::disk('public')->exists('slider')) 
            {
                Storage::disk('public')->makeDirectory('slider');
            }

            //delete old image

            if (Storage::disk('public')->exists('slider/'.$sliders->image)) 
            {
                Storage::disk('public')->delete('slider/'.$sliders->image);
            }

            //upload image in slider

            $sliderimage = Image::make($image)->save($imageName);
            Storage::disk('public')->put('slider/'.$imageName,$sliderimage);

            //check slider min dir is exists

            if (!Storage::disk('public')->exists('slider/min')) 
            {
                Storage::disk('public')->makeDirectory('slider/min');
            }

            //delete old min image

            if (Storage::disk('public')->exists('slider/min/'.$sliders->image)) 
            {
                Storage::disk('public')->delete('slider/min/'.$sliders->image);
            }

            //resize image for min and upload

            $min = Image::make($image)->resize(46,46)->save($imageName);
            Storage::disk('public')->put('slider/min/'.$imageName,$min);

        } else {

            $imageName = $sliders->image;
        }

        $sliders->name = $request->name;
        $sliders->texte = $request->texte;
        $sliders->slug = $slug;
        $sliders->image = $imageName;
        $sliders->save();
        Toastr::success('Slider ajouté avec succès :)' ,'Succes');
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliders = Slider::find($id);

        if (Storage::disk('public')->exists('slider/'.$sliders->image)) 
        {
            Storage::disk('public')->delete('slider/'.$sliders->image);
        }

        if (Storage::disk('public')->exists('slider/min/'.$sliders->image)) 
        {
            Storage::disk('public')->delete('slider/min/'.$sliders->image);
        }

        $sliders->delete();
        Toastr::success('Slider supprimé avec succès :)' ,'Succès');
        return redirect()->back();
    }
}

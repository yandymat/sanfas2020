<?php

namespace App\Http\Controllers;

use App\Pays;
use App\Msgbox;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class MsgboxController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'contact' => 'required',
            'email' => 'required|email|unique:msgboxes',
            'pays' => 'required',
        ]);

        $msgbox = new Msgbox();
        $msgbox->name = $request->name;
        $msgbox->email = $request->email;
        $msgbox->contact = $request->contact;
        $msgbox->save();
        $msgbox->pays()->attach($request->pays);
        Toastr::success('Vos informations ont été bien pris en compte','Success');
        return redirect()->back();
    }
}

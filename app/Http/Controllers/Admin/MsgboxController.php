<?php

namespace App\Http\Controllers\Admin;

use App\Pays;
use App\Msgbox;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MsgboxController extends Controller
{
    public function index()
    {
        $pays = Pays::latest()->get();
        $msgboxx = Msgbox::latest()->get();
        return view('admin.msgbox',compact('msgboxx','pays'));
    }

    public function destroy()
    {

    }
}

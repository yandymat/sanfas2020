<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProspectController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request,[
            'name' => 'required',
            'contact' => 'required',
            'email' => 'required|email|unique:subscribers',
            'destination' => 'required',
        ]);

        $subscriber = new Subscriber();
        $subscriber->name = $request->name;
        $subscriber->email = $request->email;
        $subscriber->contact = $request->contact;
        $subscriber->destination = $request->destination;
        $subscriber->save();
        return response ()->json ();
        
        }

        abort(404);
    }
}

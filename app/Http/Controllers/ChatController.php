<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function box(){
        return view('box');
    }

    public function colorChanger(Request $request)
    {
        event(new \App\Events\BoxColorChangerNotification($request->color));
    }
}

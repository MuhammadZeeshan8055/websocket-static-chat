<?php

namespace App\Http\Controllers;
use App\Events\MessageEvent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(){
        return view('chat');
    }
    public function broadcastMessage(Request $request){
        event(new MessageEvent($request->username,$request->message));
    }
}

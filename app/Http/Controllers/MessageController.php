<?php

namespace App\Http\Controllers;

use App\Model\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::all();
        return view('message',["result"=>$messages]);
    }
     //show 
     public function show($id){
        $messages = Message::findOrFail($id);
        return view('message.show',["result"=>$messages]);
    }
     //delete
     public function delete ($id){
        $messages = Message::findOrFail($id);
        $messages->delete();
        return redirect()->route('message')->with('message', __('message.message_delete'));
    }


    public function store(Request $request){
        Message::create([
            "id"=>$request->id, 
            "name"=>$request->name, 
            "email"=>$request->email, 
            "message"=>$request->message,  
        ]);
        return redirect()->route("welcome")->with('message_users', __('message.message_users'));
    }
}

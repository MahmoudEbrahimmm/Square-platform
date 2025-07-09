<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Model\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MessageController extends Controller
{
    public function index(){
        $messages = MessageResource::collection(Message::all());
        $data = [
            "msg"=>"return all data frome message table",
            "status"=>200,
            "data"=>$messages
        ];
        return response()->json($data);
        }

        // show
        public function show($id){
            $messages = Message::find($id);
            if($messages){
                $data = [
                    "msg"=>"Return One Record From messages Table",
                    "status"=>200,
                    "data"=>new MessageResource($messages)
                ];
                return response()->json($data);
            }else{
                $data = [
                    "msg"=>"No such id",
                    "status"=>201,
                    "data"=>null
                ];
                return response()->json($data);
            }
        }
         // Create
    public function store(Request $request){
        $validate = Validator::make($request->all(),[
           'id' => 'required|unique:messages|max:20',
            'name_en' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'email' => 'required|max:255',
            'message_en' => 'required|max:255|min:5',
            'message_ar' => 'required|max:500|min:5',
        ]);
        if($validate->fails()){
            $data = [
                "msg"=>"Validation Required",
                "status"=>205,
                "data"=>$validate->errors()
            ];
            return response()->json($data);
        }
        $messages = Message::create([
            "id"=>$request->id, 
            "name_en"=>$request->name_en, 
            "name_ar"=>$request->name_ar, 
            "email"=>$request->email, 
            "password"=>$request->password, 
            "message_en"=>$request->message_en, 
            "message_ar"=>$request->message_ar, 
        ]);
        $data = [
            "msg"=>"Created Successfully",
            "status"=>205,
            "data"=>new MessageResource($messages)
        ];
        return response()->json($data);
    }

      // Delete
      public function delete(Request $request){
        $id = $request->id;
        $messages = Message::find($id);        
        if($messages){
            $messages->delete();
            $data = [
                "msg"=>"Deleted Seccessfully",
                "status"=>200,
                "data"=>null
            ];
            return response()->json($data);
        }else{
            $data = [
                "msg"=>"No Such id",
                "status"=>201,
                "data"=>null
            ];
            return response()->json($data);
        }
    }

    //update
    public function update(Request $request){
        $old_id = $request->old_id;
        $messages = Message::findOrFail($old_id);
        
        $validate = Validator::make($request->all(),[
           'id' => [
                'required',
                Rule::unique("messages")->ignore($old_id)
            ],
            'name_en' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'email' => 'required|max:255',
            'message_en' => 'required|max:255|min:5',
            'message_ar' => 'required|max:500|min:5',
        ]);
        if($validate->fails()){
            $data = [
                "msg"=>"Validation Required",
                "status"=>205,
                "data"=>$validate->errors()
            ];
            return response()->json($data);
        }
        $messages->update([
            "id"=>$request->id, 
            "name_en"=>$request->name_en, 
            "name_ar"=>$request->name_ar, 
            "email"=>$request->email, 
            "password"=>$request->password, 
            "message_en"=>$request->message_en, 
            "message_ar"=>$request->message_ar,  
        ]);
        $data = [
            "msg"=>"Updated Successfully",
            "status"=>200,
            "data"=>new MessageResource($messages)
        ];
        return response()->json($data);
    }

}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // all data
    public function index(){
        $users = UserResource::collection(User::all());
        $data = [
            "msg"=>"return all data from users table",
            "status"=>200,
            "data"=>$users
        ];
        return response()->json($data);
    }
    // show
    public function show($id){
        $users = User::find($id);
        if($users){
            $data = [
                "msg"=>"Return One Record From Users Table",
                "status"=>200,
                "data"=>new UserResource($users)
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
            'id' => 'required|unique:users|max:20',
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255|min:5',
            'univircity' => 'required|max:500|min:5',
            'age' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);
        if($validate->fails()){
            $data = [
                "msg"=>"Validation Required",
                "status"=>205,
                "data"=>$validate->errors()
            ];
            return response()->json($data);
        }
        $users = User::create([
            "id"=>$request->id, 
            "name"=>$request->name, 
            "email"=>$request->email, 
            "password"=>$request->password, 
            "univircity"=>$request->univircity,
            "age"=>$request->age, 
            "city"=>$request->city, 
            "phone"=>$request->phone, 
            "role"=>$request->role, 
            "status"=>$request->status, 
        ]);
        $data = [
            "msg"=>"Created Successfully",
            "status"=>205,
            "data"=>new UserResource($users)
        ];
        return response()->json($data);
    }
    // Delete
    public function delete(Request $request){
        $id = $request->id;
        $users = User::find($id);        
        if($users){
            $users->delete();
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
        $users = User::findOrFail($old_id);
        
        $validate = Validator::make($request->all(),[
            'id' => [
                'required',
                Rule::unique("users")->ignore($old_id),
            ],
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255|min:5',
            'univircity' => 'required|max:500|min:5',
            'age' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);
        if($validate->fails()){
            $data = [
                "msg"=>"Validation Required",
                "status"=>205,
                "data"=>$validate->errors()
            ];
            return response()->json($data);
        }
        $users->update([
            "id"=>$request->id, 
            "name"=>$request->name, 
            "email"=>$request->email, 
            "password"=>$request->password, 
            "univircity"=>$request->univircity,
            "age"=>$request->age, 
            "city"=>$request->city, 
            "phone"=>$request->phone, 
            "role"=>$request->role, 
            "status"=>$request->status, 
        ]);
        $data = [
            "msg"=>"Updated Successfully",
            "status"=>200,
            "data"=>new UserResource($users)
        ];
        return response()->json($data);
    }
}

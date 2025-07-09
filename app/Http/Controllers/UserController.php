<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;



class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users',["result"=>$users]);
    }

    //show 
    public function show($id){
        $users = User::findOrFail($id);
        return view('users.show',["result"=>$users]);
    }
    //delete
    public function delete ($id){
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('users')->with('message', __('message.message_delete'));
    }
    //create
    public function create(){
        return view('users.create');
    }
    public function store(Request $request){
        $request->validate([
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
        User::create([
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
        return redirect()->route("users")->with('message', __('message.message_create'));
    }
    //edit
    public function edit($id){
        $users = User::findOrFail($id);
        return view('users.edit',["result"=>$users]);
    }
    public function save(Request $request){
        $old_id = $request->old_id;
        $users = User::findOrFail($old_id);

        $request->validate([
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
        return redirect()->route("users")->with('message', __('message.message_update'));
    }

}



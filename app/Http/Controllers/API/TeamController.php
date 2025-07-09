<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Model\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    public function index(){
        $teams = TeamResource::collection(Team::all());
        $data = [
            "msg"=>"return all data from teams table",
            "status"=>200,
            "data"=>$teams
        ];
        return response()->json($data);
    }
     // show
     public function show($id){
        $teams = Team::find($id);
        if($teams){
            $data = [
                "msg"=>"Return One Record From teams Table",
                "status"=>200,
                "data"=>new TeamResource($teams)
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
            'id' => 'required|unique:teams|max:20',
            'cate_image'=>'max:2048|mimes:png,jpeg,gif',
            'name_en' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'about_en' => 'required|max:255|min:5',
            'about_ar' => 'required|max:500|min:5',
        ]);
        if($validate->fails()){
            $data = [
                "msg"=>"Validation Required",
                "status"=>205,
                "data"=>$validate->errors()
            ];
            return response()->json($data);
        }
        if($request->hasFile("cate_image")){
            $image = $request->cate_image;
            $imageName = time() . rand(1,10000). "." . $image->extension();
            $image->move(public_path('img/img_teams/'),$imageName);

        $teams = Team::create([
            "id"=>$request->id, 
            "cate_image"=>$imageName ,  
            "name_en"=>$request->name_en, 
            "name_ar"=>$request->name_ar, 
            "email"=>$request->email, 
            "password"=>$request->password, 
            "about_en"=>$request->about_en, 
            "about_ar"=>$request->about_ar, 
        ]);
        $data = [
            "msg"=>"Created Successfully",
            "status"=>205,
            "data"=>new TeamResource($teams)
        ];
        return response()->json($data);
    }
    }
     // Delete
     public function delete(Request $request){
        $id = $request->id;
        $teams = Team::find($id);        
        if($teams){
            $teams->delete();
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
        $teams = Team::findOrFail($old_id);
        
        $validate = Validator::make($request->all(),[
            'id' => [
                'required',
                Rule::unique("teams")->ignore($old_id),
            ],
            'cate_image'=>'max:2048|mimes:png,jpeg,gif',
            'name_en' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'about_en' => 'required|max:255|min:5',
            'about_ar' => 'required|max:500|min:5',
        ]);
        if($validate->fails()){
            $data = [
                "msg"=>"Validation Required",
                "status"=>205,
                "data"=>$validate->errors()
            ];
            return response()->json($data);
        }
        
        if($request->hasFile("cate_image")){
            $image = $request->cate_image;
            $imageName = time() . rand(1,10000). "." . $image->extension();
            $image->move(public_path('img/img_teams/'),$imageName);
        }else{
            $imageName = $teams->cate_image;

        }

        $teams->update([
            "id"=>$request->id, 
            "cate_image"=>$imageName ,  
            "name_en"=>$request->name_en, 
            "name_ar"=>$request->name_ar, 
            "email"=>$request->email, 
            "password"=>$request->password, 
            "about_en"=>$request->about_en, 
            "about_ar"=>$request->about_ar, 
        ]);
        $data = [
            "msg"=>"Updated Successfully",
            "status"=>200,
            "data"=>new TeamResource($teams)
        ];
        return response()->json($data);
    }
}

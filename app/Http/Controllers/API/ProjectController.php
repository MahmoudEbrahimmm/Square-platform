<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Model\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function index(){
        $projects = ProjectResource::collection(Project::all());
        $data = [
            "msg"=>"return all data from projects table",
            "status"=>200,
            "data"=>$projects
        ];
        return response()->json($data);
    }
     // show
     public function show($id){
        $projects = Project::find($id);
        if($projects){
            $data = [
                "msg"=>"Return One Record From projects Table",
                "status"=>200,
                "data"=>new ProjectResource($projects)
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
           'id' => 'required|unique:projects|max:20',
            'cate_image'=>'required|max:2048|mimes:png,jpeg,gif',
            'title_en' => 'required|max:255',
            'title_ar' => 'required|max:255',
            'description_en' => 'required|max:255|min:5',
            'description_ar' => 'required|max:500|min:5',
            'link' => 'required',
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
            $image->move(public_path('img/img_projects/'),$imageName);

        $projects = Project::create([
            "id"=>$request->id, 
            "cate_image"=>$imageName ,   
            "title_en"=>$request->title_en, 
            "title_ar"=>$request->title_ar, 
            "description_en"=>$request->description_en, 
            "description_ar"=>$request->description_ar,
            "link"=>$request->link, 
        ]);
        $data = [
            "msg"=>"Created Successfully",
            "status"=>205,
            "data"=>new ProjectResource($projects)
        ];
        return response()->json($data);
    }
    }
     // Delete
     public function delete(Request $request){
        $id = $request->id;
        $projects = Project::find($id);        
        if($projects){
            $projects->delete();
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
        $projects = Project::findOrFail($old_id);
        
        $validate = Validator::make($request->all(),[
            'id' => [
                'required',
                Rule::unique("projects")->ignore($old_id)
                ],
                'cate_image'=>'max:2048|mimes:png,jpeg,gif',
                'title_en' => 'required|max:255',
                'title_ar' => 'required|max:255',
                'description_en' => 'required|max:255|min:5',
                'description_ar' => 'required|max:500|min:5',
                'link' => 'required',
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
            $image->move(public_path('img/img_projects/'),$imageName);
        }else{
            $imageName = $projects->cate_image;

        }

        $projects->update([
            "id"=>$request->id, 
            "cate_image"=>$imageName ,   
            "title_en"=>$request->title_en, 
            "title_ar"=>$request->title_ar, 
            "description_en"=>$request->description_en, 
            "description_ar"=>$request->description_ar,
            "link"=>$request->link, 
        ]);
        $data = [
            "msg"=>"Updated Successfully",
            "status"=>200,
            "data"=>new ProjectResource($projects)
        ];
        return response()->json($data);
    }

}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CoursResource;
use App\Model\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CoursController extends Controller
{
    public function index(){
        $courses = CoursResource::collection(Cours::all());
        $data = [
            "msg"=>"return all data from courses table",
            "status"=>200,
            "data"=>$courses
        ];
        return response()->json($data);
    }
     // show
     public function show($id){
        $courses = Cours::find($id);
        if($courses){
            $data = [
                "msg"=>"Return One Record From courses Table",
                "status"=>200,
                "data"=>new CoursResource($courses)
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
            'id' => 'required|unique:cours|max:20',
            'cate_image'=>'required|max:2048|mimes:png,jpeg,gif',
            'title_en' => 'required|max:255',
            'title_ar' => 'required|max:255',
            'description_en' => 'required|max:255|min:5',
            'description_ar' => 'required|max:500|min:5',
            'price' => 'required',
            'parent_id' => 'required',
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
            $image->move(public_path('img/img_courses/'),$imageName);

        $courses = Cours::create([
            "id"=>$request->id, 
            "cate_image"=>$imageName ,  
            "title_en"=>$request->title_en, 
            "title_ar"=>$request->title_ar, 
            "description_en"=>$request->description_en, 
            "description_ar"=>$request->description_ar,
            "price"=>$request->price, 
            "parent_id"=>$request->parent_id, 
        ]);
        $data = [
            "msg"=>"Created Successfully",
            "status"=>205,
            "data"=>new CoursResource($courses)
        ];
        return response()->json($data);
    }
    }
     // Delete
     public function delete(Request $request){
        $id = $request->id;
        $courses = Cours::find($id);        
        if($courses){
            $courses->delete();
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
        $courses = Cours::findOrFail($old_id);
        
        $validate = Validator::make($request->all(),[
            'id' => [
                'required',
                Rule::unique("cours")->ignore($old_id),
            ],
            'cate_image'=>'max:2048|mimes:png,jpeg,gif',
            'title_en' => 'required|max:255',
            'title_ar' => 'required|max:255',
            'description_en' => 'required|max:255|min:5',
            'description_ar' => 'required|max:500|min:5',
            'price' => 'required',
            'parent_id' => 'required',
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
            $image->move(public_path('img/img_courses/'),$imageName);
        }else{
            $imageName = $courses->cate_image;

        }

        $courses->update([
            "id"=>$request->id, 
            "cate_image"=>$imageName ,  
            "title_en"=>$request->title_en, 
            "title_ar"=>$request->title_ar, 
            "description_en"=>$request->description_en, 
            "description_ar"=>$request->description_ar,
            "price"=>$request->price, 
            "parent_id"=>$request->parent_id, 
        ]);
        $data = [
            "msg"=>"Updated Successfully",
            "status"=>200,
            "data"=>new CoursResource($courses)
        ];
        return response()->json($data);
    }

}
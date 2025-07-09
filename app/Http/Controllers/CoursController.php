<?php

namespace App\Http\Controllers;

use App\Model\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CoursController extends Controller
{
    protected function index(){
        $courses = Cours::all();
        $courses = DB::table('Cours')->select("id","cate_image","title_".app()->getLocale() ." as title","price")->get();
        return view("courses",["result"=>$courses]);
    }
    //show
    public function show($id){
        $courses = Cours::findOrFail($id);
        return view('courses.show',["result"=>$courses]);
    }

    //delete
    public function delete ($id){
        $users = Cours::findOrFail($id);
        $users->delete();
        return redirect()->route('courses')->with('message', __('message.message_delete'));
    }
    //create
    public function create(){
        return view('courses.create');
    }
    public function store(Request $request){
        $request->validate([
            'id' => 'required|unique:cours|max:20',
            'cate_image'=>'required|max:2048|mimes:png,jpeg,gif',
            'title_en' => 'required|max:255',
            'title_ar' => 'required|max:255',
            'description_en' => 'required|max:255|min:5',
            'description_ar' => 'required|max:500|min:5',
            'price' => 'required',
            'parent_id' => 'required',
        ]);
        if($request->hasFile("cate_image")){
            $image = $request->cate_image;
            $imageName = time() . rand(1,10000). "." . $image->extension();
            $image->move(public_path('img/img_courses/'),$imageName);
        } 
        Cours::create([
            "id"=>$request->id, 
            "cate_image"=>$imageName ,  
            "title_en"=>$request->title_en, 
            "title_ar"=>$request->title_ar, 
            "description_en"=>$request->description_en, 
            "description_ar"=>$request->description_ar,
            "price"=>$request->price, 
            "parent_id"=>$request->parent_id, 
        ]);
        return redirect()->route("courses")->with('message', __('message.message_create'));
    }
    //edit
    public function edit($id){
        $courses = Cours::findOrFail($id);
        return view('courses.edit',["result"=>$courses]);
    }
    public function save(Request $request){
        $old_id = $request->old_id;
        $courses = Cours::findOrFail($old_id);

        $request->validate([
            'id' => [
                'required',
                Rule::unique("cours")->ignore($old_id)
            ],
            'cate_image'=>'max:2048|mimes:png,jpeg,gif',
            'title_en' => 'required|max:255',
            'title_ar' => 'required|max:255',
            'description_en' => 'required|max:255',
            'description_ar' => 'required|max:500',
            'price' => 'required',
            'parent_id' => 'required',
        ]);
        
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
        return redirect()->route("courses")->with('message', __('message.message_update'));

    }
    
}

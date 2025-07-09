<?php

namespace App\Http\Controllers;

use App\Model\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        $projects = DB::table('projects')->select("id","cate_image","title_".app()->getLocale() ." as title_pro",
          "description_".app()->getLocale() ." as description_pro","link")->get();
        return view('projects',["result"=>$projects]);
    }

    //show
    public function show($id){
        $projects = Project::findOrFail($id);
        return view('projects.show',["result"=>$projects]);

    }

    //delete
    public function delete($id){
        $projects = Project::findOrFail($id);
        $projects->delete();
        return redirect()->route('projects')->with('message', __('message.message_delete'));
    }
    //create
    public function create(){
        return view('projects.create');
    }
    public function store(Request $request){
        $request->validate([
            'id' => 'required|unique:projects|max:20',
            'cate_image'=>'required|max:2048|mimes:png,jpeg,gif',
            'title_en' => 'required|max:255',
            'title_ar' => 'required|max:255',
            'description_en' => 'required|max:255|min:5',
            'description_ar' => 'required|max:500|min:5',
            'link' => 'required',
        ]);
        if($request->hasFile("cate_image")){
            $image = $request->cate_image;
            $imageName = time() . rand(1,10000). "." . $image->extension();
            $image->move(public_path('img/img_projects/'),$imageName);
        } 
        Project::create([
            "id"=>$request->id, 
            "cate_image"=>$imageName ,   
            "title_en"=>$request->title_en, 
            "title_ar"=>$request->title_ar, 
            "description_en"=>$request->description_en, 
            "description_ar"=>$request->description_ar,
            "link"=>$request->link, 
        ]);
        return redirect()->route("projects")->with('message', __('message.message_create'));
    }
        //edit
        public function edit($id){
            $projects = Project::findOrFail($id);
            return view('projects.edit',["result"=>$projects]);
        }
        public function save(Request $request){
            $old_id = $request->old_id;
            $projects = Project::findOrFail($old_id);

            $request->validate([
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
            return redirect()->route("projects")->with('message', __('message.message_update'));

        }
}
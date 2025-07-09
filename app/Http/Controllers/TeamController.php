<?php

namespace App\Http\Controllers;

use App\Model\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class TeamController extends Controller
{
    public function index(){
        $team = Team::all();
        $team =  DB::table('teams')->select("id","cate_image","name_".app()->getLocale() ." as name",
        "email","password","about_".app()->getLocale() ." as about")->get();
        return view('teams',["result"=>$team]);
    }
    //show
    public function show($id){
        $team = Team::findOrFail($id);
        return view('teams.show',["result"=>$team]);
    }

    //delete
    public function delete($id){
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect()->route('teams')->with('message', __('message.message_delete'));
    }
      //create
      public function create(){
        return view('teams.create');
    }
    public function store(Request $request){
        $request->validate([
            'id' => 'required|unique:teams|max:20',
            'cate_image'=>'required|max:2048|mimes:png,jpeg,gif',
            'name_en' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'about_en' => 'required|max:255|min:5',
            'about_ar' => 'required|max:500|min:5',
        ]);
        if($request->hasFile("cate_image")){
            $image = $request->cate_image;
            $imageName = time() . rand(1,10000). "." . $image->extension();
            $image->move(public_path('img/img_teams/'),$imageName);
        } 
        Team::create([
            "id"=>$request->id, 
            "cate_image"=>$imageName ,   
            "name_en"=>$request->name_en, 
            "name_ar"=>$request->name_ar, 
            "email"=>$request->email, 
            "password"=>$request->password, 
            "about_en"=>$request->about_en, 
            "about_ar"=>$request->about_ar, 
        ]);
        return redirect()->route("teams")->with('message', __('message.message_create'));
    }
    //edit
    public function edit($id){
        $teams = Team::findOrFail($id);
        return view('teams.edit',["result"=>$teams]);
    }
    public function save(Request $request){
        $old_id = $request->old_id;
        $teams = Team::findOrFail($old_id);
        $request->validate([
            'id' => 'required|unique:teams|max:20',
            'cate_image'=>'max:2048|mimes:png,jpeg,gif',
            'name_en' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'about_en' => 'required|max:255|min:5',
            'about_ar' => 'required|max:500|min:5',
        ]);
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
        return redirect()->route("teams")->with('message', __('message.message_update'));

    }
}

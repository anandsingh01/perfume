<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Team;
use Illuminate\Http\Request;
use Session;
use Auth;
use \App\Models\ProjectModel;
class ProjectController extends Controller
{
    function index(){
        $data['page_heading'] = 'Projects';
        $data['projects'] = ProjectModel::get();
        return view('admin.projects.index',$data);
    }

    function add (){
        $data['page_heading'] = 'Projects';
        return view('admin.projects.create',$data);
    }

    function save(Request $request){
        $project = new ProjectModel;
        $data = $request->all();
        $year = date("Y");
        $month = date("m");
        $filename = "uploads/blogs";
        $filename2 = "uploads/blogs/";
        # MAKE DIRECTORY IF NOT EXISTS STARTS
        if(file_exists($filename)){
            if(file_exists($filename2)==false){
                mkdir($filename2,777, true);
            }
        }else{
            mkdir($filename, 777,true);
            mkdir($filename2,777, true);
        }

        if($request->hasFile('featured_image')){
            $destinationPath2 = $filename2.'serve/'; // upload path
            $extension = $data['featured_image']->getClientOriginalExtension(); // getting image extension
            $theam_image7 = rand(11111, 99999) . time() . '.' . $extension; // renameing image
            $data['featured_image']->move($destinationPath2, $theam_image7); // uploading file to given path
            $wdws_image_3 = $destinationPath2.$theam_image7;
            $project->featured_image = $wdws_image_3;
        }

        $project->heading = $request->heading;
        $project->project_content = $request->project_content;
        $project->show_on_home = 0;
        $project->status = 1;

        if($project->save()){
            Session::flash('success','Saved');
            return redirect(url('admin/all-projects'));
        }

    }


    function edit($id){
        $page_heading = 'Project';
        $project = ProjectModel::find($id);
        return view('admin.projects.edit',compact('project','page_heading'));
    }


    function update(Request $request){
        $project = ProjectModel::find($request->id);
        $data = $request->all();
        $year = date("Y");
        $month = date("m");
        $filename = "uploads/blogs";
        $filename2 = "uploads/blogs/";
        # MAKE DIRECTORY IF NOT EXISTS STARTS
        if(file_exists($filename)){
            if(file_exists($filename2)==false){
                mkdir($filename2,777, true);
            }
        }else{
            mkdir($filename, 777,true);
            mkdir($filename2,777, true);
        }

        if($request->hasFile('featured_image')){
            $destinationPath2 = $filename2.'serve/'; // upload path
            $extension = $data['featured_image']->getClientOriginalExtension(); // getting image extension
            $theam_image7 = rand(11111, 99999) . time() . '.' . $extension; // renameing image
            $data['featured_image']->move($destinationPath2, $theam_image7); // uploading file to given path
            $wdws_image_3 = $destinationPath2.$theam_image7;
            $project->featured_image = $wdws_image_3;
        }

        $project->heading = $request->heading;
        $project->project_content = $request->project_content;
        $project->show_on_home = 0;
        $project->status = 1;

        if($project->save()){
            Session::flash('success','Saved');
            return redirect(url('admin/all-projects'));
        }

    }


    public function destroy($id)
    {
        $delete = ProjectModel::where('id', $id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Deleted";
        } else {
            $success = true;
            $message = "not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function change_status(Request $request){
        $category = ProjectModel::find($request->id);
        if($request->status == '1'){
            $category->status = '1';
        }else{
            $category->status = '0';
        }
        $category->save();
        return response()->json(['success'=>' status change successfully.']);
    }

    public function show_on_homet_status(Request $request){
        $category = ProjectModel::find($request->id);
//        print_r($request->all());die;
        if($request->show_on_home == '1'){
            $category->show_on_home = '0';
        }else{
            $category->show_on_home = '1';
        }
        $category->save();
        return response()->json(['success'=>' status change successfully.']);
    }
}

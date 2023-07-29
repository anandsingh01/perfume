<?php

namespace App\Http\Controllers;

use App\Models\ProjectModel;
use App\Models\ProjectDetail;
use Illuminate\Http\Request;
use Session;
use Auth;
class ProjectDetailsController extends Controller
{
    function index(){
        $data['page_heading'] = 'Projects Details';
        $data['projects'] = ProjectModel::get();
        $data['projects_details'] = ProjectDetail::with('getProjectParent')->get();
//        print_r($data['projects_details']);die;
        return view('admin.projects_details.index',$data);
    }

    function add (){
        $data['page_heading'] = 'Projects';
        $data['projects'] = ProjectModel::get();
//        print_r($data);die;
        return view('admin.projects_details.create',$data);
    }

    function save(Request $request){
        $project = new ProjectDetail();
        $data = $request->all();
//        print_r($data);die;
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
        $project->slug = str_replace(' ','-', $request->heading);
        $project->project_id = $request->project_id;
        $project->project_content = $request->project_content;
        $project->show_on_home = 0;
        $project->status = 1;

        if($project->save()){
            Session::flash('success','Saved');
            return redirect(url('admin/all-projects-details'));
        }

    }


    function edit($id){
        $page_heading = 'Project';
        $project =  ProjectModel::get();
        $project_details = ProjectDetail::find($id);
        return view('admin.projects_details.edit',compact('project','project_details','page_heading'));
    }


    function update(Request $request){
        $project = ProjectDetail::find($request->id);
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
        $project->project_id = $request->project_id;
        $project->project_content = $request->project_content;
        $project->show_on_home = 0;
        $project->status = 1;

        if($project->save()){
            Session::flash('success','Saved');
            return redirect(url('admin/all-projects-details'));
        }

    }


    public function destroy($id)
    {
        $delete = ProjectDetail::where('id', $id)->delete();
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
        $category = ProjectDetail::find($request->id);
        if($request->status == '1'){
            $category->status = '1';
        }else{
            $category->status = '0';
        }
        $category->save();
        return response()->json(['success'=>' status change successfully.']);
    }

    public function show_on_homet_status(Request $request){
        $category = ProjectDetail::find($request->id);
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

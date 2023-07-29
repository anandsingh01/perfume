<?php

namespace App\Http\Controllers;

use App\Models\BannerModel;
use Illuminate\Http\Request;
use \App\Models\Team;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = BannerModel::get();
        $page_heading = 'Banner';
        return view('admin.banner.index',compact('banner','page_heading'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $page_heading = 'Banner';
        return view('admin.banner.create', compact('page_heading'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
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

        $banner = new BannerModel() ;
        $banner->banner_heading = $request->banner_heading;
        $banner->banner_subheading = $request->banner_subheading;
        $banner->status = '1';

        if($request->hasFile('banner')){
            $destinationPath2 = $filename2.'serve/'; // upload path
            $extension = $data['banner']->getClientOriginalExtension(); // getting image extension
            $theam_image7 = rand(11111, 99999) . time() . '.' . $extension; // renameing image
            $data['banner']->move($destinationPath2, $theam_image7); // uploading file to given path
            $wdws_image_3 = $destinationPath2.$theam_image7;
            $banner->banner = $wdws_image_3;
        }

        if($banner->save()){
            return redirect('/admin/all-banner');
        }

    }

    public function status(Request $request){
        $category = BannerModel::find($request->brand_id);
        if($request->status == '1'){
            $category->status = '1';
        }else{
            $category->status = '0';
        }
        $category->save();
        return response()->json(['success'=>' status change successfully.']);
    }

    public function destroy($id)
    {
        $delete = BannerModel::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = " deleted successfully";
        } else {
            $success = true;
            $message = " not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    function edit($id){
        $page_heading = 'Banner';
        $banner = BannerModel::find($id);
        return view('admin.banner.edit',compact('banner','page_heading'));
    }

    function update(Request $request){
        $banner = BannerModel::find($request->id);
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
        $banner->banner_heading = $request->banner_heading;
        $banner->banner_subheading = $request->banner_subheading;
        $banner->status = '1';

        if($request->hasFile('banner')){
            $destinationPath2 = $filename2.'serve/'; // upload path
            $extension = $data['banner']->getClientOriginalExtension(); // getting image extension
            $theam_image7 = rand(11111, 99999) . time() . '.' . $extension; // renameing image
            $data['banner']->move($destinationPath2, $theam_image7); // uploading file to given path
            $wdws_image_3 = $destinationPath2.$theam_image7;
            $banner->banner = $wdws_image_3;
        }

        if($banner->save()){
            return redirect('/admin/all-banner');
        }

    }


}

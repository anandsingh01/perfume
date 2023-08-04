<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\AboutModels;
use App\Models\AnnualReportModel;
use App\Models\BannerModel;
use App\Models\Blog;
use App\Models\Category;
use App\Models\CollaborationModel;
use App\Models\FounderModel;
use App\Models\MetalModel;
use App\Models\MissionModel;
use App\Models\Product;
use App\Models\ProjectDetail;
use App\Models\ProjectModel;
use App\Models\ServiceModel;
use App\Models\SupportModel;
use App\Models\Team;
use App\Models\User;
use App\Models\WhoWeAre;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Session;
use Hash;

use Auth;
class UserController extends Controller
{
    function dashboard(){
        if(Auth::check() && Auth::user()->role == '2'){
            $data['order'] = $data['orders'] = Order::orderBy('id','DESC')
                ->where('user_id',Auth::user()->id)
                ->orWhere('ip_address',$_SERVER['REMOTE_ADDR'])
                ->get();
//            print_r($data);die;
            return view('web.users.dashboard');
        }else{
            return redirect(url('login'));
        }
    }

    public function update(Request $request)
    {
//        print_r($request->all());die;
        $userid = Auth::user();
        $user = User::find(Auth::user()->id);

        // Update user's name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Update password if provided
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
            $user->salt_password = $request->input('password');
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}

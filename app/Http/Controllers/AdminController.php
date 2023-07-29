<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Session;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
//        $this->middleware('admin');
    }

    public function index()
    {
        if(Auth::check()) {
            if (Auth::user()->role == '1') {
//                echo "login";
                return redirect(url('admin/dashboard'));
            }
        }else{
//            echo "nothing";
            return redirect('/login');
        }
    }

    function dashboard(){
//        echo "es";die;
        if(Auth::check()){
//            echo "checke";
            if(Auth::user()->role == '1'){
                return view('admin.dashboard');
            }else{
                abort('403','Your Are Not Admin !!! Access Denied');
            }
        }else{
            echo "die;";
//            return redirect(route('login'));
        }
    }

    function my_profile(){
        if(Auth::check()){
            if(Auth::user()->role == 1){
                $data['password'] = Auth::user()->salt_password;
                return view('admin.my_profile',$data);
            }else{
                abort('403','Your Are Not Admin !!! Access Denied');
            }
        }else{
            return redirect(route('login'));
        }
    }

    function update_profile(Request $request){
        $sql = User::find(Auth::user()->id);
        $sql->password = Hash::make($request->password);
        $sql->salt_password = $request->password;
        if($sql->save()){
            Session::flash('success','Profile Updated');
            return redirect(url('admin/my-profile'));
        }else{
            Session::flash('error','Profile not Updated');
            return redirect(url('admin/my-profile'));
        }
    }




}

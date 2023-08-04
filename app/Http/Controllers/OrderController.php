<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(){
        $data['page_heading'] = 'All Orders';
        $data['orders'] = Order::orderBy('id','DESC')->get();
//        print_r($data);die;
        return view('admin.orders.all-orders',$data);
    }

}

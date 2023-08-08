<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(){
        $data['page_heading'] = 'All Orders';
        $data['orders'] = Order::orderBy('id','DESC')->get();
        return view('admin.orders.all-orders',$data);
    }

    function view_order($id){
        $data['page_heading'] = 'View Order';
        $data['orders'] = Order::with('get_order_products')->find($id);
//        print_r($data);die;
        return view('admin.orders.view-order',$data);
    }

}

<?php

namespace App\Http\Controllers;

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
use App\Models\Goals;
use App\Models\WhoWeAre;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Session;
use Razorpay\Api\Api;

use Auth;
class HomeController extends Controller
{
    public function index()
    {
        $data['get_hero_banner'] = BannerModel::where([
            'display_area'=> '1',
            'status'=> '1',
        ])->get();
        $data['category_on_home'] = Category::where([
            'status'=>'1',
            'show_on_homepage'=>'1',
            'category_type' => 'product'
            ])->get();
        $data['brand_on_home'] = Category::where([
            'status'=>'1',
            'show_on_homepage'=>'1',
            'category_type' => 'brands'
        ])->get();
        $data['get_product_favorites'] = Product::where([
            'status'=> 'active',
        ])
            ->with('get_brands','section')
            ->get();
        $data['get_middle_banner'] = BannerModel::where([
            'display_area'=> '3',
            'status'=> '1',
        ])->orderBy('id','DESC')->first();

        $data['get_footer_banner'] = BannerModel::where([
            'display_area'=> '4',
            'status'=> '1',
        ])->orderBy('id','DESC')->first();

//        print_r($data['get_footer_banner']);die;
        return view('web.index',$data);
    }

    function get_service($url){
        $service = ServiceModel::where('url_slug',$url)->first();
        return view('web.service',compact('service'));
    }


    function who_we_are(){
        $data['who_we_are'] = AboutModels::first();
//        print_r($data);die;
        return view('web.about',$data);
    }

    function ourmissionvision(){
        $data['our_mission'] = MissionModel::orderBy('id','DESC')->first();

        return view('web.our-mission',$data);
    }

    function projects(){
        $data['projects'] = ProjectModel::where('status',1)->get();
        return view('web.projects',$data);
    }
    function collaborations(){
        $data['collaborations'] = CollaborationModel::where('status',1)->get();
        return view('web.collaborations',$data);
    }

    function annual_report(){
        $data['annual_report'] = AnnualReportModel::where('status','1')->get();
        return view('web.annual-report',$data);

    }

    function ourteam(){
        $data['team_members'] = Team::where('status','1')
            ->orderBy('sequence','ASC')
            ->get();
        return view('web.our-team',$data);
    }

    function supportus(){
        $data['support'] = SupportModel::first();
//        print_r($data);die;
        return view('web.support-us',$data);
    }

    public function razorpay(Request $request)
    {

//        print_r($request->all());die;
        try {
            $data['order_id'] = 'EK'.rand(1111,9919).rand(1111,9999);
            $data['amount'] = $request->amount ?? null;
            $data['name'] = $request->name ?? null;
            $data['email'] = $request->email ?? null;
            $data['number'] = $request->phone ?? null;
            $data['plantNumber'] = $request->plantNumber ?? null;
            $data['pan'] = $request->pan ?? null;
            Session::put('payment_session',$data);
            return view('web.payment', $data);
        } catch (Exception $e) {
            dd($e->getMessage());
            Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    function pay(Request $request){
        $data['amount'] = $request->amount;
        $data['for'] = $request->for;
        return view('web.amounts',$data);
    }

    public function payment(Request $request)
    {

        $input = $request->all();
        $api = new Api('rzp_test_ZB8GMwDqEm40nX', 'lI2c1QX2hJWWXYERboK8IQL7');

        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        $payment_session = Session::get('payment_session');

        $donatefund = new Payment;
        $donatefund->order_id = $payment_session['order_id'];
        $donatefund->amount = $payment_session['amount'];
        $donatefund->name = $payment_session['name'];
        $donatefund->email = $payment_session['email'];
        $donatefund->phone = $payment_session['number'];
        $donatefund->plantNumber = $payment_session['plantNumber'];
        $donatefund->pan = $payment_session['pan'];
        $donatefund->payment_status = $payment['status'];
        $donatefund->payment_reference = $payment['method'];
        $donatefund->razorpay_order_id = $payment['id'];
        $donatefund->payment_method = $payment['method'];
        $donatefund->card_id = $payment['card_id'];
        $donatefund->bank = $payment['bank'];
        $donatefund->wallet = $payment['wallet'];
        $donatefund->vpa = $payment['vpa'];
        $donatefund->customer_ip = \Request::ip();
        if($donatefund->save()){

            \Session::put('recent_payment_details',$donatefund);
            \Session::put('success', 'Payment successful, your order will be despatched in the next 48 hours.');
            return redirect(url('/payment-response'));
        }else{
            \Session::put('danger', 'Payment successful, your order will be despatched in the next 48 hours.');
            return redirect(url('/payment-response'));
        }
        die;

        \Session::put('success', 'Payment successful, your order will be despatched in the next 48 hours.');
        return redirect()->back();
    }

    function payment_response(Request $request){
        if(Session::has('recent_payment_details')){
            $getPaymentDetails = Session::get('recent_payment_details');
//            print_r($getPaymentDetails);die;
            return view('web.payment_response',compact('getPaymentDetails'));
        }else{
            $somethingWentWrong = 'Something went wrong';
            return view('web.payment_response',compact('somethingWentWrong'));
        }
//        print_r($request->all());
    }

    function projects_details($url){
        $data['project'] = ProjectDetail::where('slug',$url)->first();
        return view('web.projects-details',$data);
    }
    function blogs_details($url){
        $data['blog'] = Blog::where('title_slug',$url)->first();
        return view('web.blog-details',$data);
    }

    function metal_details($url){
        $data['all_metals'] = MetalModel::get();
        $data['metals'] = MetalModel::where('slug',$url)->first();
        return view('web.metal-details',$data);
    }

    function contactus(){
        return view('web.contact');
    }

    function savecontactus(Request $request){
        print_r($request->all());die;
    }

    function sustainability_overview($url){
        $data['overview'] = \App\Models\Sustainability::where('sustainability_type',$url)->first();
        return view('web.offers.overview',$data);
    }

    function social_impact($url){
        $data['overview'] = \App\Models\SocialImpactModel::where('type',$url)->first();
        return view('web.social.overview',$data);
    }

    function sustainability_stewardship(){
        $data['overview'] = \App\Models\SustainabilityStewardship::first();
        return view('web.offers.stewardship',$data);
    }

    function products_details($url){
        $data['get_middle_banner'] = BannerModel::where([
            'display_area'=> '3',
            'status'=> '1',
        ])->orderBy('id','DESC')->first();

        $data['product'] = Product::where('slug',$url)
            ->with(
                'getPrices',
                'getGallery',
                'get_brands',
                'section'
            )
            ->first();
        return view('web.product-details',$data);
    }
}

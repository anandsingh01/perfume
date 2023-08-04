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
        return view('web.index',$data);
    }

    function product_by_category($slug){
        $category = Category::where('slug',$slug)->first();
        if(!empty($category)){
            $data['get_products'] = Product::where([
                'section_id' => $category->id,
                'status' => 'active',
                ]
            )
                ->with('get_brands','section')
                ->orderBy('id','DESC')
                ->get();
            $data['category'] = $category;
        }
        return view('web.category',$data);
    }

    function product_by_brands($slug){
        $brands = Category::where('slug',$slug)->first();
        if(!empty($brands)){
            $data['get_products'] = Product::where([
                'brands_id' => $brands->id,
                'status' => 'active',
                ]
            )
                ->with('get_brands','section')
                ->orderBy('id','DESC')
                ->get();
            $data['category'] = $brands;
        }
        return view('web.category',$data);
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

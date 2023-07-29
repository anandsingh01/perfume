<?php

use Carbon\Carbon;

function get_services(){
    $data = \App\Models\ServiceModel::where('service_category','none')->where('status','1')->get();
//    print_r($data);die;
    return $data;
}

function get_subservices($service_slug){
    $data = \App\Models\ServiceModel::where('service_category',$service_slug)->where('status','1')->get();
    return $data;
}

function get_post_by_category_id_limit_six($id){
    $data = \App\Models\Blog::with('getCategory')
        ->where('category_id',$id)
        ->limit(3)
        ->orderBy('id','DESC')
        ->get();

    return $data;
}

function get_subcategories_by_id($id){
    $data = \App\Models\Category::where('parent_id',$id)
        ->get();
    return $data;
}


function get_recent_poss(){
    $data = \App\Models\Blog::with('getCategory')
        ->orderBy('id','DESC')
        ->paginate(4);
    return $data;
}
function get_polls(){
    $data = \App\Models\Poll::get();
    return $data;
}

function calculate_total_vote_poll_option($poll)
{
    $total = 0;
    if (!empty($poll)) {
        for ($i = 1; $i <= 10; $i++) {
            $op = "option{$i}_vote_count";
            $total += $poll->$op;
        }
    }
    return $total;
}

function random_posts(){
    $data = \App\Models\Blog::with('getCategory')
        ->inRandomOrder()
        ->limit(5)
        ->get();
    return $data;
}
function get_recommended_posts(){
    $data = \App\Models\Blog::with('getCategory')
        ->where('is_recommended','=','1')
        ->limit(5)
        ->get();
    return $data;
}

function get_popular_posts($date_type, $lang_id)
{
    $popular_posts = array();
    if ($date_type == "week") {
        $date = Carbon::now()->subDays(7);
        $popular_posts = \App\Models\Blog::select('title','title_slug','image_big')->with('getCategory')
            ->orderBy('id','DESC')
            ->orderBy('pageviews','DESC')
            ->limit(3)
            ->get();
    } elseif ($date_type == "month") {
        $date = Carbon::now()->subDays(30);
        $popular_posts = \App\Models\Blog::with('getCategory')->where('created_at', '>=', $date)
            ->orderBy('pageviews','DESC')
            ->limit(3)
            ->get();
    } else {
        $popular_posts = \App\Models\Blog::with('getCategory')->orderBy('pageviews','DESC')
            ->limit(3)
            ->get();
    }
    return $popular_posts;
}

function getCommonSetting(){
    $commonSetting = \App\Models\CommonModel::first();
    return $commonSetting;
}

?>

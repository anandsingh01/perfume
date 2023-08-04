<?php $getCommonSetting = getCommonSetting();?>
@extends('layouts.web')
@section('css')
    <style>
        .block_box {
            background: #000;
        }
        .block_box h3.icon-box-title {
            color: #fff !important;
            font-size: 1.5em;
        }
        .block_box .icon-box-content p:last-child {
            color: #fff;
            font-size: 14px;
        }
        .custom-height img {
            height: 400px;
            object-fit: cover;
        }
        .custom-height .btn.banner-link {
            background: #333;
            border: 1px solid #333;
        }
        /* Overlay effect for banners with the class "banner banner-1 banner-overlay" */
        .banner.banner-1.banner-overlay::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #33333361; /* Adjust the opacity here (0 to 1) */
            z-index: 1;
        }
        a.brand img {
            height: 70px;
            padding: 0px;
        }
        .products-slider{
            width:85%;
        }
        .product-body {
            text-align: center;
        }
        .product-price {
            text-align: center;
            width: 100% !important;
            display: block;
        }
        .product-cat a{
            font-size: 15px;
            line-height: 20px;
        }
        .product-title a{
            color: inherit;
            font-size: 18px;
            line-height: 40px;
        }
        .trending {
            position: relative;
        }
        .trending img {
            min-height: 315px;
            object-fit: cover;
        }
        .trending .banner {
            position: static;
        }
        .banner-big {
            color: #666666;
            font-size: 1.5rem;
            line-height: 1.6;
        }
        .trending img {
            min-height: 315px;
            object-fit: cover;
            max-height: 400px;
            width: 100%;
        }
    </style>
@stop
@section('body')
    <?php
    $get_hero_banner = get_hero_banner();
    $getCommonSetting = getCommonSetting();
    //        print_r($getCommonSetting);die;
    ?>
    <div class="intro-slider-container">
        <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{
      "dots": true,
      "nav": false,
      "autoplay" : true,
      "responsive": {
      "992": {
      "nav": true
      }
      }
      }'>
            @forelse($get_hero_banner as $get_hero_banners)
                <div class="intro-slide" style="background-image: url({{asset($get_hero_banners->banner)}});">
                    <div class="container">
                        <div class="intro-content text-center">
                            <h3 class="intro-subtitle text-white">{{$get_hero_banners->banner_heading}}</h3>
                            <!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title text-white">{{$get_hero_banners->banner_subheading}}</h1>
                            <!-- End .intro-title -->
                            <a href="{{url($get_hero_banners->banner_link)}}" class="btn btn-primary font-weight-semibold">
                                <span>{{$get_hero_banners->banner_text}}</span>
                                <i class="icon-angle-right"></i>
                            </a>
                        </div>
                        <!-- End .intro-content -->
                    </div>
                    <!-- End .container -->
                </div>
                <!-- End .intro-slide -->
            @empty
            @endforelse
        </div>
        <!-- End .intro-slider owl-carousel owl-theme -->
        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div>
    <!-- End .intro-slider-container -->
    <div class="block_box">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">{{$getCommonSetting->block_heading_1}}</h3>
                        <!-- End .icon-box-title -->
                        <p>{{$getCommonSetting->block_text_1}}</p>
                    </div>
                    <!-- End .icon-box-content -->
                </div>
                <!-- End .icon-box -->
            </div>
            <!-- End .col-lg-4 col-sm-6 -->
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">{{$getCommonSetting->block_heading_2}}</h3>
                        <!-- End .icon-box-title -->
                        <p>{{$getCommonSetting->block_text_2}}</p>
                    </div>
                    <!-- End .icon-box-content -->
                </div>
                <!-- End .icon-box -->
            </div>
            <!-- End .col-lg-4 col-sm-6 -->
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">{{$getCommonSetting->block_heading_3}}</h3>
                        <!-- End .icon-box-title -->
                        <p>{{$getCommonSetting->block_text_3}}</p>
                    </div>
                    <!-- End .icon-box-content -->
                </div>
                <!-- End .icon-box -->
            </div>
            <!-- End .col-lg-4 col-sm-6 -->
        </div>
    </div>
    <div class="container">
        <div class="banners custom-height">
            <div class="row banner-group-1">
                @forelse($category_on_home as $categories_on_home)
                    <div class="col-md-6">
                        <div class="banner banner-1 banner-overlay">
                            <a href="#">
                                <img src="{{asset($categories_on_home->image)}}" alt="Banner" width="688" height="400" style="background-color: #f9c8c8;">
                            </a>
                            <div class="banner-content banner-content-center">
                                <h4 class="banner-subtitle text-white">{{$categories_on_home->category_name}}</h4>
                                <!-- End .banner-subtitle -->
                                <h5 class="text-white mt-2 mb-2">{{$categories_on_home->meta_tag_description}}</h5>
                                <a href="{{url($categories_on_home->slug)}}" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                            </div>
                            <!-- End .banner-content -->
                        </div>
                        <!-- End .banner -->
                    </div>
                    <!-- End .col-sm-6 -->
                @empty
                @endforelse
            </div>
            <!-- End .row -->
        </div>
        <div class="owl-carousel owl-simple mt-10 mb-10" data-toggle="owl"
             data-owl-options='{
      "nav": false,
      "dots": false,
      "margin": 30,
      "loop": false,
      "responsive": {
      "0": {
      "items":2
      },
      "420": {
      "items":3
      },
      "600": {
      "items":4
      },
      "900": {
      "items":4
      },
      "1024": {
      "items":5
      }
      }
      }'>
            @forelse($brand_on_home as $brand_on_home)
                <a href="#" class="brand">
                    <img src="{{asset($brand_on_home->image)}}" alt="Brand Name">
                </a>
            @empty
            @endforelse
        </div>
        <!-- End .owl-carousel -->
        <div class="container products-slider mt-5 mb-5">
            <div class="heading heading-center mb-3">
                <h2 class="title mb-5">OUR FAVORITES</h2>
                <!-- End .title -->
            </div>
            <!-- End .heading -->
            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
               "nav": false,
               "dots": true,
               "margin": 20,
               "loop": false,
               "responsive": {
               "0": {
               "items":2
               },
               "480": {
               "items":2
               },
               "768": {
               "items":3
               },
               "992": {
               "items":4
               },
               "1200": {
               "items":4,
               "nav": true
               }
               }
               }'>
                        @forelse($get_product_favorites as $key => $get_favorites)
                            <div class="product product-2">
                                <figure class="product-media">
                                    <a href="{{url('products/'.$get_favorites->slug)}}">
                                        <img src="{{asset($get_favorites->photo)}}" alt="{{$get_favorites->title}}" class="product-image">
                                    </a>
                                </figure>
                                <!-- End .product-media -->
                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="{{url('products/'.$get_favorites->slug)}}">{{$get_favorites->get_brands->category_name ?? ''}}</a>
                                    </div>
                                    <!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{url('products/'.$get_favorites->slug)}}">{{$get_favorites->title}}</a></h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        $ {{number_format($get_favorites->product_actual_price,2)}}
                                    </div>

                                    <!-- End .product-price -->
                                </div>
                                <!-- End .product-body -->
                            </div>
                            <!-- End .product -->
                        @empty
                        @endforelse
                    </div>
                    <!-- End .owl-carousel -->
                </div>
                <!-- .End .tab-pane -->
            </div>
            <!-- End .tab-content -->
        </div>
        <!-- End .container -->
    </div>
    <div class="mt-5 mb-5 video-banner video-banner-bg video-fullheight bg-image text-center"
         style="background-image: url({{asset($get_middle_banner->banner)}})">
        <div class="container">
            {{--
            <h3 class="video-banner-title h1 text-white"><span>{{$get_middle_banner->banner_heading ?? ''}}</h3>
            <!-- End .video-banner-title -->--}}
            <h4 class="banner-subtitle text-white">{{$get_middle_banner->banner_heading ?? ''}}</h4>
            <!-- End .banner-subtitle -->
            <h3 class="banner-title text-white">{{$get_middle_banner->banner_subheading ?? ''}}</h3>
            <!-- End .banner-title -->
            <a href="{{url($get_middle_banner->banner_link)}}" class="btn btn-primary-white"><span>{{$get_middle_banner->banner_text}}</span><i class="icon-long-arrow-right"></i></a>
        </div>
        <!-- End .container -->
    </div>
    <div class="container">
        <div class="container products-slider mt-10 mb-10">
            <div class="heading heading-center mb-3">
                <h2 class="title mt-5 mb-5">HIGHLIGHTS</h2>
                <!-- End .title -->
            </div>
            <!-- End .heading -->
            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
               "nav": false,
               "dots": true,
               "margin": 20,
               "loop": false,
               "responsive": {
               "0": {
               "items":2
               },
               "480": {
               "items":2
               },
               "768": {
               "items":3
               },
               "992": {
               "items":4
               },
               "1200": {
               "items":4,
               "nav": true
               }
               }
               }'>
                        @forelse($get_product_favorites as $key => $get_favorites)
                            <div class="product product-2">
                                <figure class="product-media">
                                    <a href="{{url($get_favorites->slug)}}">
                                        <img src="{{asset($get_favorites->photo)}}" alt="{{$get_favorites->title}}" class="product-image">
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable" title="Add to wishlist"><span>add to wishlist</span></a>
                                    </div>
                                    <!-- End .product-action -->
                                    <div class="product-action product-action-transparent">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div>
                                    <!-- End .product-action -->
                                </figure>
                                <!-- End .product-media -->
                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{$get_favorites->get_brands->category_name}}</a>
                                    </div>
                                    <!-- End .product-cat -->
                                    <h3 class="product-title"><a href="">{{$get_favorites->title}}</a></h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        $ {{number_format($get_favorites->product_actual_price,2)}}
                                    </div>
                                    <!-- End .product-price -->
                                </div>
                                <!-- End .product-body -->
                            </div>
                            <!-- End .product -->
                        @empty
                        @endforelse
                    </div>
                    <!-- End .owl-carousel -->
                </div>
                <!-- .End .tab-pane -->
            </div>
            <!-- End .tab-content -->
        </div>
        <!-- End .container -->
    </div>
    <div class="mt-5 mb-5 video-banner video-banner-bg video-fullheight bg-image text-center"
         style="background-image: url({{asset($get_footer_banner->banner)}})">
        <div class="container">
            <h4 class="banner-subtitle text-white">{{$get_footer_banner->banner_heading ?? ''}}</h4>
            <!-- End .banner-subtitle -->
            <h3 class="banner-title text-white">{{$get_footer_banner->banner_subheading ?? ''}}</h3>
            <!-- End .banner-title -->
            @if($get_footer_banner->banner_link != NULL )<a href="{{url($get_footer_banner->banner_link ?? '')}}" class="btn btn-primary-white"><span>{{$get_footer_banner->banner_text ?? ''}}</span><i class="icon-long-arrow-right"></i></a>
            @endif
        </div>
        <!-- End .container -->
    </div>
    <div class="container">
        <h2 class="title title-reviews font-weight-semibold">Reviews From Real Customers</h2>
        <!-- End .title -->
        <hr>
        <div class="owl-carousel owl-theme owl-reviews" data-toggle="owl" data-owl-options='{
      "dots": false,
      "nav": true,
      "margin": 20,
      "responsive": {
      "0": {
      "items": 1,
      "dots": true
      },
      "768": {
      "items": 2,
      "dots": false
      },
      "992": {
      "items": 3
      }
      }
      }'>
            <div class="testimonial">
                <div class="avatar">
                    <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/comments/1.jpg" alt="Comment image" width="98" height="98">
                </div>
                <!--End .avatar-->
                <div class="content">
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div>
                            <!-- End .ratings-val -->
                        </div>
                        <!-- End .ratings -->
                    </div>
                    <!-- End .rating-container -->
                    <div class="comment-title font-weight-semibold">Morbi in sem quis dui placerat ...</div>
                    <p class="comment">Dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, dapibus...</p>
                    <div class="commenter">
                        <span class="name font-weight-normal">Sakina Stout</span>
                    </div>
                </div>
                <!--End .content-->
            </div>
            <!--End .testimonial-->
            <div class="testimonial">
                <div class="avatar">
                    <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/comments/2.jpg" alt="Comment image" width="98" height="98" style="background-color: #b7b7b7;">
                </div>
                <!--End .avatar-->
                <div class="content">
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 87.7%;"></div>
                            <!-- End .ratings-val -->
                        </div>
                        <!-- End .ratings -->
                    </div>
                    <!-- End .rating-container -->
                    <div class="comment-title font-weight-semibold">Cras consequat</div>
                    <p class="comment cras-comment">Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet...</p>
                    <div class="commenter">
                        <span class="name font-weight-normal">Maximus</span>
                    </div>
                </div>
                <!--End .content-->
            </div>
            <!--End .testimonial-->
            <div class="testimonial">
                <div class="avatar">
                    <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/comments/3.jpg" alt="Comment image" width="98" height="98" style="background-color: #b7b7b7;">
                </div>
                <!--End .avatar-->
                <div class="content">
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div>
                            <!-- End .ratings-val -->
                        </div>
                        <!-- End .ratings -->
                    </div>
                    <!-- End .rating-container -->
                    <div class="comment-title font-weight-semibold">Vestibulum auctor dapibus</div>
                    <p class="comment">Sed pretium ligula sollicitudin laoreet viverra tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis...</p>
                    <div class="commenter">
                        <span class="name font-weight-normal">Antony Tanner</span>
                    </div>
                </div>
                <!--End .content-->
            </div>
            <!--End .testimonial-->
            <div class="testimonial">
                <div class="avatar">
                    <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/comments/1.jpg" alt="Comment image" width="98" height="98" style="background-color: #b7b7b7;">
                </div>
                <!--End .avatar-->
                <div class="content">
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div>
                            <!-- End .ratings-val -->
                        </div>
                        <!-- End .ratings -->
                    </div>
                    <!-- End .rating-container -->
                    <div class="comment-title font-weight-semibold">Morbi in sem quis dui placerat ...</div>
                    <p class="comment">Dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, dapibus...</p>
                    <div class="commenter">
                        <span class="name font-weight-normal">Sakina Stout</span>
                    </div>
                </div>
                <!--End .content-->
            </div>
            <!--End .testimonial-->
        </div>
        <!--End .owl-carousel-->
    </div>
    <!--End .container-->
@stop
@section('script')@stop

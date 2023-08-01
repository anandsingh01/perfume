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
                        <h3 class="intro-subtitle text-white">{{$get_hero_banners->banner_heading}}</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title text-white">{{$get_hero_banners->banner_subheading}}</h1><!-- End .intro-title -->

                        <a href="{{url($get_hero_banners->banner_link)}}" class="btn btn-primary font-weight-semibold">
                            <span>{{$get_hero_banners->banner_text}}</span>
                            <i class="icon-angle-right"></i>
                        </a>
                    </div><!-- End .intro-content -->
                </div><!-- End .container -->
            </div><!-- End .intro-slide -->
            @empty
            @endforelse
        </div><!-- End .intro-slider owl-carousel owl-theme -->

        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div>
    <!-- End .intro-slider-container -->


    <div class="block_box">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">{{$getCommonSetting->block_heading_1}}</h3><!-- End .icon-box-title -->
                        <p>{{$getCommonSetting->block_text_1}}</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">{{$getCommonSetting->block_heading_2}}</h3><!-- End .icon-box-title -->
                        <p>{{$getCommonSetting->block_text_2}}</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">{{$getCommonSetting->block_heading_3}}</h3><!-- End .icon-box-title -->
                        <p>{{$getCommonSetting->block_text_3}}</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->
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
                            <h4 class="banner-subtitle text-white">{{$categories_on_home->category_name}}</h4><!-- End .banner-subtitle -->
                            <h5 class="text-white mt-2 mb-2">{{$categories_on_home->meta_tag_description}}</h5>
                            <a href="{{url($categories_on_home->slug)}}" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-sm-6 -->
                @empty
                @endforelse
            </div><!-- End .row -->
        </div>

        <div class="owl-carousel owl-simple mt-5 mb-5" data-toggle="owl"
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
        </div><!-- End .owl-carousel -->


        <div class="container products-slider">
            <div class="heading heading-center mb-3">
                <h2 class="title">OUR FAVORITES</h2><!-- End .title -->
            </div><!-- End .heading -->

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
                        <div class="product product-2">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-5/products/product-1-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-5/products/product-1-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable" title="Add to wishlist"><span>add to wishlist</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-transparent">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Clothing</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Vest dress</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $9.99
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #2d272b;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #8f957d;"><span class="sr-only">Color name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-5/products/product-2-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-5/products/product-2-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable" title="Add to wishlist"><span>add to wishlist</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-transparent">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Clothing</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Dress with a belt</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $29.99
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-5/products/product-3-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-5/products/product-3-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable" title="Add to wishlist"><span>add to wishlist</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-transparent">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Shoes</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Sandals</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">Now $24.99</span>
                                    <span class="old-price">Was $30.99</span>
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-5/products/product-4-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-5/products/product-4-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable" title="Add to wishlist"><span>add to wishlist</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-transparent">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Handbags</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Bucket bag</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $17.99
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        <div class="product product-2">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-5/products/product-1-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-5/products/product-1-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable" title="Add to wishlist"><span>add to wishlist</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-transparent">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Clothing</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Vest dress</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $9.99
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #2d272b;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #8f957d;"><span class="sr-only">Color name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .container -->

        <hr class="mb-3">

        <div class="more-container text-center mb-7">
            <a href="blog.html" class="btn btn-outline-primary btn-more"><span class="font-weight-semibold">VIEW MORE PRODUCTS</span></a>
        </div><!-- End .more-container -->

        <h2 class="title title-reviews font-weight-semibold">Reviews From Real Customers</h2><!-- End .title -->

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
                </div><!--End .avatar-->

                <div class="content">
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                    </div><!-- End .rating-container -->
                    <div class="comment-title font-weight-semibold">Morbi in sem quis dui placerat ...</div>
                    <p class="comment">Dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, dapibus...</p>
                    <div class="commenter">
                        <span class="name font-weight-normal">Sakina Stout</span>
                    </div>
                </div><!--End .content-->
            </div><!--End .testimonial-->

            <div class="testimonial">
                <div class="avatar">
                    <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/comments/2.jpg" alt="Comment image" width="98" height="98" style="background-color: #b7b7b7;">
                </div><!--End .avatar-->

                <div class="content">
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 87.7%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                    </div><!-- End .rating-container -->
                    <div class="comment-title font-weight-semibold">Cras consequat</div>
                    <p class="comment cras-comment">Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet...</p>
                    <div class="commenter">
                        <span class="name font-weight-normal">Maximus</span>
                    </div>
                </div><!--End .content-->
            </div><!--End .testimonial-->

            <div class="testimonial">
                <div class="avatar">
                    <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/comments/3.jpg" alt="Comment image" width="98" height="98" style="background-color: #b7b7b7;">
                </div><!--End .avatar-->

                <div class="content">
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                    </div><!-- End .rating-container -->
                    <div class="comment-title font-weight-semibold">Vestibulum auctor dapibus</div>
                    <p class="comment">Sed pretium ligula sollicitudin laoreet viverra tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis...</p>
                    <div class="commenter">
                        <span class="name font-weight-normal">Antony Tanner</span>
                    </div>
                </div><!--End .content-->
            </div><!--End .testimonial-->

            <div class="testimonial">
                <div class="avatar">
                    <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/comments/1.jpg" alt="Comment image" width="98" height="98" style="background-color: #b7b7b7;">
                </div><!--End .avatar-->

                <div class="content">
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                    </div><!-- End .rating-container -->
                    <div class="comment-title font-weight-semibold">Morbi in sem quis dui placerat ...</div>
                    <p class="comment">Dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, dapibus...</p>
                    <div class="commenter">
                        <span class="name font-weight-normal">Sakina Stout</span>
                    </div>
                </div><!--End .content-->
            </div><!--End .testimonial-->
        </div><!--End .owl-carousel-->

        <div class="heading heading-flex heading-blog">
            <div class="heading-left">
                <h2 class="title font-weight-semibold">From Our Blog</h2><!-- End .title -->
            </div><!-- End .heading-left -->

            <div class="heading-right">
                <a href="#" class="title-link font-weight-normal">VIEW MORE <i class="icon-long-arrow-right"></i></a>
            </div><!-- End .heading-right -->
        </div><!-- End .heading -->

        <hr class="mb-3">

        <div class="owl-carousel owl-simple owl-entry" data-toggle="owl"
             data-owl-options='{
                        "nav": false,
                        "dots": false,
                        "items": 3,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":1,
                                "dots": true
                            },
                            "576": {
                                "items":2,
                                "dots": true
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            }
                        }
                    }'>
            <article class="entry">
                <figure class="entry-media banner-overlay">
                    <a href="single.html">
                        <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/blogs/post-1.jpg" alt="image desc" style="background-color: #ccc;">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body">
                    <div class="entry-meta">
                        <a href="#">Nov 22, 2018,</a>
                        <a href="#">0 Comments</a>
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Aenean dignissim felis.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        Morbi in sem quis dui placerat ornare. Pelle ntesque odio nisi, euismod in, pharetra ultricies in, diam. Sed arcu.
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->

            <article class="entry">
                <figure class="entry-media banner-overlay">
                    <a href="single.html">
                        <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/blogs/post-2.jpg" alt="image desc" style="background-color: #ccc;">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body">
                    <div class="entry-meta">
                        <a href="#">Nov 22, 2018,</a>
                        <a href="#">0 Comments</a>
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Cras ornare tristique elit.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->

            <article class="entry">
                <figure class="entry-media banner-overlay">
                    <a href="single.html">
                        <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/blogs/post-3.jpg" alt="image desc" style="background-color: #ccc;">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body">
                    <div class="entry-meta">
                        <a href="#">Nov 22, 2018,</a>
                        <a href="#">0 Comments</a>
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Vestibulum auctor dapibus neque.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        Quisque volutpat mattis eros. Nullam malesu erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->

            <article class="entry">
                <figure class="entry-media banner-overlay">
                    <a href="single.html">
                        <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/blogs/post-4.jpg" alt="image desc"  style="background-color: #ccc;">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body">
                    <div class="entry-meta">
                        <a href="#">Nov 22, 2018,</a>
                        <a href="#">0 Comments</a>
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Cras iaculis ultricies nulla.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->
        </div><!-- End .owl-carousel -->
    </div><!--End .container-->
@stop
@section('script')@stop

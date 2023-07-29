<?php $getCommonSetting = getCommonSetting();?>
@extends('layouts.web')
@section('css')@stop
@section('body')
    <div class="intro-slider-container">
        <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{
                        "dots": true,
                        "nav": false,
                        "responsive": {
                            "992": {
                                "nav": true
                            }
                        }
                    }'>
            <div class="intro-slide" style="background-image: url({{asset('assets/web/')}}/assets/images/demos/demo-29/slider/slide-1.jpg);">
                <div class="container">
                    <div class="intro-content text-center">
                        <h3 class="intro-subtitle text-white">SEASONAL PICKS</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title text-white">GET  ALL<br>THE GOOD<br>STUFF</h1><!-- End .intro-title -->

                        <a href="{{url('/')}}" class="btn btn-primary font-weight-semibold">
                            <span>DISCOVER MORE</span>
                            <i class="icon-angle-right"></i>
                        </a>
                    </div><!-- End .intro-content -->
                </div><!-- End .container -->
            </div><!-- End .intro-slide -->

            <div class="intro-slide" style="background-image: url({{asset('assets/web/')}}/assets/images/demos/demo-29/slider/slide-2.jpg);">
                <div class="container">
                    <div class="intro-content text-center">
                        <h3 class="intro-subtitle text-white">FEATURED PRODUCTS</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title text-white">ORGANIC &<br>FAIRTRADE<br>COTTON</h1><!-- End .intro-title -->

                        <a href="{{url('/')}}" class="btn btn-primary font-weight-semibold">
                            <span>DISCOVER MORE</span>
                            <i class="icon-angle-right"></i>
                        </a>
                    </div><!-- End .intro-content -->
                </div><!-- End .container -->
            </div><!-- End .intro-slide -->
        </div><!-- End .intro-slider owl-carousel owl-theme -->

        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->

    <div class="container">
        <div class="owl-carousel owl-theme icon-box" data-toggle="owl" data-owl-options='{
                    "dots": false,
                    "nav": false,
                    "margin": 20,
                    "responsive": {
                        "0": {
                            "items": 1
                        },
                        "576": {
                            "items": 2
                        },
                        "768": {
                            "items": 3
                        },
                        "992": {
                            "items": 4
                        }
                    }
                }'>
            <div class="icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-truck"></i>
                        </span><!--End .icon-box-icon-->

                <div class="icon-box-content">
                    <h3 class="icon-box-title font-weight-semibold text-secondary">Payment &amp; Delivery</h3><!-- End .icon-box-title -->
                    <p>Free shipping for orders over $50</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box-side -->

            <div class="icon-box-side">
                        <span class="icon-box-icon">
                            <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/icons/icon-1.jpg" alt="Icon" width="28" height="28">
                        </span><!--End .icon-box-icon-->

                <div class="icon-box-content">
                    <h3 class="icon-box-title font-weight-semibold text-secondary">Return &amp; Refund</h3><!-- End .icon-box-title -->
                    <p>Free 100% money back guarantee</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box-side -->

            <div class="icon-box-side">
                        <span class="icon-box-icon">
                            <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/icons/icon-2.jpg" alt="Icon" width="28" height="28">
                        </span><!--End .icon-box-icon-->

                <div class="icon-box-content">
                    <h3 class="icon-box-title font-weight-semibold text-secondary">Quality Support</h3><!-- End .icon-box-title -->
                    <p>Alway online feedback 24/7</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box -->

            <div class="icon-box-side">
                        <span class="icon-box-icon">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/icons/icon-3.jpg" alt="Icon" width="28" height="28">
                        </span><!--End .icon-box-icon-->

                <div class="icon-box-content">
                    <h3 class="icon-box-title font-weight-semibold text-secondary">Join our newsletter</h3><!-- End .icon-box-title -->
                    <p>10% off by subscribing to our newsletter</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box-side -->
        </div><!--End .owl-carousel-->

        <div class="banners">
            <div class="row banner-group-1">
                <div class="col-md-6">
                    <div class="banner banner-1 banner-overlay">
                        <a href="#">
                            <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/banners/1.jpg" alt="Banner" width="688" height="400" style="background-color: #f9c8c8;">
                        </a>

                        <div class="banner-content banner-content-center">
                            <h4 class="banner-subtitle text-white">SUMMER SALE</h4><!-- End .banner-subtitle -->
                            <h5 class="text-white">up to</h5>
                            <h3 class="banner-title text-white">40% OFF</h3><!-- End .banner-title -->
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-sm-6 -->

                <div class="col-md-6">
                    <div class="banner banner-2 banner-overlay">
                        <a href="#">
                            <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/banners/2.jpg" alt="Banner" width="688" height="400" style="background-color: #b9a5bc; ">
                        </a>

                        <div class="banner-content banner-content-center">
                            <h4 class="banner-subtitle text-white font-weight-normal">BIRTHDAY</h4><!-- End .banner-subtitle -->
                            <h3 class="banner-title text-white font-weight-normal">GIFT IDEAS</h3><!-- End .banner-title -->
                            <h5 class="text-white">New releases every week</h5>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-sm-6 -->
            </div><!-- End .row -->

            <div class="owl-carousel owl-theme owl-banner-group-2" data-toggle="owl" data-owl-options='{
                        "dots": false,
                        "nav": false,
                        "margin": 20,
                        "responsive": {
                            "0": {
                                "items": 1
                            },
                            "576": {
                                "items": 2
                            },
                            "992": {
                                "items": 3
                            }
                        }
                    }'>
                <div class="banner banner-link-anim banner-overlay">
                    <a href="#">
                        <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/banners/3.jpg" alt="Banner" width="452" height="300" style="background-color: #c0c0c2;">
                    </a>

                    <div class="banner-content banner-content-center">
                        <h3 class="banner-title text-white"><a href="#">Shop Men's</a></h3><!-- End .banner-title -->
                        <h4 class="banner-subtitle text-white"><a href="#">Men's T-shirts & Tank tops</a></h4><!-- End .banner-subtitle -->
                        <a href="#" class="btn banner-link text-white">Shop Now</a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->

                <div class="banner banner-link-anim banner-overlay">
                    <a href="#">
                        <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/banners/4.jpg" alt="Banner"  width="452" height="300" style="background-color: #c0c0c2;">
                    </a>

                    <div class="banner-content banner-content-center">
                        <h3 class="banner-title text-white"><a href="#">Shop Women's</a></h3><!-- End .banner-title -->
                        <h4 class="banner-subtitle text-white"><a href="#">Women's T-Shirts & Tops</a></h4><!-- End .banner-subtitle -->
                        <a href="#" class="btn banner-link text-white">Shop Now</a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->

                <div class="banner banner-link-anim  banner-overlay">
                    <a href="#">
                        <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/banners/5.jpg" alt="Banner"  width="452" height="300" style="background-color: #c0c0c2;">
                    </a>

                    <div class="banner-content banner-content-center">
                        <h3 class="banner-title text-white"><a href="#">B&amp;W Collection</a></h3><!-- End .banner-title -->
                        <h4 class="banner-subtitle text-white"><a href="#">New releases every week</a></h4><!-- End .banner-subtitle -->
                        <a href="#" class="btn banner-link text-white">Shop Now</a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div>
        </div><!--End .banners-->

        <div class="cta-newsletter text-center">
            <span class="cta-icon"><i class="icon-envelope"></i></span>
            <h3 class="title font-weight-semibold">Sign Up For Email & Get 25% Off</h3><!-- End .title -->
            <p class="title-desc">Subcribe to get information about products and coupons</p><!-- End .title-desc -->

            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="Enter your Email Address" aria-label="Email Adress" aria-describedby="newsletter-btn" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="newsletter-btn">
                            <span class="font-weight-semibold">SUBSCRIBE</span></button>
                    </div><!-- .End .input-group-append -->
                </div><!-- .End .input-group -->
            </form>
        </div><!-- End .cta-newsletter -->

        <div class="heading heading-flex">
            <div class="heading-left">
                <h2 class="title font-weight-semibold">Featured Products</h2><!-- End .title -->
            </div><!-- End .heading-left -->

            <div class="heading-right">
                <a href="#" class="title-link font-weight-normal">VIEW MORE <i class="icon-long-arrow-right"></i></a>
            </div><!-- End .heading-right -->
        </div><!-- End .heading -->

        <hr class="mb-3">

        <div class="products">
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/1-1.jpg" alt="Product image" class="product-image" style="background-color: #ebebeb;">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/1-2.jpg" alt="Product image" class="product-image-hover" style="background-color: #ebebeb;">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Add to Cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="product.html">Long Fit T-shirt</a></h3><!-- End .product-title -->
                            <div class="product-price">$9.99</div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/2-1.jpg" alt="Product image" class="product-image" style="background-color: #ebebeb;">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/2-2.jpg" alt="Product image" class="product-image-hover" style="background-color: #ebebeb;">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Add to Cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="product.html">Short-sleeved Sports Shirt</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $13.99
                            </div><!-- End .product-price -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #d41a34;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/3-1.jpg" alt="Product image" class="product-image" style="background-color: #ebebeb;">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/3-2.jpg" alt="Product image" class="product-image-hover" style="background-color: #ebebeb;">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Add to Cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="product.html">Striped Shirt</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $17.99
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <span class="product-label label-sale">SALE</span>
                            <a href="product.html">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/4-1.jpg" alt="Product image" class="product-image" style="background-color: #ebebeb;">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/4-2.jpg" alt="Product image" class="product-image-hover" style="background-color: #ebebeb;">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Add to Cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="product.html">Cotton T-shirt</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <span class="new-price">$6.99</span>
                                <span class="old-price"><del>$9.99</del></span>
                            </div><!-- End .product-price -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #555;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #dccfc6;"><span class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/5-1.jpg" alt="Product image" class="product-image" style="background-color: #ebebeb;">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/5-2.jpg" alt="Product image" class="product-image-hover" style="background-color: #ebebeb;">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Add to Cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="product.html">Long Hooded T-shirt</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $17.99
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <span class="product-label label-sale">SALE</span>
                            <a href="product.html">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/6-1.jpg" alt="Product image" class="product-image" style="background-color: #ebebeb;">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/6-2.jpg" alt="Product image" class="product-image-hover" style="background-color: #ebebeb;">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Add to Cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="product.html">Printed Cotton Shirt</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <span class="new-price">$12.99</span>
                                <span class="old-price"><del>$17.99</del></span>
                            </div><!-- End .product-price -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #f0a91d;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #efece3;"><span class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/7-1.jpg" alt="Product image" class="product-image" style="background-color: #ebebeb;">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/7-2.jpg" alt="Product image" class="product-image-hover" style="background-color: #ebebeb;">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Add to Cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="product.html">Oversized Printed T-shirt</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $17.99
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/8-1.jpg" alt="Product image" class="product-image" style="background-color: #ebebeb;">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/8-2.jpg" alt="Product image" class="product-image-hover" style="background-color: #ebebeb;">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Add to Cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="product.html">Wool Jersey T-shirt</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $49.99
                            </div><!-- End .product-price -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #666d71;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #3c3c3c;"><span class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/9-1.jpg" alt="Product image" class="product-image" style="background-color: #ebebeb;">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/9-2.jpg" alt="Product image" class="product-image-hover" style="background-color: #ebebeb;">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Add to Cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="product.html">slub Jersey Henley Shirt</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $14.99
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/10-1.jpg" alt="Product image" class="product-image" style="background-color: #ebebeb;">
                                <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/10-2.jpg" alt="Product image" class="product-image-hover" style="background-color: #ebebeb;">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Add to Cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="product.html">Raw-edge T-shirt</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $12.99
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .products -->

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

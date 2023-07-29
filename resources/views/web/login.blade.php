
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/web/')}}/assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/web/')}}/assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/web/')}}/assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="{{asset('assets/web/')}}/assets/images/icons/site.html">
    <link rel="mask-icon" href="{{asset('assets/web/')}}/assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="{{asset('assets/web/')}}/assets/images/icons/favicon.ico">
    <link rel="stylesheet" href="{{asset('assets/web/')}}/assets/vendor/font-awesome/css/all.min.css">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('assets/web/')}}/assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('assets/web/')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/web/')}}/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('assets/web/')}}/assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('assets/web/')}}/assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('assets/web/')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('assets/web/')}}/assets/css/skins/skin-demo-29.css">
    <link rel="stylesheet" href="{{asset('assets/web/')}}/assets/css/demos/demo-29.css">

    <script>
        WebFontConfig = {
            google: { families: [ 'Poppins:300,400,500,600,700','Modak:400','Sedgwick Ave:400','Carter+One:400'] }
        };
        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '{{asset('assets/web/')}}/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>
</head>

<body>
<div class="page-wrapper">
    <header class="header header-6">
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
                </div><!-- End .header-left -->

                <div class="header-right">
                    <div class="social-icons social-icons-color">
                        <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon social-instagram" title="Pinterest" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon social-pinterest" title="Instagram" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                    </div><!--End .social-icons-->

                    <ul class="top-menu top-link-menu">
                        <li>
                            <a href="#">Links<i class="icon-angle-down"></i></a>
                            <ul>
                                <li class="login"><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a></li>

                                <li class="header-dropdown">
                                    <a href="#">USD</a>
                                    <ul class="header-menu">
                                        <li><a href="#">Eur</a></li>
                                        <li><a href="#">Usd</a></li>
                                    </ul><!-- End .header-menu -->
                                </li><!--End .header-dropdown-->

                                <li class="header-dropdown">
                                    <a href="#">Eng</a>
                                    <ul class="header-menu">
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">Spanish</a></li>
                                    </ul><!-- End .header-menu -->
                                </li><!--End .header-dropdown-->
                            </ul><!--End ul-->
                        </li>
                    </ul><!-- End .top-menu -->
                </div><!-- End .header-right -->
            </div><!--End .container-->
        </div><!--End .header-top-->

        <div class="header-middle">
            <div class="container">
                <div class="header-left">
                    <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                        <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                        <form action="#" method="get">
                            <div class="header-search-wrapper search-wrapper-wide">
                                <label for="q" class="sr-only">Search</label>
                                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                            </div><!-- End .header-search-wrapper -->
                        </form>
                    </div><!-- End .header-search -->
                </div><!--End .header-left-->

                <div class="header-center">
                    <a href="index.html" class="logo">
                        <img src="{{asset('assets/web/')}}/assets/images/demos/demo-6/logo.png" alt="Molla Logo" width="82" height="20">
                    </a><!--End .logo-->
                </div><!-- End .header-left -->

                <div class="header-right">
                    <a href="wishlist.html" class="wishlist-link">
                        <i class="icon-heart-o"></i>
                        <span class="wishlist-count">3</span>
                        <span class="wishlist-txt">My Wishlist</span>
                    </a><!--End .wishlist-link-->

                    <div class="dropdown cart-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">2</span>
                            <span class="cart-txt font-weight-semibold">$ 164,00</span>
                        </a><!--End .dropdown-toggle-->

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="product.html">Long Hooded T-shirt</a>
                                        </h4><!--End .product-title-->

                                        <span class="cart-product-info">
                                                <span class="cart-product-qty">1</span>
                                                x $17.99
                                            </span><!--End .cart-product-info-->
                                    </div><!-- End .product-cart-details -->

                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/5-1.jpg" alt="product" width="60" height="60">
                                        </a>
                                    </figure><!--End .product-image-container-->

                                    <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                </div><!-- End .product -->

                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="product.html">Raw-dege T-shirt</a>
                                        </h4><!--End .product-title-->

                                        <span class="cart-product-info">
                                                <span class="cart-product-qty">1</span>
                                                x $12.99
                                            </span><!--End .cart-product-info-->
                                    </div><!-- End .product-cart-details -->

                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/products/10-1.jpg" alt="product" width="60" height="60">
                                        </a>
                                    </figure><!--End .product-image-container-->

                                    <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                </div><!-- End .product -->
                            </div><!-- End .dropdown-cart-product -->

                            <div class="dropdown-cart-total">
                                <span>Total</span>
                                <span class="cart-total-price">$30.98</span>
                            </div><!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="cart.html" class="btn btn-primary">View Cart</a>
                                <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .dropdown-cart-action -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .cart-dropdown -->
                </div><!--End .header-right-->
            </div><!-- End .container -->
        </div><!-- End .header-middle -->

        <div class="header-bottom sticky-header">
            <div class="container">
                <div class="header-left">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li class="megamenu-container active">
                                <a href="index.html" class="sf-with-ul">Home</a>

                                <div class="megamenu demo">
                                    <div class="menu-col">
                                        <div class="menu-title">Choose your demo</div><!-- End .menu-title -->

                                        <div class="demo-list">
                                            <div class="demo-item">
                                                <a href="index-1.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/1.jpg);"></span>
                                                    <span class="demo-title">01 - furniture store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-2.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/2.jpg);"></span>
                                                    <span class="demo-title">02 - furniture store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-3.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/3.jpg);"></span>
                                                    <span class="demo-title">03 - electronic store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-4.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/4.jpg);"></span>
                                                    <span class="demo-title">04 - electronic store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-5.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/5.jpg);"></span>
                                                    <span class="demo-title">05 - fashion store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-6.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/6.jpg);"></span>
                                                    <span class="demo-title">06 - fashion store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-7.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/7.jpg);"></span>
                                                    <span class="demo-title">07 - fashion store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-8.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/8.jpg);"></span>
                                                    <span class="demo-title">08 - fashion store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-9.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/9.jpg);"></span>
                                                    <span class="demo-title">09 - fashion store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-10.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/10.jpg);"></span>
                                                    <span class="demo-title">10 - shoes store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-11.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/11.jpg);"></span>
                                                    <span class="demo-title">11 - furniture simple store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-12.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/12.jpg);"></span>
                                                    <span class="demo-title">12 - fashion simple store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-13.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/13.jpg);"></span>
                                                    <span class="demo-title">13 - market</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-14.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/14.jpg);"></span>
                                                    <span class="demo-title">14 - market fullwidth</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-15.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/15.jpg);"></span>
                                                    <span class="demo-title">15 - lookbook 1</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-16.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/16.jpg);"></span>
                                                    <span class="demo-title">16 - lookbook 2</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-17.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/17.jpg);"></span>
                                                    <span class="demo-title">17 - fashion store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-18.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/18.jpg);"></span>
                                                    <span class="demo-title">18 - fashion store (with sidebar)</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-19.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/19.jpg);"></span>
                                                    <span class="demo-title">19 - games store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-20.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/20.jpg);"></span>
                                                    <span class="demo-title">20 - book store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-21.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/21.jpg);"></span>
                                                    <span class="demo-title">21 - sport store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-22.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/22.jpg);"></span>
                                                    <span class="demo-title">22 - tools store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-23.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/23.jpg);"></span>
                                                    <span class="demo-title">23 - fashion left navigation store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-24.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/24.jpg);"></span>
                                                    <span class="demo-title">24 - extreme sport store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-25.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/25.jpg);"></span>
                                                    <span class="demo-title">25 - jewelry store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-26.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/26.jpg);"></span>
                                                    <span class="demo-title">26 - market store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-27.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/27.jpg);"></span>
                                                    <span class="demo-title">27 - fashion store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-28.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/28.jpg);"></span>
                                                    <span class="demo-title">28 - food market store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-29.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/29.jpg);"></span>
                                                    <span class="demo-title">29 - t-shirts store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-30.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/30.jpg);"></span>
                                                    <span class="demo-title">30 - headphones store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-31.html">
                                                    <span class="demo-bg" style="background-image: url({{asset('assets/web/')}}/assets/images/menu/demos/31.jpg);"></span>
                                                    <span class="demo-title">31 - yoga store</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                        </div><!-- End .demo-list -->

                                        <div class="megamenu-action text-center">
                                            <a href="#" class="btn btn-outline-primary-2 view-all-demos"><span>View All Demos</span><i class="icon-long-arrow-right"></i></a>
                                        </div><!-- End .text-center -->
                                    </div><!-- End .menu-col -->
                                </div><!-- End .megamenu -->
                            </li>

                            <li>
                                <a href="category.html" class="sf-with-ul">Shop</a>

                                <div class="megamenu megamenu-md">
                                    <div class="row no-gutters">
                                        <div class="col-md-8">
                                            <div class="menu-col">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="menu-title">Shop with sidebar</div><!-- End .menu-title -->
                                                        <ul>
                                                            <li><a href="category-list.html">Shop List</a></li>
                                                            <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                                                            <li><a href="category.html">Shop Grid 3 Columns</a></li>
                                                            <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                                                            <li><a href="category-market.html"><span>Shop Market<span class="tip tip-new">New</span></span></a></li>
                                                        </ul>

                                                        <div class="menu-title">Shop no sidebar</div><!-- End .menu-title -->
                                                        <ul>
                                                            <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span class="tip tip-hot">Hot</span></span></a></li>
                                                            <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                                                        </ul>
                                                    </div><!-- End .col-md-6 -->

                                                    <div class="col-md-6">
                                                        <div class="menu-title">Product Category</div><!-- End .menu-title -->
                                                        <ul>
                                                            <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                                                            <li><a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span class="tip tip-new">New</span></span></a></li>
                                                        </ul>
                                                        <div class="menu-title">Shop Pages</div><!-- End .menu-title -->
                                                        <ul>
                                                            <li><a href="cart.html">Cart</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="wishlist.html">Wishlist</a></li>
                                                            <li><a href="dashboard.html">My Account</a></li>
                                                            <li><a href="#">Lookbook</a></li>
                                                        </ul>
                                                    </div><!-- End .col-md-6 -->
                                                </div><!-- End .row -->
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .col-md-8 -->

                                        <div class="col-md-4">
                                            <div class="banner banner-overlay">
                                                <a href="category.html" class="banner banner-menu">
                                                    <img src="{{asset('assets/web/')}}/assets/images/menu/banner-1.jpg" alt="Banner">

                                                    <div class="banner-content banner-content-top">
                                                        <div class="banner-title text-white">Last <br>Chance<br><span><strong>Sale</strong></span></div><!-- End .banner-title -->
                                                    </div><!-- End .banner-content -->
                                                </a><!--End .banner banner-menu-->
                                            </div><!-- End .banner banner-overlay -->
                                        </div><!-- End .col-md-4 -->
                                    </div><!-- End .row -->
                                </div><!-- End .megamenu megamenu-md -->
                            </li>

                            <li>
                                <a href="product.html" class="sf-with-ul">Product</a>

                                <div class="megamenu megamenu-sm">
                                    <div class="row no-gutters">
                                        <div class="col-md-6">
                                            <div class="menu-col">
                                                <div class="menu-title">Product Details</div><!-- End .menu-title -->
                                                <ul>
                                                    <li><a href="product.html">Default</a></li>
                                                    <li><a href="product-centered.html">Centered</a></li>
                                                    <li><a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a></li>
                                                    <li><a href="product-gallery.html">Gallery</a></li>
                                                    <li><a href="product-sticky.html">Sticky Info</a></li>
                                                    <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                                                    <li><a href="product-fullwidth.html">Full Width</a></li>
                                                    <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                                                </ul>
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .col-md-6 -->

                                        <div class="col-md-6">
                                            <div class="banner banner-overlay">
                                                <a href="category.html">
                                                    <img src="{{asset('assets/web/')}}/assets/images/menu/banner-2.jpg" alt="Banner">

                                                    <div class="banner-content banner-content-bottom">
                                                        <div class="banner-title text-white">New Trends<br><span><strong>spring 2019</strong></span></div><!-- End .banner-title -->
                                                    </div><!-- End .banner-content -->
                                                </a>
                                            </div><!-- End .banner -->
                                        </div><!-- End .col-md-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .megamenu megamenu-sm -->
                            </li>

                            <li>
                                <a href="#" class="sf-with-ul">Pages</a>

                                <ul>
                                    <li>
                                        <a href="about.html" class="sf-with-ul">About</a>

                                        <ul>
                                            <li><a href="about.html">About 01</a></li>
                                            <li><a href="about-2.html">About 02</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="contact.html" class="sf-with-ul">Contact</a>

                                        <ul>
                                            <li><a href="contact.html">Contact 01</a></li>
                                            <li><a href="contact-2.html">Contact 02</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="faq.html">FAQs</a></li>
                                    <li><a href="404.html">Error 404</a></li>
                                    <li><a href="coming-soon.html">Coming Soon</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="blog.html" class="sf-with-ul">Blog</a>

                                <ul>
                                    <li><a href="blog.html">Classic</a></li>
                                    <li><a href="blog-listing.html">Listing</a></li>

                                    <li>
                                        <a href="#">Grid</a>
                                        <ul>
                                            <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                            <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                            <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                            <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#">Masonry</a>
                                        <ul>
                                            <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                            <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                            <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                            <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#">Mask</a>
                                        <ul>
                                            <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                            <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#">Single Post</a>
                                        <ul>
                                            <li><a href="single.html">Default with sidebar</a></li>
                                            <li><a href="single-fullwidth.html">Fullwidth no sidebar</a></li>
                                            <li><a href="single-fullwidth-sidebar.html">Fullwidth with sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="elements-list.html" class="sf-with-ul">Elements</a>

                                <ul>
                                    <li><a href="elements-products.html">Products</a></li>
                                    <li><a href="elements-typography.html">Typography</a></li>
                                    <li><a href="elements-titles.html">Titles</a></li>
                                    <li><a href="elements-banners.html">Banners</a></li>
                                    <li><a href="elements-product-category.html">Product Category</a></li>
                                    <li><a href="elements-video-banners.html">Video Banners</a></li>
                                    <li><a href="elements-buttons.html">Buttons</a></li>
                                    <li><a href="elements-accordions.html">Accordions</a></li>
                                    <li><a href="elements-tabs.html">Tabs</a></li>
                                    <li><a href="elements-testimonials.html">Testimonials</a></li>
                                    <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                                    <li><a href="elements-portfolio.html">Portfolio</a></li>
                                    <li><a href="elements-cta.html">Call to Action</a></li>
                                    <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
                                </ul>
                            </li>
                        </ul><!-- End .menu -->
                    </nav><!-- End .main-nav -->

                    <button class="mobile-menu-toggler">
                        <span class="sr-only">Toggle mobile menu</span>
                        <i class="icon-bars"></i>
                    </button><!--End .mobile-menu-toggler-->
                </div><!-- End .header-left -->

                <div class="header-right">
                    <i class="icon-medapps"></i>
                    <p class="font-weight-semibold text-secondary">Clearance Up to 30% Off</p>
                </div><!--End .header-right-->
            </div><!-- End .container -->
        </div><!-- End .header-bottom -->
    </header><!-- End .header -->

    <main class="main">
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

                            <a href="category.html" class="btn btn-primary font-weight-semibold">
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

                            <a href="category.html" class="btn btn-primary font-weight-semibold">
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
    </main><!--End .main-->

    <footer class="footer footer-2">
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xl-2-5col">
                        <div class="widget widget-about">
                            <img src="{{asset('assets/web/')}}/assets/images/demos/demo-29/logo-2.png" class="footer-logo" alt="Footer Logo" width="82" height="22">
                            <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus. </p>

                            <div class="widget-about-info">
                                <div class="phoneNum">
                                    <span class="widget-about-title">Got Question? Call us 24/7</span>
                                    <a href="tel:123456789">+0123 456 789</a>
                                </div><!-- End .phoneNum-->

                                <div class="payment">
                                    <span class="widget-about-title">Payment Method</span>
                                    <figure class="footer-payments">
                                        <img src="{{asset('assets/web/')}}/assets/images/payments.png" alt="Payment methods" width="272" height="20">
                                    </figure><!-- End .footer-payments -->
                                </div><!-- End .payment-->
                            </div><!-- End .widget-about-info -->
                        </div><!-- End .widget about-widget -->
                    </div><!-- End .col-md-12 col-xl-2-5col-->

                    <div class="col-md-12 col-xl-3-5col">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="widget">
                                    <h4 class="widget-title text-white">Information</h4><!-- End .widget-title -->

                                    <ul class="widget-list">
                                        <li><a href="about.html">About Molla</a></li>
                                        <li><a href="#">How to shop on Molla</a></li>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="contact.html">Contact us</a></li>
                                        <li><a href="login.html">Log in</a></li>
                                    </ul><!-- End .widget-list -->
                                </div><!-- End .widget -->
                            </div><!-- End .col-md-4 -->

                            <div class="col-md-4">
                                <div class="widget">
                                    <h4 class="widget-title text-white">Customer Service</h4><!-- End .widget-title -->

                                    <ul class="widget-list">
                                        <li><a href="#">Payment Methods</a></li>
                                        <li><a href="#">Money-back guarantee!</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Shipping</a></li>
                                        <li><a href="#">Terms and conditions</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul><!-- End .widget-list -->
                                </div><!-- End .widget -->
                            </div><!-- End .col-md-4 -->

                            <div class="col-md-4">
                                <div class="widget">
                                    <h4 class="widget-title text-white">My Account</h4><!-- End .widget-title -->

                                    <ul class="widget-list">
                                        <li><a href="#">Sign In</a></li>
                                        <li><a href="cart.html">View Cart</a></li>
                                        <li><a href="#">My Wishlist</a></li>
                                        <li><a href="#">Track My Order</a></li>
                                        <li><a href="#">Help</a></li>
                                    </ul><!-- End .widget-list -->
                                </div><!-- End .widget -->
                            </div><!-- End .col-md-4 -->
                        </div><!--End .row-->
                    </div><!--End .col-md-12 col-xl-3-5col-->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!--End .footer-middle-->

        <div class="footer-bottom">
            <div class="container">
                <p class="footer-copyright">Copyright © 2020 Molla Store. All Rights Reserved.</p><!-- End .footer-copyright -->
                <ul class="footer-menu">
                    <li><a href="#">Terms Of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul><!-- End .footer-menu -->

                <div class="social-icons social-icons-color">
                    <span class="social-label">Social Media</span>
                    <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                    <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                    <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                </div><!-- End .soial-icons -->
            </div><!-- End .container -->
        </div><!-- End .footer-bottom -->

    </footer><!-- End .footer -->
</div>

<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active">
                    <a href="index.html">Home</a>

                    <ul>
                        <li><a href="index-1.html">01 - furniture store</a></li>
                        <li><a href="index-2.html">02 - furniture store</a></li>
                        <li><a href="index-3.html">03 - electronic store</a></li>
                        <li><a href="index-4.html">04 - electronic store</a></li>
                        <li><a href="index-5.html">05 - fashion store</a></li>
                        <li><a href="index-6.html">06 - fashion store</a></li>
                        <li><a href="index-7.html">07 - fashion store</a></li>
                        <li><a href="index-8.html">08 - fashion store</a></li>
                        <li><a href="index-9.html">09 - fashion store</a></li>
                        <li><a href="index-10.html">10 - shoes store</a></li>
                        <li><a href="index-11.html">11 - furniture simple store</a></li>
                        <li><a href="index-12.html">12 - fashion simple store</a></li>
                        <li><a href="index-13.html">13 - market</a></li>
                        <li><a href="index-14.html">14 - market fullwidth</a></li>
                        <li><a href="index-15.html">15 - lookbook 1</a></li>
                        <li><a href="index-16.html">16 - lookbook 2</a></li>
                        <li><a href="index-17.html">17 - fashion store</a></li>
                        <li><a href="index-18.html">18 - fashion store (with sidebar)</a></li>
                        <li><a href="index-19.html">19 - games store</a></li>
                        <li><a href="index-20.html">20 - book store</a></li>
                        <li><a href="index-21.html">21 - sport store</a></li>
                        <li><a href="index-22.html">22 - tools store</a></li>
                        <li><a href="index-23.html">23 - fashion left navigation store</a></li>
                        <li><a href="index-24.html">24 - extreme sport store</a></li>
                    </ul>
                </li>

                <li>
                    <a href="category.html">Shop</a>
                    <ul>
                        <li><a href="category-list.html">Shop List</a></li>
                        <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                        <li><a href="category.html">Shop Grid 3 Columns</a></li>
                        <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                        <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span class="tip tip-hot">Hot</span></span></a></li>
                        <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                        <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                        <li><a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span class="tip tip-new">New</span></span></a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="wishlist.html">Wishlist</a></li>
                        <li><a href="#">Lookbook</a></li>
                    </ul>
                </li>

                <li>
                    <a href="product.html" class="sf-with-ul">Product</a>
                    <ul>
                        <li><a href="product.html">Default</a></li>
                        <li><a href="product-centered.html">Centered</a></li>
                        <li><a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a></li>
                        <li><a href="product-gallery.html">Gallery</a></li>
                        <li><a href="product-sticky.html">Sticky Info</a></li>
                        <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                        <li><a href="product-fullwidth.html">Full Width</a></li>
                        <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">Pages</a>
                    <ul>
                        <li>
                            <a href="about.html">About</a>

                            <ul>
                                <li><a href="about.html">About 01</a></li>
                                <li><a href="about-2.html">About 02</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact.html">Contact</a>

                            <ul>
                                <li><a href="contact.html">Contact 01</a></li>
                                <li><a href="contact-2.html">Contact 02</a></li>
                            </ul>
                        </li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="faq.html">FAQs</a></li>
                        <li><a href="404.html">Error 404</a></li>
                        <li><a href="coming-soon.html">Coming Soon</a></li>
                    </ul>
                </li>

                <li>
                    <a href="blog.html">Blog</a>

                    <ul>
                        <li><a href="blog.html">Classic</a></li>
                        <li><a href="blog-listing.html">Listing</a></li>
                        <li>
                            <a href="#">Grid</a>
                            <ul>
                                <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Masonry</a>
                            <ul>
                                <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Mask</a>
                            <ul>
                                <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Single Post</a>
                            <ul>
                                <li><a href="single.html">Default with sidebar</a></li>
                                <li><a href="single-fullwidth.html">Fullwidth no sidebar</a></li>
                                <li><a href="single-fullwidth-sidebar.html">Fullwidth with sidebar</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="elements-list.html">Elements</a>
                    <ul>
                        <li><a href="elements-products.html">Products</a></li>
                        <li><a href="elements-typography.html">Typography</a></li>
                        <li><a href="elements-titles.html">Titles</a></li>
                        <li><a href="elements-banners.html">Banners</a></li>
                        <li><a href="elements-product-category.html">Product Category</a></li>
                        <li><a href="elements-video-banners.html">Video Banners</a></li>
                        <li><a href="elements-buttons.html">Buttons</a></li>
                        <li><a href="elements-accordions.html">Accordions</a></li>
                        <li><a href="elements-tabs.html">Tabs</a></li>
                        <li><a href="elements-testimonials.html">Testimonials</a></li>
                        <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                        <li><a href="elements-portfolio.html">Portfolio</a></li>
                        <li><a href="elements-cta.html">Call to Action</a></li>
                        <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
                    </ul>
                </li>
            </ul><!--End .mobile-menu-->
        </nav><!-- End .mobile-nav -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

<!-- Sign in / Register Modal -->
<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">
                            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                <form action="#">
                                    <div class="form-group">
                                        <label for="singin-email">Username or email address *</label>
                                        <input type="text" class="form-control" id="singin-email" name="singin-email" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password">Password *</label>
                                        <input type="password" class="form-control" id="singin-password" name="singin-password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember">
                                            <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                        </div><!-- End .custom-checkbox -->

                                        <a href="#" class="forgot-link">Forgot Your Password?</a>
                                    </div><!-- End .form-footer -->
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">or sign in with</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                Login With Google
                                            </a>
                                        </div><!-- End .col-6 -->
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-f">
                                                <i class="icon-facebook-f"></i>
                                                Login With Facebook
                                            </a>
                                        </div><!-- End .col-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .form-choice -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action="#">
                                    <div class="form-group">
                                        <label for="register-email">Your email address *</label>
                                        <input type="email" class="form-control" id="register-email" name="register-email" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password">Password *</label>
                                        <input type="password" class="form-control" id="register-password" name="register-password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                            <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-footer -->
                                </form>

                                <div class="form-choice">
                                    <p class="text-center">or sign in with</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                Login With Google
                                            </a>
                                        </div><!-- End .col-6 -->
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-f">
                                                <i class="icon-facebook-f"></i>
                                                Login With Facebook
                                            </a>
                                        </div><!-- End .col-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .form-choice -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div><!-- End .modal -->

<!-- Sign in / Register Modal -->
<div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="row no-gutters bg-white newsletter-popup-content">
                <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                    <div class="banner-content text-center">
                        <img src="{{asset('assets/web/')}}/assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60" height="15">
                        <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                        <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>
                        <form action="#">
                            <div class="input-group input-group-round">
                                <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                <div class="input-group-append">
                                    <button class="btn" type="submit"><span>go</span></button>
                                </div><!-- .End .input-group-append -->
                            </div><!-- .End .input-group -->
                        </form>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                            <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                        </div><!-- End .custom-checkbox -->
                    </div>
                </div>
                <div class="col-xl-2-5col col-lg-5 ">
                    <img src="{{asset('assets/web/')}}/assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Plugins JS File -->
<script src="{{asset('assets/web/')}}/assets/js/jquery.min.js"></script>
<script src="{{asset('assets/web/')}}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/web/')}}/assets/js/jquery.hoverIntent.min.js"></script>
<script src="{{asset('assets/web/')}}/assets/js/jquery.waypoints.min.js"></script>
<script src="{{asset('assets/web/')}}/assets/js/superfish.min.js"></script>
<script src="{{asset('assets/web/')}}/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('assets/web/')}}/assets/js/jquery.plugin.min.js"></script>
<script src="{{asset('assets/web/')}}/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('assets/web/')}}/assets/js/jquery.countdown.min.js"></script>
<!-- Main JS File -->
<script src="{{asset('assets/web/')}}/assets/js/demos/demo-29.js"></script>
<script src="{{asset('assets/web/')}}/assets/js/main.js"></script>
<script>(function(){var js = "window['__CF$cv$params']={r:'7ed1e8cecd4118f5'};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../../cdn-cgi/challenge-platform/h/g/scripts/jsd/f0089873/invisible.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";var _0xh = document.createElement('iframe');_0xh.height = 1;_0xh.width = 1;_0xh.style.position = 'absolute';_0xh.style.top = 0;_0xh.style.left = 0;_0xh.style.border = 'none';_0xh.style.visibility = 'hidden';document.body.appendChild(_0xh);function handler() {var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;if (_0xi) {var _0xj = _0xi.createElement('script');_0xj.innerHTML = js;_0xi.getElementsByTagName('head')[0].appendChild(_0xj);}}if (document.readyState !== 'loading') {handler();} else if (window.addEventListener) {document.addEventListener('DOMContentLoaded', handler);} else {var prev = document.onreadystatechange || function () {};document.onreadystatechange = function (e) {prev(e);if (document.readyState !== 'loading') {document.onreadystatechange = prev;handler();}};}})();</script></body>
</html>
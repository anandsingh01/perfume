<?php $getCommonSetting = getCommonSetting();?>
@extends('layouts.web')
@section('css')
    <style>
        .btn-product:hover span, .btn-product:focus span {
            color: #fff;
            box-shadow: 0 1px 0 0 #c96;
        }


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
        .input-group {
            padding: 0 2rem 0.9rem;
            justify-content: center;
        }
    </style>
@stop
@section('body')
    <?php
    $get_hero_banner = get_hero_banner();
    $getCommonSetting = getCommonSetting();
    ?>
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
                </ol>

                <nav class="product-pager ml-auto" aria-label="Product">
                    <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                        <i class="icon-angle-left"></i>
                        <span>Prev</span>
                    </a>

                    <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                        <span>Next</span>
                        <i class="icon-angle-right"></i>
                    </a>
                </nav><!-- End .pager-nav -->
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="product-details-top mb-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery">

                                <div class="product-gallery">
                                    <!-- The active image will be displayed here -->
                                    <img id="productImage" src="{{asset($product->getPrices[0]->image)}}"
                                         data-zoom-image="{{asset($product->getPrices[0]->image)}}" alt="{{$product->title}}">
                                </div>

{{--                                <figure class="product-main-image">--}}
{{--                                    <img id="product-zoom" src="{{asset($product->photo)}}" data-zoom-image="{{asset($product->photo)}}" alt="{{$product->title}}">--}}
{{--                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">--}}
{{--                                        <i class="icon-arrows"></i>--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
                                <!-- End .product-main-image -->
{{--                                <div id="product-zoom-gallery" class="product-image-gallery">--}}
{{--                                    <a class="product-gallery-item active" href="#" data-image="{{asset($product->photo)}}" data-zoom-image="{{asset($product->photo)}}">--}}
{{--                                        <img src="{{asset($product->photo)}}" alt="{{$product->title}}">--}}
{{--                                    </a>--}}

{{--                                    @forelse($product->getGallery as $key => $gallery)--}}
{{--                                        <a class="product-gallery-item" href="#" data-image="{{asset($gallery->image)}}" data-zoom-image="{{asset($gallery->image)}}">--}}
{{--                                            <img src="{{asset($gallery->image)}}" alt="{{$product->title}}">--}}
{{--                                        </a>--}}
{{--                                    @empty--}}
{{--                                        <!-- Show a default image or a message if the gallery is empty -->--}}
{{--                                        <a class="product-gallery-item" href="#">--}}
{{--                                            <img src="{{asset($product->photo)}}" alt="{{$product->title}}">--}}
{{--                                        </a>--}}
{{--                                    @endforelse--}}
{{--                                </div>--}}
                            </div>
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title">{{$product->title}}</h1><!-- End .product-title -->

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                </div><!-- End .rating-container -->

                                <div class="product-price text-left">
                                    $ {{number_format($product->getPrices[0]->price,2)}}
                                </div><!-- End .product-price -->

                                <div class="product-content">
                                    <p><?php echo $product->product_short_desc;?></p>
                                </div><!-- End .product-content -->

                                <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                                <input type="hidden" id="product_name" name="product_name" value="{{$product->title}}">
                                <input type="hidden" id="section_id" name="section_id" value="{{$product->section_id}}">
                                <input type="hidden" id="brands_id" name="brands_id" value="{{$product->brands_id}}">
                                <div class="details-filter-row details-row-size">
                                    <label>Size:</label>
                                    <div class="product-size">
                                        @forelse($product->getPrices as $key => $variations)
                                            <a href="javascript:void(0)"
                                               data-size="{{ $variations->size }}"
                                            data-price="{{ $variations->price }}"
                                            data-qty="{{ $variations->qty }}"
                                            data-msp="{{ $variations->msp }}"
                                            data-image="{{ $variations->image }}"
                                            data-variation_product_id="{{ $variations->product_id }}"
                                            title="{{ $variations->size }}" class="size-option @if($loop->first) active @endif">{{ $variations->size }}</a>
                                        @empty
                                        @endforelse
                                    </div><!-- End .product-size -->
                                </div>
                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Qty:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" id="qty" class="form-control" value="1" min="1" step="1" data-decimals="0" required>
                                    </div><!-- End .product-details-quantity -->
                                    <span id="maxLimitMsg" style="color: red; display: none;">Maximum quantity reached.</span>
                                </div><!-- End .details-filter-row -->

                                <div class="product-details-action">
                                    <a href="javascript:void(0)" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-details-action -->

                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <h6>Brand:<a href="{{url('brands/'.$product->get_brands->category_name ?? '')}}">
                                                {{$product->get_brands->category_name ?? ''}}</a></h6>
                                        <h6>Category:
                                        <a href="{{url('category/'.$product->section->category_name ?? '')}}">
                                        {{$product->section->category_name ?? ''}}
                                        </a>
                                            </h6>
                                    </div><!-- End .product-cat -->

                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Share:</span>
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                    </div>
                                </div><!-- End .product-details-footer -->
                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->
            </div><!-- End .container -->

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


            <div class="product-details-tab product-details-extended">
                <div class="container">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>--}}
{{--                        </li>--}}
                    </ul>
                </div><!-- End .container -->

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                        <div class="product-desc-content">
                            <div class="container">
                                <p><?php echo $product->product_desc;?></p>

                            </div><!-- End .container -->
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                        <div class="reviews">
                            <div class="container">
                                <h3>Reviews (2)</h3>
                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">Samanta J.</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">6 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Good, perfect size</h4>

                                            <div class="review-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->

                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">John Doe</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">5 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Very good</h4>

                                            <div class="review-content">
                                                <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->
                            </div><!-- End .container -->
                        </div><!-- End .reviews -->
                    </div><!-- .End .tab-pane -->

{{--                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">--}}
{{--                        <div class="product-desc-content">--}}
{{--                            <div class="container">--}}
{{--                                <h3>Delivery & returns</h3>--}}
{{--                                <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>--}}
{{--                                    We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>--}}
{{--                            </div><!-- End .container -->--}}
{{--                        </div><!-- End .product-desc-content -->--}}
{{--                    </div><!-- .End .tab-pane -->--}}

                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->

            <?php $get_product_favorites = getRelatedProducts($product->get_brands->id); ?>
                <!-- End .owl-carousel -->
            <!-- End .owl-carousel -->
            <div class="container products-slider mt-5 mb-5">
                <div class="heading heading-center mb-3">
                    <h2 class="title mb-5">YOU MAY ALSO LIKE</h2>
                    <!-- End .title -->
                </div>
                <!-- End .heading -->
                <div class="container">
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
                    <!-- .End .tab-pane -->
                </div>
                <!-- End .tab-content -->
            </div>
        </div><!-- End .page-content -->
    </main><!-- End .main -->

@stop
@section('script')
    <script>

        // Add click event listener to the size options
        $(document).ready(function() {
            const productPriceElement = $('.product-price');
            const productImage = $('#productImage');

            $('.size-option').click(function(event) {
                event.preventDefault();
                const $selectedOption = $(this);

                // Remove 'active' class from all size options
                $('.size-option').removeClass('active');

                // Add 'active' class to the clicked size option
                $selectedOption.addClass('active');

                // Get the price and image from the data attributes of the selected size option
                const newPrice = parseFloat($selectedOption.data('price')).toFixed(2);
                const newQty = $selectedOption.data('qty');
                const newImageFilename = $selectedOption.data('image');

                // Get the current image URL
                const currentImageUrl = productImage.attr('src');

                // Create a new URL object with the current image URL
                const currentUrl = new URL(currentImageUrl);

                // Get the base URL
                const baseUrl = currentUrl.origin;

                // Construct the new image URL
                const newImageUrl = baseUrl + '/' + newImageFilename;

                // Update the product price and image
                productPriceElement.text('$ ' + newPrice);
                $('#qty').attr('max', newQty);
                productImage.attr('src', newImageUrl);
                productImage.attr('data-zoom-image', newImageUrl);
            });
        });


    </script>



    <script>
        $(document).ready(function() {
            const qtyInput = $('#qty');
            const maxLimitMsg = $('#maxLimitMsg');
            const variations = <?php echo json_encode($product->getPrices); ?>;
            let maxQuantity = 0;

            // Find the maximum quantity available in the variations
            variations.forEach(function(variation) {
                if (variation.qty > maxQuantity) {
                    maxQuantity = variation.qty;
                }
            });

            // Set the initial max quantity
            qtyInput.attr('max', maxQuantity);

            qtyInput.on('input', function(event) {
                const currentValue = parseInt(qtyInput.val());
                if (currentValue > maxQuantity) {
                    qtyInput.val(maxQuantity);
                    $('#maxLimitMsg').css('display', 'block');
                } else {
                    $('#maxLimitMsg').css('display', 'none');
                }
            });
        });
    </script>

{{-- Below is add to cart start both are working    --}}

    <script>
        $(document).ready(function() {
            const sizeOptions = $('.size-option');
            const qtyInput = $('#qty');
            const maxLimitMsg = $('#maxLimitMsg');
            let selectedQty = sizeOptions.first().data('qty');

            // Update selectedQty when a size is clicked
            sizeOptions.on('click', function(event) {
                event.preventDefault();
                const $selectedOption = $(this);
                selectedQty = $selectedOption.data('qty');

                // Set the new max quantity
                qtyInput.attr('max', selectedQty);

                // Toggle active class for size options
                sizeOptions.removeClass('active');
                $selectedOption.addClass('active');
            });

            // Add to Cart button click event
            $('.btn-cart').on('click', function(event) {
                event.preventDefault();

                // Get the selected quantity
                const quantity = parseInt(qtyInput.val());

                // Check if the selected quantity is within the available quantity limit
                if (quantity <= selectedQty) {
                    // Add the product to the cart with the selected quantity
                    // Replace the code below with your actual logic to add the product to the cart
                    console.log('Product added to cart:');
                    console.log('Quantity:', quantity);
                } else {
                    // Display the max limit message
                    maxLimitMsg.show();
                }
            });
        });

    </script>

    {{-- Below is add to cart start both are working    --}}

    <!-- Add SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            const addToCartButton = $('.btn-cart');
            const sizeOptions = $('.size-option');
            const qtyInput = $('#qty');
            const maxLimitMsg = $('#maxLimitMsg');
            const loader = $('#loader');
            let selectedSize = sizeOptions.first().data('size');
            let selectedPrice = sizeOptions.first().data('price');
            let selectedQty = sizeOptions.first().data('qty');
            let variation_product_id = sizeOptions.first().data('variation_product_id');
            let msp = sizeOptions.first().data('msp');

            // Update selectedSize, selectedPrice, and selectedQty when a size is clicked
            sizeOptions.on('click', function(event) {
                event.preventDefault();
                const $selectedOption = $(this);
                selectedSize = $selectedOption.data('size');
                selectedPrice = $selectedOption.data('price');
                selectedQty = $selectedOption.data('qty');
                variation_product_id = $selectedOption.data('variation_product_id');
                msp = $selectedOption.data('msp');

                // Set the new max quantity
                qtyInput.attr('max', selectedQty);

                // Toggle active class for size options
                sizeOptions.removeClass('active');
                $selectedOption.addClass('active');
            });

            // Add to Cart button click event
            addToCartButton.on('click', function(event) {
                event.preventDefault();

                // Get the selected quantity
                const quantity = parseInt(qtyInput.val());

                // Check if the selected quantity is within the available quantity limit
                if (quantity <= selectedQty) {
                    // Show loader
                    loader.show();

                    // Save cart data to the database using AJAX
                    $.ajax({
                        url: '{{url('addToCart')}}',
                        method: 'POST',
                        data: {
                            size: selectedSize,
                            price: selectedPrice,
                            quantity: quantity,
                            subtotal: selectedPrice * quantity,
                            product_name: $('#product_name').val(),
                            product_id: $('#product_id').val(),
                            msp: msp,
                            variation_product_id: variation_product_id,
                            section_id: $('#section_id').val(),
                            brands_id: $('#brands_id').val(),
                            // Add other cart data fields as needed
                        },
                        success: function(response) {
                            // Hide loader
                            loader.hide();

                            // Handle success response
                            if (response.code === 300) {
                                // Product added to cart
                                Swal.fire({
                                    icon: 'success',
                                    title: response.status,
                                    showConfirmButton: false,
                                    timer: 1500
                                });

                                // Update cart count and total price in the dropdown
                                $('.cart-count').text(response.cartCount);
                                $('.cart-total-price').text(`$${response.cartSubtotal.toFixed(2)}`);
                            } else if (response.code === 301) {
                                // Product already in cart, quantity updated
                                Swal.fire({
                                    icon: 'info',
                                    title: response.status,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            // Hide loader
                            loader.hide();

                            // Handle error if needed
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            });
                        }
                    });

                } else {
                    // Display the max limit message
                    maxLimitMsg.show();
                }
            });
        });
    </script>






@stop

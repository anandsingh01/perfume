@extends('layouts.web')
<?php
session_start();
?>
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .input-group {
            padding: 0;
            justify-content: center;
        }
        .cart-bottom{
            display:block;
        }
        form {
            width: 100%;
        }
    </style>
@stop
@section('body')
    <?php
    $get_cart = get_cart();
    $get_count = json_decode($get_cart);
    $getAllCart = getCartProducts();
    ?>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Checkout <span></span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <form
                            action="{{ route('stripe.post') }}" method="post" class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="pk_test_51IC66sKDGzpYlWQ2IUExVCMJa897eu9P3tgccsi424ge01DGUF1BoKwZ6WeCAWZOvaydtZesy2wasJAfdnglXqVo00IiciQ3dH"
                            id="payment-form"
                        >
                            @csrf
                            <div class="row">
                                <div class="col-lg-9">
                                    <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                    <div class='form-row row'>
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Name on Card</label>
                                            <input class='form-control' size='4' name="name_on_card" type='text'>
                                        </div>
                                    </div>

                                    <div class='form-row row'>
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Card Number</label>
                                            <input autocomplete='off' name="card_no"  class='form-control card-number' size='20' type='text'>
                                        </div>
                                    </div>

                                    <div class='form-row row'>
                                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                                            <label class='control-label'>CVC</label>
                                            <input autocomplete='off' name="cvc"  class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Month</label>
                                            <input class='form-control card-expiry-month' name="exp_month"  placeholder='MM' size='2' type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Year</label>
                                            <input class='form-control card-expiry-year' name="exp_year"  placeholder='YYYY' size='4' type='text'>
                                        </div>
                                    </div>

                                    <div class='form-row row'>
                                        <div class='col-md-12 error errordiv form-group hide'>
                                            <div class='alert-danger alert'>Please correct the errors and try
                                                again.</div>
                                        </div>
                                    </div>
                                </div><!-- End .col-lg-9 -->

                                <aside class="col-lg-3">
                                    <div class="summary summary-cart">

                                        <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                        <?php
                                        $get_cart = get_cart();
                                        $get_count = json_decode($get_cart);
                                        $getAllCart = getCartProducts();
                                        ?>
                                        <table class="table table-summary">
                                            <tbody>
                                            @forelse($getAllCart as $key => $getAllCarts)
{{--                                                <tr>--}}
{{--                                                    <td><a href="{{url('products/'.$getAllCarts->getProducts->slug ?? '')}}">--}}
{{--                                                            {{$getAllCarts->getProducts->title ?? ''}}</a></td>--}}
{{--                                                    <td>--}}
{{--                                                    <span class="cart-product-info">--}}
{{--                                                <span class="cart-product-qty">{{$getAllCarts->cartqty}}</span>--}}
{{--                                                x ${{$getAllCarts->price}}--}}
{{--                                            </span><!--End .cart-product-info-->--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
                                                <input type="hidden" name="product_name[]" value="{{$getAllCarts->getProducts->title}}"/>
                                                <input type="hidden" name="product_id[]" value="{{$getAllCarts->getProducts->id}}"/>
                                                <input type="hidden" name="attribute_id[]" value="{{$getAllCarts->attribute_id}}"/>
                                                <input type="hidden" name="qty[]" value="{{$getAllCarts->cartqty}}"/>
                                                <input type="hidden" name="price[]" value="{{$getAllCarts->price}}"/>
                                                <input type="hidden" name="size[]" value="{{$getAllCarts->size}}"/>
                                            @empty
                                            @endforelse
                                            <tr class="summary-subtotal">
                                                <td>Subtotal:</td>
                                                <td>
                                                    @if(Session::has('discounted_total'))
                                                        <p class="final_amount">
                                                            <strike>
                                                                $   {{number_format($get_count->cartTotal,2) ?? '0'}}
                                                            </strike>
                                                        </p>

                                                        $  {{number_format(Session::get('discounted_total'),2) ?? '0'}}
                                                        <input type="hidden" name="final_amount" value="{{Session::get('discounted_total')}}"/>
                                                        <input type="hidden" name="coupon_code" value="{{Session::get('applied_coupon')}}"/>


                                                    @else
                                                        {{number_format($get_count->cartTotal,2) ?? '0'}}
                                                        <input type="hidden" name="final_amount" value="{{$get_count->cartTotal}}"/>

                                                    @endif
                                                </td>
                                            </tr><!-- End .summary-subtotal -->

                                            @if(Session::has('discounted_total'))
                                                <tr class="summary-subtotal">
                                                    <td>Coupon Applied:</td>
                                                    <td>{{Session::get('applied_coupon')}}</td>
                                                </tr><!-- End .summary-subtotal -->
                                            @endif
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>
                                                    @if(Session::has('discounted_total'))
                                                        $  {{number_format(Session::get('discounted_total'),2) ?? '0'}}
                                                    @else
                                                        {{number_format($get_count->cartTotal,2) ?? '0'}}
                                                    @endif
                                                </td>
                                            </tr><!-- End .summary-total -->
                                            </tbody>
                                        </table><!-- End .table table-summary -->

                                        <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">PAY</button>
                                    </div><!-- End .summary -->
                                </aside><!-- End .col-lg-3 -->
                            </div><!-- End .row -->
                        </form>
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main>
@stop
@section('js')

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script>
        $(document).ready(function() {
            $('.errordiv').addClass('hide');
        });
    </script>

    <script type="text/javascript">
        $(function() {

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
@stop

@extends('layouts.web')
<?php
session_start();
?>
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css"></script>
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
        div#tab-content-7 {
            width: 75%;
        }
        .table th, .table thead th, .table td {
            border-top: none;
            border-bottom: 0.1rem solid #ebebeb;
            text-align: center;
            padding: 15px;
        }
        .table td {
            vertical-align: middle;
            width: 100px;
        }
        .page-content, .page-content p {
            font-size: 18px;
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

        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Profile</a></li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="col-md-12 text-right">
                    <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                       class="btn btn-danger pt-2 pb-2 pull-right text-right" title="Sign Out">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <h3 class="text-center">Welcome {{Auth::user()->name}}</h3>
                <div class="row">
                    <div class="col-md-12">
                        <h5><strong>Order ID: </strong> #{{$orders->order_id}}</h5>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <address>
                                    <strong>{{$orders->first_name}} {{$orders->last_name}}</strong><br>
                                    {{$orders->address_1}}, {{$orders->address_2}},{{$orders->city}}, {{$orders->state}}, {{$orders->pincode}},  </span>
                                    <br><abbr title="Phone"> {{$orders->phone}}</abbr> <br>
                                    {{$orders->email}}

                                </address>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <p class="mb-0"><strong>Order Date: </strong> {{$orders->updated_at}}</p>
                                <p class="mb-0"><strong>Order Status: </strong>  @if($orders->status == 0)
                                        <span class="badge badge-warning">New </span>
                                @endif


                                @if($orders->status == 1)
                                    <p class="badge badge-success">Paid </p>
                                @endif


                                @if($orders->status == 2)
                                    <span class="badge badge-danger">Cancelled </span>
                                    @endif
                                    </p>

                                    <p class="mb-0"><strong>Payment Id: </strong> {{$orders->payment_intent_id}}</p>
                                    <p class="mb-0"><strong>Payment Status: </strong> {{$orders->transaction_status}}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover c_table theme-color">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th width="60px">Item</th>
                                        <th></th>
                                        <th class="hidden-sm-down">Size</th>
                                        <th>Quantity</th>
                                        <th class="hidden-sm-down">Unit Cost</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($orders->get_order_products as $key =>  $products)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td><img src="{{asset($products->sizeAttributes[0]->image)}}"
                                                     alt="Product img"></td>
                                            <td>{{$products->title}}</td>
                                            <td class="hidden-sm-down">{{$products->pivot->size}}</td>
                                            <td>{{$products->pivot->quantity}}</td>
                                            <td class="hidden-sm-down">{{$products->pivot->price}}</td>
                                            <td>{{$products->pivot->price * $products->pivot->quantity }}</td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Note</h5>
                                {{--                                    <p>Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.</p>--}}
                            </div>
                            <div class="col-md-6 text-right">
                                <ul class="list-unstyled">
                                    <li><strong>Sub-Total:-</strong>$ {{number_format($orders->final_amount,2)}}</li>
                                    {{--                                        <li class="text-danger"><strong>Discout:-</strong> 12.9%</li>--}}
                                    {{--                                        <li><strong>VAT:-</strong> 12.9%</li>--}}
                                </ul>
                                <h3 class="mb-0 text-success">$ {{number_format($orders->final_amount,2)}}</h3>
                                {{--                                        <a href="javascript:void(0);" class="btn btn-info"><i class="zmdi zmdi-print"></i></a>--}}
                                {{--                                        <a href="javascript:void(0);" class="btn btn-primary">Submit</a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End .page-content -->
    </main>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('#register-confirm-password').on('input', function() {
                var password = $('#register-password').val();
                var confirmPassword = $(this).val();

                if (password === confirmPassword) {
                    $('#password-match-message').text('Passwords match').css('color', 'green');
                } else {
                    $('#password-match-message').text('Passwords do not match').css('color', 'red');
                }
            });

            $('form').on('submit', function(event) {
                var password = $('#register-password').val();
                var confirmPassword = $('#register-confirm-password').val();

                if (password !== confirmPassword) {
                    event.preventDefault();
                    $('#password-match-message').text('Passwords do not match').css('color', 'red');
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
    <script>
        $(document).ready(function() {
            //Only needed for the filename of export files.
            //Normally set in the title tag of your page.
            document.title='Simple DataTable';
            // DataTable initialisation
            $('#example').DataTable(
                {
                    "dom": '<"dt-buttons"Bf><"clear">lirtp',
                    "paging": true,
                    "autoWidth": true,
                    "buttons": [
                        'colvis',
                        'copyHtml5',
                        'csvHtml5',
                        'excelHtml5',
                        'pdfHtml5',
                        'print'
                    ]
                }
            );
        });
    </script>

@stop

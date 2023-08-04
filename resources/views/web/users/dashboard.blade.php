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
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="tabs-vertical">
                            <ul class="nav nav-tabs nav-tabs-bg flex-column" id="tabs-7" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link" id="tab-25-tab" data-toggle="tab" href="#tab-25" role="tab" aria-controls="tab-25" aria-selected="false">My Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-26-tab" data-toggle="tab" href="#tab-26" role="tab" aria-controls="tab-26" aria-selected="false">My Orders</a>
                                </li>
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" id="tab-27-tab" data-toggle="tab" href="#tab-27" role="tab" aria-controls="tab-27" aria-selected="false">Logout</a>--}}
{{--                                </li>--}}
                            </ul>
                            <div class="tab-content tab-content-border" id="tab-content-7">
                                <div class="tab-pane active" id="tab-25" role="tabpanel" aria-labelledby="tab-25-tab">
                                    @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif

                                    <form action="{{ url('update-profile') }}" method="post">

                                        @csrf

                                        <div class="form-group">
                                            <label for="register-name">Name  *</label>
                                            <input type="text" class="form-control" id="register-name"
                                                   name="name" value="{{Auth::user()->name}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email"
                                                   name="email" value="{{Auth::user()->email}}" required>
                                        </div>


                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password"
                                                   name="password" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="register-confirm-password">Confirm Password *</label>
                                            <input type="password" class="form-control" id="register-confirm-password" name="register-confirm-password" required>
                                            <span id="password-match-message"></span>
                                        </div>


                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>Update</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </div>
                                    </form>

                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="tab-26" role="tabpanel" aria-labelledby="tab-26-tab">

                                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Description</th>
                                            <th>Deadline</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td>30</td>
                                            <td>TV carton</td>
                                            <td>2019/02/08</td>
                                            <td>Offer</td>
                                            <td data-order="1369">€1.369,00</td>
                                        </tr>
                                        </tbody>
                                    </table>


                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="tab-27" role="tabpanel" aria-labelledby="tab-27-tab">
                                    <p>Perspiciatis quis nobis, adipisci quae aspernatur, nulla suscipit eum. Dolorum, earum. Consectetur pariatur repellat distinctio atque alias excepturi aspernatur nisi accusamus sed molestias ipsa numquam eius, iusto, aliquid, quis aut.</p>
                                </div><!-- .End .tab-pane -->

                            </div><!-- End .tab-content -->
                        </div><!-- End .tabs-vertical -->
                    </div>
                    <div class="col-md-1"></div>
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

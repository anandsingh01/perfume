@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('/assets/admin/')}}/assets/plugins/dropify/css/dropify.min.css">
    <link rel="stylesheet" href="{{asset('/assets/admin/')}}/assets/plugins/summernote/dist/summernote.css"/>
{{--    <link rel="stylesheet" href="{{asset('/assets/admin/')}}/assets/plugins/multi-select/css/multi-select.css">--}}
    <!-- Bootstrap Spinner Css -->
    <link rel="stylesheet" href="{{asset('/assets/admin/')}}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link rel="stylesheet" href="{{asset('/assets/admin/')}}/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">

    <link rel="stylesheet" href="{{asset('/assets/admin/')}}/assets/plugins/select2/select2.css" />
{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}
    <link rel="stylesheet" href="{{asset('/assets/admin/')}}/assets/plugins/summernote/dist/summernote.css"/>
    <link rel="stylesheet" href="{{asset('/assets/admin/')}}/assets/css/dropzone.css"/>
    <style>
        .select2-container .select2-choice{
            border:unset;
        }
        .bootstrap-tagsinput{
            border:1px solid #ddd !important;
            width:100%;
        }
        label{
            font-weight: 800;
        }

        .preview-images-zone {
            width: 100%;
            border: 1px solid #ddd;
            min-height: 100px;
            /* display: flex; */
            padding: 5px 5px 0px 5px;
            position: relative;
            overflow:auto;
        }
        .preview-images-zone > .preview-image:first-child {
            height: 100px;
            width: 100px;
            position: relative;
            margin-right: 5px;
        }
        .preview-images-zone > .preview-image {
            height: 90px;
            width: 90px;
            position: relative;
            margin-right: 5px;
            float: left;
            margin-bottom: 5px;
        }
        .preview-images-zone > .preview-image > .image-zone {
            width: 100%;
            height: 100%;
        }
        .preview-images-zone > .preview-image > .image-zone > img {
            width: 100%;
            height: 100%;
        }
        .preview-images-zone > .preview-image > .tools-edit-image {
            position: absolute;
            z-index: 100;
            color: #fff;
            bottom: 0;
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
            display: none;
        }
        .preview-images-zone > .preview-image > .image-cancel {
            font-size: 18px;
            position: absolute;
            top: 0;
            right: 0;
            font-weight: bold;
            margin-right: 10px;
            cursor: pointer;
            display: none;
            z-index: 100;
        }
        .preview-image:hover > .image-zone {
            cursor: move;
            opacity: .5;
        }
        .preview-image:hover > .tools-edit-image,
        .preview-image:hover > .image-cancel {
            display: block;
        }
        .ui-sortable-helper {
            width: 90px !important;
            height: 90px !important;
        }

        input#product-gallery {
            height: 200px;
        }
    </style>
@stop
@section('body')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>{{$page_heading}}</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="zmdi zmdi-home"></i> Admin </a></li>
                    <li class="breadcrumb-item active">{{$page_heading}}</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <form method="post" action="{{url('admin/save-products')}}" enctype="multipart/form-data">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Add</strong> Product</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mtb-10">
                                    <label class="control-label" for="password">Product Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Product Title"/>
                                </div>

                                <div class="col-lg-6 col-md-6 mtb-10 subparent_cat_divs">
                                    <label class="">Brands</label>
                                    <select name="brands_id" class="form-control show-tick ms select2 removeSpace" id="brands" data-placeholder="Select">
                                        <option>Please Select An Option </option>
                                        @if(!empty($brands))
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->category_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-6 mtb-10">
                                    <label class="control-label" for="Status">Section <br></label>
                                    <select name="section_id" class="form-control show-tick ms select2" id="section_id" data-placeholder="Select">
                                        <option>Select</option>
                                        @if(!empty($sections))
                                            @foreach($sections as $section)
                                                <option value="{{$section->id}}">{{$section->category_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="">Product Description</label>
                                    <textarea class="summernote" name="product_desc"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="">Product Acutal Price</label>
                                    <input type="number" class="form-control" name="product_actual_price" placeholder="Product Actual Price"/>
                                </div>

                                <div class="col-md-6">
                                    <label class="">Max Selling Price</label>
                                    <input type="number" class="form-control" name="product_max_selling_price" placeholder="Product Selling Price"/>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">

                                <div class="col-md-6">
                                    <label class="">Min Order</label>
                                    <input type="number" class="form-control" name="product_min_order" placeholder="Min Order"/>
                                </div>

                                <div class="col-md-6">
                                    <label class="">Max Order</label>
                                    <input type="number" class="form-control" name="product_max_order" placeholder="Max Order"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="body">
                            <div class="form-group mtb-10">
                                <label class="control-label " for="password">Product Photo</label>
                                <input type="file" id="dropify-event" data-default-file="" name="photo">
                                <span id="error-message" class="validation-error-label">File Should Not be above 2MB</span><br>
                            </div>
                            <div class="form-group mtb-10">
                                <label class="control-label " for="password">Img Alt</label>
                                <input type="text" name="img_alt" class="form-control" placeholder="Product Image Alt tag">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="body">
                            <div class="container">
                                <div class="form-group  mtb-10">
                                    <label class="control-label " for="password">Product Photo (Drag & Drop into the box)</label>

                                    <input type="file" id="product-gallery" name="productgallery[]" class="form-control" multiple>
                                </div>
                                <div class="preview-images-zone">

                                </div>
                            </div>
                            <div class="form-group mtb-10">
                                <label class="control-label " for="password">Img Alt</label>
                                <input type="text" name="gallery_img_alt" class="form-control" placeholder="Product image tag">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group mtb-10 ">
                                        <label class="control-label ">Is Featured ?</label>
                                        <select name="is_featured" id="is_featured">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-6">
                                        <label class="control-label ">Flash Sale ?</label>
                                        <select name="flash_sale" id="flash_sale" class="form-control">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    <div class="form-group mtb-10 flash_sale" id="is_flash_sale"  style="display: none;">
                                        <div class="col-lg-12 col-md-12 mtb-10">
                                            <label class="control-label" for="password">Flash Price</label>
                                            <input type="text" class="form-control" name="flash_price" placeholder="Enter Flash Price"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mtb-10">
                                            <label class="control-label" for="password">Flash Sale Start</label>
                                            <input type="date" class="form-control" name="flash_price_start_date" placeholder="Enter Start"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mtb-10">
                                            <label class="control-label" for="password">Flash Sale End</label>
                                            <input type="date" class="form-control" name="flash_price_end_date" placeholder="Enter End Date"/>
                                        </div>

                                        <div class="col-lg-12 col-md-12 mtb-10">
                                            <label class="control-label" for="password">Status</label>
                                            <select name="flash_product_status" class="form-control">
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <label class="control-label " for="password">Slug</label>
                                    <input type="text" name="slug" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">

                                <div class="col-md-12">
                                    <label class="">Product Short Description</label>
                                    <textarea name="product_short_desc" class="form-control" style="height:200px;"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mtb-10">
                                    <label class="control-label" for="password">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Product</strong> Additional Details</h2>
                        </div>
                        <div class="body">

                            <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" role="tab" id="headingThree_1">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseThree_1" aria-expanded="false"
                                               aria-controls="collapseThree_1"> Additional Details <span class="text-right">+</span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
                                        <div class="panel-body">
                                            <div class="row">

                                                <div class="col-lg-6 col-md-6 mtb-10">
                                                    <label class="control-label " for="password">Pay On Delivery </label>
                                                    <select class="form-control" name="additional_pay_on_delivery">
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <hr>

                                                <div class="col-lg-6 col-md-6 mtb-10">
                                                    <label class="control-label " for="password">Return Within :</label>
                                                    <select class="form-control" name="additional_return_within">
                                                        <option value="0">No Return</option>
                                                        <option value="1">3 Days</option>
                                                        <option value="2">7 Days</option>
                                                        <option value="3">10 Days</option>
                                                        <option value="4">15 Days</option>
                                                        <option value="5">20 Days</option>
                                                        <option value="6">30 Days</option>
                                                        <option value="7">30 Days</option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-6 col-md-6 mtb-10">
                                                    <label class="control-label " for="password"> Delivery Within Days:  </label>
                                                    <input type="number" name="addtional_delivery_within" class="form-control">
                                                </div>

                                                <div class="col-lg-6 col-md-6 mtb-10">
                                                    <label class="control-label " for="password"> Size & Fit  </label>
                                                    <textarea type="number" name="addtional_size_and_fit" class="form-control"></textarea>
                                                </div>

{{--                                                <div class="col-lg-6 col-md-6 mtb-10">--}}
{{--                                                    <label class="control-label " for="password"> Material & Care  </label>--}}
{{--                                                    <textarea type="number" name="addtional_material_care" class="form-control"></textarea>--}}
{{--                                                </div>--}}


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Product</strong> SEO</h2>
                        </div>
                        <div class="body">

                            <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" role="tab" id="headingThree_1">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseThree_1" aria-expanded="false"
                                               aria-controls="collapseThree_1"> SEO <span class="text-right">+</span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 mtb-10">
                                                    <label class="control-label " for="password">Meta Title </label>
                                                    <input type="text" name="meta_title" class="form-control">
                                                </div>
                                                <div class="col-lg-12 col-md-12 mtb-10">
                                                    <label class="control-label " for="password">Meta Description </label>
                                                    <input type="text" name="meta_desc" class="form-control">
                                                </div>

                                                <div class="col-lg-12 col-md-12 mtb-10">
                                                    <label class="control-label " for="password">Meta Keywords </label>
                                                    <input type="text" class="form-control tags_border" data-role="tagsinput" name="meta_keywords" value="Amsterdam,Sydney,Cairo">
                                                </div>

                                                <hr>

                                                <div class="col-lg-12 col-md-12 mtb-10">
                                                    <label class="control-label " for="password">FB OG Type </label>
                                                    <input type="text" name="fb_og_type" class="form-control">
                                                </div>

                                                <div class="col-lg-12 col-md-12 mtb-10">
                                                    <label class="control-label " for="password">FB OG URL </label>
                                                    <input type="text" name="fb_og_url" class="form-control">
                                                </div>

                                                <div class="col-lg-12 col-md-12 mtb-10">
                                                    <label class="control-label " for="password">FB OG Title </label>
                                                    <input type="text" name="fb_og_title" class="form-control">
                                                </div>

                                                <div class="col-lg-12 col-md-12 mtb-10">
                                                    <label class="control-label " for="password">FB OG Description </label>
                                                    <input type="text" name="fb_og_desc" class="form-control">
                                                </div>

                                                <div class="col-lg-12 col-md-12 mtb-10">
                                                    <label class="control-label " for="password">FB OG Image </label>
                                                    <input type="file" name="fb_og_image" class="form-control">
                                                </div>

                                                <hr>

                                                <div class="col-lg-12 col-md-12 mtb-10">
                                                    <label class="control-label " for="password">Twitter Type </label>
                                                    <input type="text" name="twitter_og_type" class="form-control">
                                                </div>

                                                <div class="col-lg-12 col-md-12 mtb-10">
                                                    <label class="control-label " for="password">Twitter OG URL </label>
                                                    <input type="text" name="twitter_og_url" class="form-control">
                                                </div>

                                                <div class="col-lg-12 col-md-12 mtb-10">
                                                    <label class="control-label " for="password">Twitter OG Title </label>
                                                    <input type="text" name="twitter_og_title" class="form-control">
                                                </div>

                                                <div class="col-lg-12 col-md-12 mtb-10">
                                                    <label class="control-label " for="password">Twitter OG Description </label>
                                                    <input type="text" name="twitter_og_desc" class="form-control">
                                                </div>

                                                <div class="col-lg-12 col-md-12 mtb-10">
                                                    <label class="control-label " for="password">Twitter OG Image </label>
                                                    <input type="file" name="twitter_og_img" class="form-control">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            @if (Auth::check())
                                <input type="hidden" name="userid" value="{{Auth::user()->id}}"/>
                            @endif
                            @csrf
                            <input type="submit" class="btn btn-raised btn-primary waves-effect" value="Save & Continue" />
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>
@endsection
@section('js')
    <script src="{{asset('/assets/admin/')}}/assets/plugins/dropify/js/dropify.min.js"></script>
    <script src="{{asset('/assets/admin/')}}/assets/js/pages/forms/dropify.js"></script>
    <script src="{{asset('/assets/admin/')}}/assets/plugins/summernote/dist/summernote.js"></script>

    <script src="{{asset('/assets/admin/')}}/assets/plugins/multi-select/js/jquery.multi-select.js"></script> <!-- Multi Select Plugin Js -->
    <script src="{{asset('/assets/admin/')}}/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script> <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{asset('/assets/admin/')}}/assets/plugins/select2/select2.min.js"></script> <!-- Select2 Js -->
    <script src="{{asset('/assets/admin/')}}/assets/js/pages/forms/advanced-form-elements.js"></script>


    <script>
        $('.section_id').change(function(){
            var section_id = $(this).val();
            $('.subparent_cat_div .select2-chosen').html('Please Select An Option');

            $.ajax({
                type:'get',
                url: '{{url("admin/getcategoriesBySectionOnProduct")}}',
                data: {section_id: section_id},
                beforeSend: function( xhr ) {
                    $(".parent_cat_div .spinner").addClass("fab-spinner fab-spin");
                    $('#parent_id').append('<option value="">Please Select</option>');

                },
                success:function(response){
                    $("#parent_id").empty();
                    $("#subparent_id").empty();

                    $('.parent_cat_div .select2-chosen').html('Please Select An Option');


                    $('#parent_id').append('<option value="">Please Select An Option</option>');

                    $.each(response, function(key, value) {
                        // console.log(value.title);

                        $('#parent_id').append('<option value="'+ value.id +'">'+ value.title +'</option>');

                        $('#parent_id').val(2).trigger('change.select2');
                    });

                }
                ,error:function(){
                    alert('Error');
                }
            });
        });

        $('#parent_id').change(function(){

            // alert('ad');
            var parent_id = $(this).val();
            // alert(parent_id);return false;
            $('.subparent_cat_div  .select2-chosen').html('Please Select An Option');

            // alert(parent_id); return false;
            $.ajax({
                type:'get',
                url: '{{url("admin/getSubcategoriesByCategoriesOnProduct")}}',
                data: {parent_id: parent_id},
                success:function(response){
                    console.log(response);

                    $("#subparent_id").empty();

                    // Without parent div of select2 , don't change
                    $('.subparent_cat_div #select2-chosen-2').html('Please Select An Option');

                    $.each(response, function(key, value) {
                        console.log(value.title);
                        $('#subparent_id').append('<option value="'+ value.id +'">'+ value.title +'</option>');
                    });
                }
                ,error:function(){
                    alert('Error');
                }
            });
        });
    </script>
@stop

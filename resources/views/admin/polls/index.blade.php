@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/admin')}}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css"/>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
@stop
@section('body')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/')}}"><i class="zmdi zmdi-home"></i> 24x7LiveIndia</a></li>
                    <li class="breadcrumb-item active">{{$page_heading}}</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Question</th>
                        <th>Vote Permission</th>
                        <th>Status</th>
                        <th>Date Added</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Question</th>
                        <th>Vote Permission</th>
                        <th>Status</th>
                        <th>Date Added</th>
                        <th>Options</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @if(!empty($polls))
                        @foreach($polls as $poll)
                            <tr>
                                <td>{{$poll->id}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-8">
                                            {{$poll->question}} <br>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($poll->vote_permission == 'all')
                                    <span class="badge badge-success">
                                        All Users Can Vote
                                    </span>
                                    @else
                                        <span class="badge badge-warning">
                                        Registered User can vote
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    @if($poll->status == 0)
                                    <span class="badge badge-success">
                                       Active
                                    </span>
                                    @else
                                        <span class="badge badge-warning">
                                       Inactive
                                    </span>
                                    @endif
                                </td>
                                <td>{{$poll->created_at}}</td>

                                <td>
                                    <a href="{{url('admin/edit-subcategories/'.$poll->id)}}" class="btn btn-success btn-sm btn-icon">
                                        <i class="zmdi zmdi-edit"></i></a>
                                    <button class="btn btn-sm btn-danger btn-icon" onclick="deleteConfirmation({{$poll->id}})">
                                        <i class="zmdi zmdi-delete"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h3>No Data Found</h3>
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{asset('assets/admin')}}/assets/bundles/datatablescripts.bundle.js"></script>
    <script src="{{asset('assets/admin')}}/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="{{asset('assets/admin')}}/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('assets/admin')}}/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="{{asset('assets/admin')}}/assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="{{asset('assets/admin')}}/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="{{asset('assets/admin')}}/assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>

    <script src="{{asset('assets/admin')}}assets/plugins/select2/select2.min.js"></script> <!-- Select2 Js -->

    {{--    <script src="{{asset('assets/admin')}}/assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->--}}
    <script src="{{asset('assets/admin')}}/assets/js/pages/tables/jquery-datatable.js"></script>

    <script>
        function deleteConfirmation(id) {
            swal({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function (e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'get',
                        url: "{{url('admin/delete/polls')}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {

                            if (results.success === true) {
                                swal("Done!", results.message, "success");
                                location.reload();
                            } else {
                                swal("Error!", results.message, "error");
                                location.reload();
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }
    </script>

@stop

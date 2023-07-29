<?php $getCommonSetting = getCommonSetting();?>
<div class="navbar-brand">
    <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
    <a href=""><img src="{{asset(''.$getCommonSetting->logo_header)}}" alt="{{$getCommonSetting->site_title}}"></a>
</div>
<div class="menu">
    <ul class="list">

        <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                <i class="zmdi zmdi-apps"></i><span>Add Banner</span></a>
            <ul class="ml-menu">
                <li><a href="{{url('admin/all-banner')}}"><span>All Banner</span></a></li>
                <li><a href="{{url('admin/add-banner')}}"><span>Add Banner</span></a></li>
            </ul>
        </li>


        <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                <i class="zmdi zmdi-apps"></i><span>Category</span></a>
            <ul class="ml-menu">
                <li><a href="{{url('admin/categories?type=product')}}"><span> Categories</span></a></li>
                <li><a href="{{url('admin/categories?type=brands')}}"><span> Brands</span></a></li>
            </ul>
        </li>

{{--        <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-apps"></i>--}}
{{--                <span>About Us</span></a>--}}
{{--            <ul class="ml-menu">--}}
{{--                <li><a href="{{url('admin/who-we-are')}}"><span>Who we are</span></a></li>--}}
{{--                <li><a href="{{url('admin/our-mission')}}"><span>Our Mission, Vision</span></a></li>--}}
{{--                <li><a href="{{url('admin/core-compentancy')}}"><span>Core compentancy</span></a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}

        <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                <i class="zmdi zmdi-apps"></i>
                <span>Offers & Discount</span></a>
            <ul class="ml-menu">
                <li><a href="{{url('admin/offers')}}"><span>All Offers</span></a></li>
            </ul>
        </li>

{{--        <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">--}}
{{--                <i class="zmdi zmdi-apps"></i>--}}
{{--                <span>Social Impacts</span></a>--}}
{{--            <ul class="ml-menu">--}}
{{--                <li><a href="{{url('admin/social-impacts?type=csr')}}"><span>CSR</span></a></li>--}}
{{--                <li><a href="{{url('admin/social-impacts?type=sab-csr')}}"><span>SAB CSR Policy</span></a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}



        <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                <i class="zmdi zmdi-apps"></i><span>Blog</span></a>
            <ul class="ml-menu">
                <li><a href="{{url('admin/add-posts?type=article')}}" class=" waves-effect waves-block"><span>Add Posts</span></a></li>
                <li><a href="{{url('admin/all-post?type=all-posts')}}" class=" waves-effect waves-block"><span>Posts</span></a></li>

            </ul>
        </li>

{{--        --}}{{--    Previously Projects Menu    --}}
{{--        <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">--}}
{{--                <i class="zmdi zmdi-apps"></i><span>Metals</span></a>--}}
{{--            <ul class="ml-menu">--}}
{{--                <li><a href="{{url('admin/all-metals')}}"><span>All Metals</span></a></li>--}}
{{--                <li><a href="{{url('admin/add-metals')}}"><span>Add Metals</span></a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        --}}{{--        <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">--}}
{{--        --}}{{--                <i class="zmdi zmdi-apps"></i><span>Projects Details</span></a>--}}
{{--        --}}{{--            <ul class="ml-menu">--}}
{{--        --}}{{--                <li><a href="{{url('admin/all-projects-details')}}"><span>All Projects details</span></a></li>--}}
{{--        --}}{{--                <li><a href="{{url('admin/add-project-details')}}"><span>Add Projects details</span></a></li>--}}
{{--        --}}{{--            </ul>--}}
{{--        --}}{{--        </li>--}}
{{--        <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-apps"></i><span>All Collaborations</span></a>--}}
{{--            <ul class="ml-menu">--}}
{{--                <li><a href="{{url('admin/all-collaborations?type=collaboration')}}"><span>All collaborations</span></a></li>--}}
{{--                <li><a href="{{url('admin/add-collaborations?type=collaboration')}}"><span>Add collaborations</span></a></li>--}}
{{--                <li><a href="{{url('admin/all-collaborations?type=certificate')}}"><span>All Certificate</span></a></li>--}}
{{--                <li><a href="{{url('admin/add-collaborations?type=certificate')}}"><span>Add Certificate</span></a></li>--}}

{{--            </ul>--}}
{{--        </li>--}}
{{--        <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-apps"></i><span>Our Team</span></a>--}}
{{--            <ul class="ml-menu">--}}
{{--                --}}{{--                <li><a href="{{url('admin/founders-note')}}"><span>Founder's Note</span></a></li>--}}
{{--                <li><a href="{{url('admin/our-team')}}"><span>Our Team</span></a></li>--}}
{{--                <li><a href="{{url('admin/our-role')}}"><span>Role</span></a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}

        {{--        <li><a href="{{url('admin/support-us')}}" class=" waves-effect waves-block"><i class="zmdi zmdi-book-image"></i><span>Support Us</span></a></li>--}}
        <li><a href="{{url('admin/common-settings')}}" class=" waves-effect waves-block"><i class="zmdi zmdi-book-image"></i><span>Common Settings</span></a></li>

    </ul>
</div>

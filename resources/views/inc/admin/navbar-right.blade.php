<ul class="navbar-nav">
    <li>

{{--        <div class="" aria-labelledby="">--}}
{{--            <a class="nav-link mega-menu" href="{{ route('logout') }}"--}}
{{--               onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                --}}{{--            {{ __('Logout') }}--}}
{{--                <i class="zmdi zmdi-power"></i>--}}
{{--            </a>--}}

{{--            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                @csrf--}}
{{--            </form>--}}
{{--        </div>--}}

  <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
     class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i>

  </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>

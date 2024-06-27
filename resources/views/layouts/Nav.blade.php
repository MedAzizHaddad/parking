<div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Parkini !</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_pic">
            <img src="{{ asset('images/img.jpg') }}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
            <span>Welcome,</span>
            <h2>@if(Auth::check())
                    {{ Auth::user()->name }}
                    {{--                            <p>Your email is: {{ Auth::user()->email }}</p>--}}
                @endif</h2>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            @auth
                @if(Auth::user()->role === 'user')
                    <ul class="nav side-menu">
                        <li><a href="{{ route('reservations.user') }}"><i class="fa fa-car"></i> Réserver </a></li>
                    </ul>

                    <ul class="nav side-menu">
                        <li><a  href="{{ route('profile.edit') }}" target="_blank"><i class="fa fa-user"></i> Profile </a></li>
                    </ul>
                @endif

                @if(Auth::user()->role === 'admin')
                    <ul class="nav side-menu">
                        <li><a href="{{ route('parkings.index') }}"><i class="fa fa-plus-square"></i> Ajouter espace parking </a></li>
                    </ul>

                    <ul class="nav side-menu">
                        <li><a href="{{ route('reservations.admin') }}"><i class="fa fa-list"></i> List reservations </a></li>
                    </ul>

                    <ul class="nav side-menu">
                        <li><a href="{{ route('users') }}"><i class="fa fa-user"></i> List utilisateurs </a></li>
                    </ul>
                @endif
            @endauth
        </div>
    </div>
    <!-- /menu footer buttons -->
</div>

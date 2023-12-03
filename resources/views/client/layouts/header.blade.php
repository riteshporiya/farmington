<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar mb-0 pb-0">
    <a href="{{ url('/') }}" class="navbar-brand sidebar-gone-hide">
        <img src="{{ asset('front/img/core-img/Farmington.png') }}" style="height: 50px; width: 250px;" class="navbar-brand-full"/>&nbsp;&nbsp;
    </a>
    <div class="navbar-nav">
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    </div>
    <ul class="navbar-nav navbar-right ml-auto">
        @if(\Illuminate\Support\Facades\Auth::user())
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"
                   class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="{{ getLoggedInUser()->avatar }}"
                         class="rounded-circle mr-1 user-thumbnail">
                    <div class="d-sm-none d-lg-inline-block">
                        Hi, {{\Illuminate\Support\Facades\Auth::user()->first_name}}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-title">
                        {{ __('messages.admin_dashboard.welcome') }}
                        , {{\Illuminate\Support\Facades\Auth::user()->full_name}}</div>
                    <a class="dropdown-item has-icon editProfileModal" href="#" data-id="{{ getLoggedInUserId() }}">
                        <i class="fa fa-user"></i>{{ __('messages.admin_dashboard.edit_profile') }}</a>
                    <a class="dropdown-item has-icon" href="{{ url('/') }}">
                        <i class="fa fa-home"></i>{{ __('messages.admin_dashboard.go_to_homepage') }}</a>
                    <a class="dropdown-item has-icon changePasswordModal" href="#"
                       data-id="{{ getLoggedInUserId() }}"><i
                                class="fa fa-lock"> </i>{{ __('messages.user.change_password') }}
                    </a>
                    <a class="dropdown-item has-icon changeLanguageModal" href="#"
                       data-id="{{ getLoggedInUserId() }}"><i
                                class="fa fa-language"> </i>{{ __('messages.admin_dashboard.change_language') }}
                    </a>
                    <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                       onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('messages.admin_dashboard.logout') }}
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        @else
            <li class="dropdown"><a href="#" data-toggle="dropdown"
                                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    {{--                <img alt="image" src="#" class="rounded-circle mr-1">--}}
                    <div class="d-sm-none d-lg-inline-block">{{ __('messages.common.hello') }}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-title">{{ __('messages.common.login') }}
                        / {{ __('messages.common.register') }}</div>
                    <a href="{{ route('login') }}" class="dropdown-item has-icon">
                        <i class="fas fa-sign-in-alt"></i> {{ __('messages.common.login') }}
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('register') }}" class="dropdown-item has-icon">
                        <i class="fas fa-user-plus"></i> {{ __('messages.common.register') }}
                    </a>
                </div>
            </li>
        @endif
    </ul>
</nav>
<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('users/dashboard*') ? 'active' : ''}}">
                <a href="{{ route('users.home') }}" class="nav-link"><i
                            class="fab fa-dashcube"></i><span>{{ __('messages.dashboard') }}</span></a>
            </li>
            <li class="nav-item {{ Request::is('users/blogs*') ? 'active' : ''}}">
                <a href="{{ route('user.blogs.index') }}" class="nav-link"><i
                            class="fas fa-blog"></i><span>{{ __('messages.blogs') }}</span></a>
            </li>
        </ul>
    </div>
</nav>

<form class="form-inline mr-auto" action="#">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
</form>
<ul class="navbar-nav navbar-right">

    @if(\Illuminate\Support\Facades\Auth::user())
        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown"
               class="nav-link notification-toggle nav-link-lg {{ count(getNotification(\App\Models\Notification::ADMIN)) > 0 ? 'beep' : '' }}"
               aria-expanded="false">
                <i class="far fa-bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">{{ __('messages.notifications') }}
                    <div class="float-right">
                        
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons" tabindex="2"
                     style="overflow: hidden; outline: none;">
                    @if(count(getNotification(\App\Models\Notification::ADMIN)) > 0)
                        @foreach(getNotification(\App\Models\Notification::ADMIN) as $notification)
                            <a href="#" data-id="{{ $notification->id }}" class="dropdown-item dropdown-item-unread readNotification" id="readNotification">
                                <div class="dropdown-item-icon bg-primary text-white">
                                    <i class="{{ getNotificationIcon($notification->type) }}"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    {{ $notification->title }}
                                    <div class="time text-primary">{{ $notification->created_at->diffForHumans() }}</div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="empty-state" data-height="250" style="height: 400px;">
                            <div class="empty-state-icon">
                                <i class="fas fa-question"></i>
                            </div>
                            <h2>{{ __('messages.we_could_find_any_notification') }}</h2>
                        </div>
                    @endif
                    <div class="empty-state d-none" data-height="250" style="height: 400px;">
                        <div class="empty-state-icon">
                            <i class="fas fa-question"></i>
                        </div>
                        <h2>{{ __('messages.we_could_find_any_notification') }}</h2>
                    </div>
                </div>
                <div id="ascrail2001" class="nicescroll-rails nicescroll-rails-vr"
                     style="width: 9px; z-index: 1000; cursor: default; position: absolute; top: 58px; left: 341px; height: 350px; opacity: 0.3; display: none;">
                    <div class="nicescroll-cursors"
                         style="position: relative; top: 0px; float: right; width: 7px; height: 306px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;"></div>
                </div>
                <div id="ascrail2001-hr" class="nicescroll-rails nicescroll-rails-hr"
                     style="height: 9px; z-index: 1000; top: 399px; left: 0px; position: absolute; cursor: default; display: none; width: 341px; opacity: 0.3;">
                    <div class="nicescroll-cursors"
                         style="position: absolute; top: 0px; height: 7px; width: 350px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px; left: 0px;"></div>
                </div>
            </div>
        </li>
        <li class="dropdown">
            <a href="#" data-toggle="dropdown"
               class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ getLoggedInUser()->avatar }}"
                     class="rounded-circle mr-1 thumbnail-rounded user-thumbnail ">
                <div class="d-sm-none d-lg-inline-block">
                    Hi, {{\Illuminate\Support\Facades\Auth::user()->first_name}}</div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">
                    {{ __('messages.admin_dashboard.welcome') }}, {{\Illuminate\Support\Facades\Auth::user()->full_name}}</div>
                <a class="dropdown-item has-icon editProfileModal" href="#" data-id="{{ getLoggedInUserId() }}">
                    <i class="fa fa-user"></i>{{ __('messages.admin_dashboard.edit_profile') }}</a>
                <a class="dropdown-item has-icon changePasswordModal" href="#" data-id="{{ getLoggedInUserId() }}"><i
                            class="fa fa-lock"> </i>{{ __('messages.admin_dashboard.change_password') }}</a>
                <a class="dropdown-item has-icon changeLanguageModal" href="#" data-id="{{ getLoggedInUserId() }}"><i
                            class="fa fa-language"> </i>{{ __('messages.admin_dashboard.change_language') }}</a>
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

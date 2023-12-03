@if((Auth::user()->user_type == \App\Models\User::ADMIN))
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img class="navbar-brand-full app-header-logo" src="{{ asset('front/img/core-img/Farmington.png') }}" width="65" alt="Farmington Logo" style="height: 50px; width: 250px;">
            <a href="{{ url('/') }}"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}" class="small-sidebar-text">
                <img class="navbar-brand-full" src="{{ asset('front/img/core-img/Farmington.png') }}" width="45px" alt=""/>
            </a>
        </div>
        <ul class="sidebar-menu">
            @include('layouts.menu')
        </ul>
    </aside>
@endif

<li class="side-menus {{ Request::is('admin/dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ Auth::user()->user_type == \App\Models\User::ADMIN ? route('admin.home') : route('home') }}">
        <i class=" fa fa-tachometer-alt"></i><span>{{ __('messages.dashboard') }}</span>
    </a>
</li>
<li class="side-menus {{ Request::is('admin/users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users"></i><span>{{ __('messages.users') }}</span></a>
</li>
<li class="side-menus {{ Request::is('admin/schemes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('scheme.index') }}"><i class="fas fa-rainbow"></i><span>{{ __('messages.schemes') }}</span></a>
</li>
<li class="nav-item dropdown side-menus">
    <a class="nav-link has-dropdown" href="#"><i class="fas fa-tree"></i>
        <span>{{ __('messages.plants') }}</span>
    </a>
    <ul class="dropdown-menu side-menus">
        <li class="side-menus {{ Request::is('admin/plant-types*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('plants.types.index') }}">
                <i class="fas fa-sitemap"></i>
                <span>{{ __('messages.types') }}</span>
            </a>
        </li>
        <li class="side-menus {{ Request::is('admin/plant-uses*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('plants.uses.index') }}">
                <i class="fas fa-house-user"></i>
                <span>{{ __('messages.plant_by_uses') }}</span>
            </a>
        </li>
        <li class="side-menus {{ Request::is('admin/plants*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('plants.index') }}">
                <i class="fas fa-tree"></i>
                <span>{{ __('messages.plants') }}</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item dropdown side-menus">
    <a class="nav-link has-dropdown" href="#"><i class="fas fa-seedling"></i>
        <span>{{ __('messages.bulbs_seeds') }}</span>
    </a>
    <ul class="dropdown-menu side-menus">
        <li class="side-menus {{ Request::is('admin/seed-types*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('seeds.types.index') }}">
                <i class="fas fa-holly-berry"></i>
                <span>{{ __('messages.seed_type') }}</span>
            </a>
        </li>
        <li class="side-menus {{ Request::is('admin/seeds*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('seeds.index') }}">
                <i class="fas fa-seedling"></i>
                <span>{{ __('messages.seeds') }}</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item dropdown side-menus">
    <a class="nav-link has-dropdown" href="#"><i class="fas fa-mortar-pestle"></i>
        <span>{{ __('messages.garden_essentials') }}</span>
    </a>
    <ul class="dropdown-menu side-menus">
        <li class="side-menus {{ Request::is('admin/garden-types*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('gardens.types.index') }}">
                <i class="fas fa-spa"></i>
                <span>{{ __('messages.garden_type') }}</span>
            </a>
        </li>
        <li class="side-menus {{ Request::is('admin/gardens*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('gardens.index') }}">
                <i class="fas fa-mortar-pestle"></i>
                <span>{{ __('messages.garden_essentials') }}</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item dropdown side-menus">
    <a class="nav-link has-dropdown" href="#"><i class="fa fa-cog"></i>
        <span>{{ __('messages.cms') }}</span>
    </a>
    <ul class="dropdown-menu side-menus">
        <li class="side-menus {{ Request::is('admin/blogs*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('blogs.index') }}">
                <i class="fas fa-blog"></i>
                <span>{{ __('messages.blogs') }}</span></a>
        </li>
        <li class="side-menus {{ Request::is('admin/testimonials*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('testimonial.index') }}">
                <i class="fas fa-sticky-note"></i>
                <span>{{ __('messages.testimonials') }}</span>
            </a>
        </li>
        <li class="side-menus {{ Request::is('admin/inquires*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('inquires.index') }}">
                <i class="fab fa-linkedin"></i>
                <span>{{ __('messages.inquires') }}</span>
            </a>
        </li>
    </ul>
</li>


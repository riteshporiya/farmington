<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- ***** Top Header Area ***** -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="top-header-content d-flex align-items-center justify-content-between">
                        <!-- Top Header Content -->
                        <div class="top-header-meta">
                            <a href="mailto:farmington@gmail.com" data-toggle="tooltip" data-placement="bottom" title="farmington@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: farmington@gmail.com</span></a>
                            <a href="tel:+91-9874563258" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: +91-9874563258</span></a>
                        </div>

                        <!-- Top Header Content -->
                        <div class="top-header-meta d-flex">
{{--                            <!-- Language Dropdown -->--}}
{{--                            <div class="language-dropdown">--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button class="btn btn-secondary dropdown-toggle mr-30" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language</button>--}}
{{--                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                        <a class="dropdown-item" href="#">USA</a>--}}
{{--                                        <a class="dropdown-item" href="#">UK</a>--}}
{{--                                        <a class="dropdown-item" href="#">Bangla</a>--}}
{{--                                        <a class="dropdown-item" href="#">Hindi</a>--}}
{{--                                        <a class="dropdown-item" href="#">Spanish</a>--}}
{{--                                        <a class="dropdown-item" href="#">Latin</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!-- Login -->
                            <div class="login">
                                <a href="{{ route('users.login') }}"><i class="fa fa-user" aria-hidden="true"></i> <span>Login</span></a>
                            </div>
                            <!-- Cart -->
                            <div class="cart">
                                <a href="{{ route('users.register') }}"><i class="fa fa-user" aria-hidden="true"></i> <span>Register</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Navbar Area ***** -->
    <div class="alazea-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="alazeaNav">

                    <!-- Nav Brand -->
                    <a href="{{ url('/') }}" class="nav-brand"><img src="{{ asset('front/img/core-img/Farmington.png') }}" style="height: 50px;" alt="logo"></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Navbar Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li><a href="#">Plants</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ route('plant.type.show') }}">Plant Types</a>
                                            <ul class="dropdown">
                                                @foreach(getPlantTypes() as $key => $value)
                                                    <li><a href="{{ route('plant.type.details', $key) }}">{{ $value }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('plant.use.show') }}">Plant Uses</a>
                                            <ul class="dropdown">
                                                @foreach(getPlantUse() as $key => $value)
                                                    <li><a href="{{ route('plant.use.details', $key) }}">{{ $value }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">Bulbs&Seeds</a>
                                    <ul class="dropdown">
                                        @foreach(getSeeds() as $key => $value)
                                            <li><a href="{{ route('seed.type.details', $key) }}">{{ $value }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="#">Garden Essentials</a>
                                    <ul class="dropdown">
                                        @foreach(getGarden() as $key => $value)
                                            <li><a href="{{ route('garden.type.details', $key) }}">{{ $value }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                        <!-- Navbar End -->
                    </div>
                </nav>

                <!-- Search Form -->
                <div class="search-form">
                    <form action="#" method="get">
                        <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
                        <button type="submit" class="d-none"></button>
                    </form>
                    <!-- Close Icon -->
                    <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from technext.github.io/alazea/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 Apr 2021 16:01:55 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@yield('title') | {{config('app.name')}}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('front/img/core-img/favicon.ico') }} ">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('front/style.css') }}">
    
    @yield('page_css')
    @yield('css')
</head>

<body>
<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="preloader-circle"></div>
    <div class="preloader-img">
        <img src="{{ asset('front/img/core-img/leaf.png') }}" alt="">
    </div>
</div>
@include('front.layouts.header')

<!-- Main Content Start -->
@yield('content')
<!-- Main Content End -->

@include('front.layouts.footer')

<!-- ##### All Javascript Files ##### -->
<!-- jQuery-2.2.4 js -->
<script src="{{ asset('front/js/jquery/jquery-2.2.4.min.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('front/js/bootstrap/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('front/js/bootstrap/bootstrap.min.js') }}"></script>
<!-- All Plugins js -->
<script src="{{ asset('front/js/plugins/plugins.js') }}"></script>
<!-- Active js -->
<script src="{{ asset('front/js/active.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.alert').delay(5000).slideUp(300);
    });
</script>
@yield('page_scripts')
@yield('scripts')
</body>


<!-- Mirrored from technext.github.io/alazea/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 Apr 2021 16:03:45 GMT -->
</html>

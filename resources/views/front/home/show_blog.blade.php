@extends('front.layouts.app')
@section('title')
    Blog Details
@endsection
@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('front/img/bg-img/24.jpg') }});">
            <h2>Blog Details</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Blog Content Area Start ##### -->
    <section class="blog-content-area section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12 col-md-8">
                    <div class="blog-posts-area">

                        <!-- Post Details Area -->
                        <div class="single-post-details-area">
                            <div class="post-content">
                                <h4 class="post-title">{{ $blog->title }}</h4>
                                <div class="post-meta mb-30">
                                    <a href="#">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>    
                                        {{\Carbon\Carbon::parse($blog->created_at)->format('jS M, Y')}}
                                    </a>
                                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> 
                                        {{ $blog->user->full_name }}</a>
                                </div>
                                <div class="post-thumbnail mb-30">
                                    <img src="{{ $blog->image_url }}" alt="Blog Image">
                                </div>
                                <p>{!! $blog->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Content Area End ##### -->
@endsection

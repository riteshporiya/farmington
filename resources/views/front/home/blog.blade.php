@extends('front.layouts.app')
@section('title')
    Blog
@endsection
@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(front/img/bg-img/24.jpg);">
            <h2>BLOG</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <section class="alazea-blog-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="col-lg-12">
                                <div class="single-blog-post mb-50">
                                    <div class="post-thumbnail mb-30">
                                        <a href="{{ route('blog.show', $blog->id) }}"><img src="{{ $blog->image_url }}" alt="Blog Image"></a>
                                    </div>
                                    <div class="post-content">
                                        <a href="single-post.html" class="post-title">
                                            <h5>{{ $blog->title }}</h5>
                                        </a>
                                        <div class="post-meta">
                                            <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> {{\Carbon\Carbon::parse($blog->created_at)->format('jS M, Y')}}</a>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i>{{ $blog->user->full_name }}</a>
                                        </div>
                                        <p class="post-excerpt">{!! !empty($blog->description) ? nl2br(Str::limit($blog->description, 900, ' ...')):'N/A' !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->
@endsection

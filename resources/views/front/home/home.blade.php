@extends('front.layouts.app')
@section('title')
    Home
@endsection
@section('content')
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-post-slides owl-carousel">
            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url({{ asset('front/img/bg-img/1.jpg') }});"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2>Plants exist in the weather and light rays that surround them</h2>
                                <p>Farmington provides wide range of natural plants and accessories online in india. We delivers 6000+ Farmington plants, seeds, bulbs, pebbles, pots &amp; planters across all major cities in India.</p>
                                <div class="welcome-btn-group">
                                    <a href="#" class="btn alazea-btn mr-30">GET STARTED</a>
                                    <a href="#" class="btn alazea-btn active">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(front/img/bg-img/2.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2>Plants exist in the weather and light rays that surround them</h2>
                                <p>Farmington provides wide range of natural plants and accessories online in india. We delivers 6000+ Farmington plants, seeds, bulbs, pebbles, pots &amp; planters across all major cities in India.</p>
                                <div class="welcome-btn-group">
                                    <a href="#" class="btn alazea-btn mr-30">GET STARTED</a>
                                    <a href="#" class="btn alazea-btn active">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ##### Hero Area End ##### -->
    <section class="testimonial-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel">
                        <!-- Single Testimonial Slide -->
                        @foreach($schemes as $scheme)
                            <div class="single-testimonial-slide">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-6">
                                        <div class="testimonial-thumb">
                                            <img src="{{ $scheme->image_url }}" alt="Testimonial Image" style="height: 300px; width: 300px; border-radius: 0 !important;">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="testimonial-content">
                                            <p>{!! $scheme->description !!}</p>
                                            <div class="testimonial-author-info">
                                                <h6>{{ $scheme->title }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Service Area Start ##### -->
    <section class="our-services-area bg-gray section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>OUR SERVICES</h2>
                        <p>We provide the perfect service for you.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-lg-5">
                    <div class="alazea-service-area mb-100">

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <img src="front/img/core-img/s1.png" alt="">
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5>Plants Care</h5>
                                <p>In Aenean purus, pretium sito amet sapien denim moste consectet sedoni urna placerat sodales.service its.</p>
                            </div>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="300ms">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <img src="front/img/core-img/s2.png" alt="">
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5>Pressure Washing</h5>
                                <p>In Aenean purus, pretium sito amet sapien denim moste consectet sedoni urna placerat sodales.service its.</p>
                            </div>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="500ms">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <img src="front/img/core-img/s3.png" alt="">
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5>Tree Service &amp; Trimming</h5>
                                <p>In Aenean purus, pretium sito amet sapien denim moste consectet sedoni urna placerat sodales.service its.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="alazea-video-area bg-overlay mb-100">
                        <img src="front/img/bg-img/23.jpg" alt="">
                        <a href="http://www.youtube.com/watch?v=7HKoqNJtMTQ" class="video-icon">
                            <i class="fa fa-play" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Service Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="about-us-area section-padding-100-0">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>ABOUT US</h2>
                        <p>We are leading in the plants service fields.</p>
                    </div>
                    <p>Farmington is a platform for Urban India to stay close to nature. Every city turning into a concrete jungle now, Farmington offers unique solutions for every person with beautiful plants, pots & decorative knick-knacks to create your green patch..</p>

                    <!-- Progress Bar Content Area -->
                    <div class="alazea-progress-bar mb-50">
                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Office plants</p>
                            <div id="bar1" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="80"></span>
                            </div>
                        </div>

                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Field manager</p>
                            <div id="bar2" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="70"></span>
                            </div>
                        </div>

                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Landscape design</p>
                            <div id="bar3" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="85"></span>
                            </div>
                        </div>

                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Garden Care</p>
                            <div id="bar4" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="65"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="alazea-benefits-area">
                        <div class="row">
                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="front/img/core-img/b1.png" alt="">
                                    <h5>Quality Products</h5>
                                    <p>Intiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel aliquam manta lagorn.</p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="front/img/core-img/b2.png" alt="">
                                    <h5>Perfect Service</h5>
                                    <p>Intiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel aliquam manta lagorn.</p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="front/img/core-img/b3.png" alt="">
                                    <h5>100% Natural</h5>
                                    <p>Intiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel aliquam manta lagorn.</p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="front/img/core-img/b4.png" alt="">
                                    <h5>Environmentally friendly</h5>
                                    <p>Intiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel aliquam manta lagorn.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="border-line"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Portfolio Area Start ##### -->
{{--    <section class="alazea-portfolio-area section-padding-100-0">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <!-- Section Heading -->--}}
{{--                    <div class="section-heading text-center">--}}
{{--                        <h2>OUR PORTFOLIO</h2>--}}
{{--                        <p>We devote all of our experience and efforts for creation</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="alazea-portfolio-filter">--}}
{{--                        <div class="portfolio-filter">--}}
{{--                            <button class="btn active" data-filter="*">All</button>--}}
{{--                            <button class="btn" data-filter=".design">Coffee Design</button>--}}
{{--                            <button class="btn" data-filter=".garden">Garden</button>--}}
{{--                            <button class="btn" data-filter=".home-design">Home Design</button>--}}
{{--                            <button class="btn" data-filter=".office-design">Office Design</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row alazea-portfolio">--}}

{{--                <!-- Single Portfolio Area -->--}}
{{--                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item design home-design wow fadeInUp" data-wow-delay="100ms">--}}
{{--                    <!-- Portfolio Thumbnail -->--}}
{{--                    <div class="portfolio-thumbnail bg-img" style="background-image: url(front/img/bg-img/16.jpg);"></div>--}}
{{--                    <!-- Portfolio Hover Text -->--}}
{{--                    <div class="portfolio-hover-overlay">--}}
{{--                        <a href="front/img/bg-img/16.jpg" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 1">--}}
{{--                            <div class="port-hover-text">--}}
{{--                                <h3>Minimal Flower Store</h3>--}}
{{--                                <h5>Office Plants</h5>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Single Portfolio Area -->--}}
{{--                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden wow fadeInUp" data-wow-delay="200ms">--}}
{{--                    <!-- Portfolio Thumbnail -->--}}
{{--                    <div class="portfolio-thumbnail bg-img" style="background-image: url(front/img/bg-img/17.jpg);"></div>--}}
{{--                    <!-- Portfolio Hover Text -->--}}
{{--                    <div class="portfolio-hover-overlay">--}}
{{--                        <a href="front/img/bg-img/17.jpg" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 2">--}}
{{--                            <div class="port-hover-text">--}}
{{--                                <h3>Minimal Flower Store</h3>--}}
{{--                                <h5>Office Plants</h5>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Single Portfolio Area -->--}}
{{--                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden design wow fadeInUp" data-wow-delay="300ms">--}}
{{--                    <!-- Portfolio Thumbnail -->--}}
{{--                    <div class="portfolio-thumbnail bg-img" style="background-image: url(front/img/bg-img/18.jpg);"></div>--}}
{{--                    <!-- Portfolio Hover Text -->--}}
{{--                    <div class="portfolio-hover-overlay">--}}
{{--                        <a href="front/img/bg-img/18.jpg" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 3">--}}
{{--                            <div class="port-hover-text">--}}
{{--                                <h3>Minimal Flower Store</h3>--}}
{{--                                <h5>Office Plants</h5>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Single Portfolio Area -->--}}
{{--                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden office-design wow fadeInUp" data-wow-delay="400ms">--}}
{{--                    <!-- Portfolio Thumbnail -->--}}
{{--                    <div class="portfolio-thumbnail bg-img" style="background-image: url(front/img/bg-img/19.jpg);"></div>--}}
{{--                    <!-- Portfolio Hover Text -->--}}
{{--                    <div class="portfolio-hover-overlay">--}}
{{--                        <a href="public/front/img/bg-img/19.jpg" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 4">--}}
{{--                            <div class="port-hover-text">--}}
{{--                                <h3>Minimal Flower Store</h3>--}}
{{--                                <h5>Office Plants</h5>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Single Portfolio Area -->--}}
{{--                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item design office-design wow fadeInUp" data-wow-delay="100ms">--}}
{{--                    <!-- Portfolio Thumbnail -->--}}
{{--                    <div class="portfolio-thumbnail bg-img" style="background-image: url(front/img/bg-img/20.jpg);"></div>--}}
{{--                    <!-- Portfolio Hover Text -->--}}
{{--                    <div class="portfolio-hover-overlay">--}}
{{--                        <a href="front/img/bg-img/20.jpg" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 5">--}}
{{--                            <div class="port-hover-text">--}}
{{--                                <h3>Minimal Flower Store</h3>--}}
{{--                                <h5>Office Plants</h5>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Single Portfolio Area -->--}}
{{--                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden wow fadeInUp" data-wow-delay="200ms">--}}
{{--                    <!-- Portfolio Thumbnail -->--}}
{{--                    <div class="portfolio-thumbnail bg-img" style="background-image: url(front/img/bg-img/21.jpg);"></div>--}}
{{--                    <!-- Portfolio Hover Text -->--}}
{{--                    <div class="portfolio-hover-overlay">--}}
{{--                        <a href="front/img/bg-img/21.jpg" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 6">--}}
{{--                            <div class="port-hover-text">--}}
{{--                                <h3>Minimal Flower Store</h3>--}}
{{--                                <h5>Office Plants</h5>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Single Portfolio Area -->--}}
{{--                <div class="col-12 col-lg-6 single_portfolio_item home-design wow fadeInUp" data-wow-delay="300ms">--}}
{{--                    <!-- Portfolio Thumbnail -->--}}
{{--                    <div class="portfolio-thumbnail bg-img" style="background-image: url(front/img/bg-img/22.jpg);"></div>--}}
{{--                    <!-- Portfolio Hover Text -->--}}
{{--                    <div class="portfolio-hover-overlay">--}}
{{--                        <a href="front/img/bg-img/22.jpg" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 7">--}}
{{--                            <div class="port-hover-text">--}}
{{--                                <h3>Minimal Flower Store</h3>--}}
{{--                                <h5>Office Plants</h5>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- ##### Portfolio Area End ##### -->

    <!-- ##### Testimonial Area Start ##### -->
    <section class="testimonial-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel">

                        <!-- Single Testimonial Slide -->
                        @foreach($testimonials as $testimonial)
                        <div class="single-testimonial-slide">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-thumb">
                                        <img src="{{ $testimonial->image_url }}" alt="Testimonial Image" style="height: 300px; width: 300px;">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-content">
                                        <p>{!! $testimonial->description !!}</p>
                                        <div class="testimonial-author-info">
                                            <h6>{{ $testimonial->name }}</h6>
                                            <p>{{ strtoupper($testimonial->designation) }} of {{ strtoupper($testimonial->company) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Testimonial Area End ##### -->

    <!-- ##### Product Area Start ##### -->
    <section class="new-arrivals-products-area bg-gray section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>NEW ARRIVALS</h2>
                        <p>We have the latest products, it must be exciting for you</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Product Area -->
                @foreach($plants as $plant)
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Product Image -->
                        <div class="">
                            <a href="{{ route('plant.use.shop.details', $plant->id) }}"><img src="{{ asset($plant->image_url) }}" alt="Product Image"></a>
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="{{ route('plant.use.shop.details', $plant->id) }}">
                                <p>{{ $plant->name }}</p>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- ##### Product Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <section class="alazea-blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>LATEST NEWS</h2>
                        <p>The breaking news about Gardening &amp; House plants</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <!-- Single Blog Post Area -->
                @foreach($blogs as $blog)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-post mb-100">
                        <div class="post-thumbnail mb-30">
                            <a href="{{ route('blog.show', $blog->id) }}"><img src="{{ $blog->image_url }}" alt="Blog Image"></a>
                        </div>
                        <div class="post-content">
                            <a href="{{ route('blog.show', $blog->id) }}" class="post-title">
                                <h5>{{ $blog->title }}</h5>
                            </a>
                            <div class="post-meta">
                                <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> {{\Carbon\Carbon::parse($blog->created_at)->format('jS M, Y')}}</a>
                                <a href="#"><i class="fa fa-user" aria-hidden="true"></i> {{ $blog->user->full_name }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>GET IN TOUCH</h2>
                        <p>Send us a message, we will call back later</p>
                    </div>
                    <!-- Contact Form Area -->
                    <div class="contact-form-area mb-100">
                        <form action="{{ route('send.contact') }}" method="post" id="contactForm">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger p-2">
                                    <ul class="mb-0" style="list-style: none;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @include('flash::message')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="contact-name" name="name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="contact-email" name="email" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" placeholder="Mobile">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn alazea-btn mt-15">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <!-- Google Maps -->
                    <div class="map-area mb-100">
                        <iframe src="https://maps.google.com/maps?q=SDJ%20International%20College&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->
@endsection

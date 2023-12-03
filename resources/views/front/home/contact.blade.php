@extends('front.layouts.app')
@section('title')
    Contact
@endsection
@section('page_css')
    {!! NoCaptcha::renderJs() !!}
@endsection
@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
             style="background-image: url(front/img/bg-img/24.jpg);">
            <h2>Contact US</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Info Start ##### -->
    <div class="contact-area-info section-padding-0-100">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!-- Contact Thumbnail -->
                <div class="col-12 col-md-6">
                    <div class="contact--thumbnail">
                        <img src="front/img/bg-img/25.jpg" alt="">
                    </div>
                </div>

                <div class="col-12 col-md-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>CONTACT US</h2>
                        <p>We are improving our services to serve you better.</p>
                    </div>
                    <!-- Contact Information -->
                    <div class="contact-information">
                        <p><span>Address:</span> 505 Silk Rd, New York</p>
                        <p><span>Phone:</span> +1 234 122 122</p>
                        <p><span>Email:</span> info.deercreative@gmail.com</p>
                        <p><span>Open hours:</span> Mon - Sun: 8 AM to 9 PM</p>
                        <p><span>Happy hours:</span> Sat: 2 PM to 4 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Contact Area Info End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
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
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               id="contact-name" name="name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               id="contact-email" name="email" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="tel" class="form-control @error('mobile') is-invalid @enderror"
                                               name="mobile" placeholder="Mobile">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control @error('message') is-invalid @enderror"
                                                  name="message" id="message" cols="30" rows="10"
                                                  placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    {!! NoCaptcha::display() !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block">
                                                     <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                </span>
                                    @endif
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
                        <iframe src="https://maps.google.com/maps?q=SDJ%20International%20College&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->
@endsection

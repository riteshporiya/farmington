@extends('front.layouts.app')
@section('title')
    Garden Details
@endsection
@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
             style="background-image: url({{ asset('front/img/bg-img/24.jpg') }});">
            <h2>GARDEN DETAILS</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Garden Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area mb-50">
        <div class="produts-details--content mb-50">
            <div class="container">
                <div class="row justify-content-between">

                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="product-img" href="{{ $garden->image_url }}" title="Product Image">
                                            <img class="d-block w-100" src="{{ $garden->image_url }}" alt="1">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="single_product_desc">
                            <h4 class="title">{{ $garden->name }}</h4>
                            <div class="short_overview">
                                <p>{!! $garden->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_details_tab clearfix">
                            <!-- Tabs -->
                            <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                                <li class="nav-item">
                                    <a href="#addi-info" class="nav-link" data-toggle="tab" role="tab">Garden Care</a>
                                </li>
                            </ul>
                            <!-- Tab Content -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="addi-info">
                                    <div class="additional_info_area">
                                        <p>{!! $garden->garden_care !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->
@endsection

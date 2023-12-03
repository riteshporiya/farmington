@extends('front.layouts.app')
@section('title')
    Plant Use
@endsection
@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('front/img/bg-img/24.jpg') }});">
            <h2>Plant Use</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Plant Use</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->
    <section class="shop-page section-padding-0-100">
        <div class="container">
            <div class="row">

                <!-- All Products Area -->
                <div class="col-12 col-md-8 col-lg-12">
                    <div class="shop-products-area">
                        <div class="row">
                            @foreach($plantUses as $plantUse)
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="single-product-area mb-50">
                                        <!-- Product Image -->
                                        <div class="">
                                            <a href="{{ route('plant.use.details', $plantUse->id) }}"><img src="{{ $plantUse->image_url }}" alt="Plant Type Image" style="height: 414px; width: 350px;"></a>
                                        </div>
                                        <!-- Product Info -->
                                        <div class="product-info mt-15 text-center">
                                            <a href="{{ route('plant.use.details', $plantUse->id) }}">
                                                <p style="font-weight: bold; font-size: x-large;">{{ $plantUse->name }}</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Area End ##### -->
@endsection

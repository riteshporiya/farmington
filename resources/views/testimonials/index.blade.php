@extends('layouts.app')
@section('title')
    {{ __('messages.testimonials') }}
@endsection
@section('css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.testimonials') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('testimonial.create')}}" class="btn btn-primary form-btn">{{ __('messages.testimonial.testimonial') }} <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('testimonials.table')
                    @include('testimonials.templates.templates')
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        let testimonialUrl = "{{ route('testimonial.index') }}/";
    </script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/testimonials/testimonials.js')}}"></script>
@endsection

@extends('layouts.app')
@section('title')
    {{ __('messages.testimonial.new_testimonial') }}
@endsection
@section('css')
    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">{{ __('messages.testimonial.new_testimonial') }}</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('testimonial.index') }}" class="btn btn-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body ">
                                {!! Form::open(['route' => 'testimonial.store', 'files' => true]) !!}
                                <div class="row">
                                    @include('testimonials.fields')
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>
    <script src="{{asset('assets/js/testimonials/create-edit.js')}}"></script>
@endsection

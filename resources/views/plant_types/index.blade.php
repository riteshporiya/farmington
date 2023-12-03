@extends('layouts.app')
@section('title')
    {{ __('messages.plant_types') }}
@endsection
@section('css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.plant_types') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-primary form-btn" data-toggle="modal" data-target="#addModal">{{ __('messages.plant_type.plant_type') }} <i
                            class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('plant_types.table')
                    @include('plant_types.templates.templates')
                </div>
            </div>
        </div>
    </section>
    @include('plant_types.add_modal')
    @include('plant_types.edit_modal')
    @include('plant_types.show_modal')
@endsection
@section('scripts')
    <script>
        let plantTypeUrl = "{{ route('plants.types.index') }}/";
        let plantTypeCreateUrl = "{{ route('plants.types.store') }}";
        let defaultImageUrl = "{{ asset('assets/images/default_image.jpg') }}";
    </script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/plant_types/plant-types.js')}}"></script>
@endsection

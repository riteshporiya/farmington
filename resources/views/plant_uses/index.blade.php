@extends('layouts.app')
@section('title')
    {{ __('messages.plant_uses') }}
@endsection
@section('css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.plant_uses') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-primary form-btn" data-toggle="modal" data-target="#addModal">{{ __('messages.plant_use.plant_use') }} <i
                            class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('plant_uses.table')
                    @include('plant_uses.templates.templates')
                </div>
            </div>
        </div>
    </section>
    @include('plant_uses.add_modal')
    @include('plant_uses.edit_modal')
@endsection
@section('scripts')
    <script>
        let plantUseUrl = "{{ route('plants.uses.index') }}/";
        let plantUseCreateUrl = "{{ route('plants.uses.store') }}";
        let defaultImageUrl = "{{ asset('assets/images/default_image.jpg') }}";
    </script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/plant_uses/plant-uses.js')}}"></script>
@endsection

@extends('layouts.app')
@section('title')
    {{ __('messages.garden_type') }}
@endsection
@section('css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.garden_type') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-primary form-btn" data-toggle="modal" data-target="#addModal">{{ __('messages.garden_types.garden_type') }} <i
                            class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('garden_types.table')
                    @include('garden_types.templates.templates')
                </div>
            </div>
        </div>
    </section>
    @include('garden_types.add_modal')
    @include('garden_types.edit_modal')
@endsection
@section('scripts')
    <script>
        let gardenTypeUrl = "{{ route('gardens.types.index') }}/";
        let gardenTypeCreateUrl = "{{ route('gardens.types.store') }}";
        let defaultImageUrl = "{{ asset('assets/images/default_image.jpg') }}";
    </script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/garden_types/garden-types.js')}}"></script>
@endsection

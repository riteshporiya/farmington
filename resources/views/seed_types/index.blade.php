@extends('layouts.app')
@section('title')
    {{ __('messages.seed_type') }}
@endsection
@section('css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.seed_type') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-primary form-btn" data-toggle="modal" data-target="#addModal">{{ __('messages.seed_types.seed_type') }} <i
                            class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('seed_types.table')
                    @include('seed_types.templates.templates')
                </div>
            </div>
        </div>
    </section>
    @include('seed_types.add_modal')
    @include('seed_types.edit_modal')
@endsection
@section('scripts')
    <script>
        let seedTypeUrl = "{{ route('seeds.types.index') }}/";
        let seedTypeCreateUrl = "{{ route('seeds.types.store') }}";
        let defaultImageUrl = "{{ asset('assets/images/default_image.jpg') }}";
    </script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/seed_types/seed-types.js')}}"></script>
@endsection

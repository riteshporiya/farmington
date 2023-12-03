@extends('layouts.app')
@section('title')
    {{ __('messages.schemes') }}
@endsection
@section('css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.schemes') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('scheme.create')}}" class="btn btn-primary form-btn">{{ __('messages.schemes') }} <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('schemes.table')
                    @include('schemes.templates.templates')
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        let schemeUrl = "{{ route('scheme.index') }}/";
    </script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/schemes/schemes.js')}}"></script>
@endsection

@extends('layouts.app')
@section('title')
    {{ __('messages.garden.gardens') }}
@endsection
@section('css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.garden.gardens') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('gardens.create')}}" class="btn btn-primary form-btn">{{ __('messages.garden.gardens') }} <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('gardens.table')
                    @include('gardens.templates.templates')
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        let gardenUrl = "{{ route('gardens.index') }}/";
    </script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/gardens/gardens.js')}}"></script>
@endsection

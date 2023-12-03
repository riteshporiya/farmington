@extends('layouts.app')
@section('title')
    {{ __('messages.inquires') }}
@endsection
@section('css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.inquires') }}</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('inquires.table')
                    @include('inquires.templates.templates')
                </div>
            </div>
        </div>
    </section>
    @include('inquires.show')
@endsection
@section('scripts')
    <script>
        let inquiryUrl = "{{ route('inquires.index') }}/";
    </script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/inquires/inquires.js')}}"></script>
@endsection

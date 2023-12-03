@extends('layouts.app')
@section('title')
    {{ __('messages.user.new_user') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">{{ __('messages.user.new_user') }}</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('users.index') }}" class="btn btn-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body ">
                                {!! Form::open(['route' => 'users.store', 'files' => true]) !!}
                                <div class="row">
                                    @include('users.fields')
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
@section('page_js')
    <script>
        const userUrl = '{{route('users.index')}}';
    </script>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/users/create-edit.js')}}"></script>
@endsection

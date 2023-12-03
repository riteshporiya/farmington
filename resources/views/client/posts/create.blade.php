@extends('client.layouts.app')
@section('title')
    {{ __('messages.blog.new_blog') }}
@endsection
@section('css')
    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">{{ __('messages.blog.new_blog') }}</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('user.blogs.index') }}" class="btn btn-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="card">
                           <div class="card-body ">
                                {!! Form::open(['route' => 'user.blogs.store', 'files' => true]) !!}
                                    <div class="row">
                                        @include('client.posts.fields')
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
    <script src="{{asset('assets/js/blog/create-edit.js')}}"></script>
@endsection

@extends('client.layouts.app')
@section('title')
    {{ __('blog') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Post Details</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('user.posts.index') }}"
                 class="btn btn-primary form-btn float-right">Back</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('client.posts.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection

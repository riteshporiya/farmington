@extends('client.layouts.app')
@section('title')
    {{ __('messages.user_dashboard') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.user_dashboard')  }}</h1>
        </div>
        <div class="section-body">
            <div class="row mb-1">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow-success">
                        <div class="card-icon bg-success">
                            <i class="fas fa-blog"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('messages.admin_dashboard.total_blogs') }}</h4>
                            </div>
                            <div class="card-body employer-dashboard-card">
                                {{ $data['blog'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

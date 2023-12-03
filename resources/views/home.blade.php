@extends('layouts.app')
@section('title')
    {{ __('messages.dashboard') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">{{ __('messages.dashboard') }}</h3>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow-primary">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('messages.admin_dashboard.total_users') }}</h4>
                        </div>
                        <div class="card-body">
                            {{ $data['users'] }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow-danger">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-tree"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('messages.admin_dashboard.total_plants') }}</h4>
                        </div>
                        <div class="card-body">
                            {{ $data['plants'] }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow-warning">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('messages.admin_dashboard.total_seeds') }}</h4>
                        </div>
                        <div class="card-body">
                            {{ $data['seeds'] }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow-dark">
                    <div class="card-icon bg-dark">
                        <i class="fas fa-mortar-pestle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('messages.admin_dashboard.total_garden_essentials') }}</h4>
                        </div>
                        <div class="card-body">
                            {{ $data['garden'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@extends('admin.layouts.master')

@push('css')

@endpush

@section('page-title')
    @include('admin.components.page-title',['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("admin.dashboard"),
        ]
    ], 'active' => __("Dashboard")])
@endsection

@section('content')
    <div class="custom-card">
        <div class="card-header">
            {{ __("Admin Dashboard") }}
        </div>
        <div class="card-body">
            <strong>{{ __("Welcome to admin dashboard!") }}</strong>

            <br><br>

            <p>
                {{ __("Manage and streamline all your tasks effortlessly through the Admin Dashboard. Monitor user support activities, update settings, handle services, and oversee operations in one centralized platform, designed to enhance efficiency and maintain control with ease.") }}
            </p>
        </div>
    </div>
@endsection

@push('script')

@endpush

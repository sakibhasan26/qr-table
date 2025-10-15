@extends('admin.layouts.master')

@push('css')
@endpush

@section('page-title')
    @include('admin.components.page-title', ['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb', [
        'breadcrumbs' => [
            [
                'name' => __('Dashboard'),
                'url' => setRoute('admin.dashboard'),
            ],
        ],
        'active' => __($page_title),
    ])
@endsection

@section('content')

    <div class="custom-card mt-15">
        <div class="card-header">
            <h6 class="title">{{ __($page_title) }}</h6>
        </div>
        <div class="card-body">
            <form class="card-form" method="POST" action="{{ setRoute('admin.email.template.store') }}">
                @csrf
                <div class="row mb-10-none">
                    <div class="col-xl-12 col-lg-12 form-group mt-2">
                        @include('admin.components.form.input',[
                            'label'         => __("Type")."*",
                            'name'          => "type",
                            'placeholder'   => __('Enter Type').'...',
                        ])
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group mt-2">
                        @include('admin.components.form.input',[
                            'label'         => __("Subject")."*",
                            'name'          => "subject",
                            'placeholder'   => __('Enter Subject').'...',
                        ])
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        @include('admin.components.form.input-text-rich',[
                            'label'     => __("Body")."*",
                            'name'      => "body",
                        ])
                    </div>

                    <div class="col-xl-12 col-lg-12 form-group mt-4">
                        @include('admin.components.button.form-btn',[
                            'text'          => __("Save"),
                            'permission'    => "admin.email.template.store",
                            'class'         => "w-100 btn-loading",
                        ])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


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
            <h6 class="title">{{ __("Edit") }} {{ $provider->provider_name }} {{ __("SMS Provider") }}</h6>
        </div>
        <div class="card-body">
            <form class="card-form" method="POST" action="{{ setRoute('admin.setup.sms.provider.update',$provider->slug) }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-10-none">
                    <div class="col-xl-12 col-lg-12 form-group">
                        <label for="gatewayImage">{{ __("Provider Image") }}</label>
                        <div class="col-12 col-sm-3 m-auto">
                            @include('admin.components.form.input-file',[
                                'class'             => "file-holder m-auto",
                                'name'              => "provider_image",
                                'old_files_path'    => files_asset_path('sms-provider'),
                                'old_files'         => old('old_image',$provider->image),
                            ])
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group mt-2">
                        <div class="custom-inner-card input-field-generator" data-source="provider_credentials_field">
                            <div class="card-inner-header">
                                <h6 class="title">{{ __("Genarate Fields") }}</h6>
                                <button type="button" class="btn--base add-row-btn"><i class="fas fa-plus"></i> {{ __("Add") }}</button>
                            </div>
                            <div class="card-inner-body">
                                <div class="results">
                                    @foreach ($provider->config ?? [] as $item)
                                        <div class="row align-items-end">
                                            <div class="col-xl-3 col-lg-3 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'     => __("Title")."*",
                                                    'name'      => "title[]",
                                                    'value'     => $item->label
                                                ])
                                            </div>
                                            <div class="col-xl-3 col-lg-3 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'     => __("Name")."*",
                                                    'name'      => "name[]",
                                                    'value'     => $item->name
                                                ])
                                            </div>

                                            <div class="col-xl-5 col-lg-5 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'     => __("Value")."*",
                                                    'name'      => "value[]",
                                                    'value'     => $item->value
                                                ])
                                            </div>

                                            <div class="col-xl-1 col-lg-1 form-group">
                                                <button type="button" class="custom-btn btn--base btn--danger row-cross-btn w-100"><i class="las la-times"></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 form-group mt-4">
                        @include('admin.components.button.form-btn',[
                            'text'          => __("Update"),
                            'permission'    => "admin.setup.sms.provider.update",
                            'class'         => "w-100 btn-loading",
                        ])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


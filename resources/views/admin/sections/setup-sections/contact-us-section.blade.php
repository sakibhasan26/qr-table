@php
    $default_lang_code = language_const()::NOT_REMOVABLE;
    $system_default_lang = get_default_language_code();
    $languages_for_js_use = $languages->toJson();
@endphp

@extends('admin.layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('public/backend/css/fontawesome-iconpicker.min.css') }}">
    <style>
        .fileholder {
            min-height: 374px !important;
        }

        .fileholder-files-view-wrp.accept-single-file .fileholder-single-file-view,.fileholder-files-view-wrp.fileholder-perview-single .fileholder-single-file-view{
            height: 330px !important;
        }
    </style>
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
    ], 'active' => __("Setup Section")])
@endsection

@section('content')
    <div class="custom-card">
        <div class="card-header">
            <h6 class="title">{{ __($page_title) }}</h6>
        </div>
        <div class="card-body">
            <form class="card-form" action="{{ setRoute('admin.setup.sections.section.update',$slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center mb-10-none">
                    <div class="col-xl-12 col-lg-12">
                        <div class="product-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    @foreach ($languages as $item)
                                        <button class="nav-link @if (get_default_language_code() == $item->code) active @endif" id="{{$item->name}}-tab" data-bs-toggle="tab" data-bs-target="#{{$item->name}}" type="button" role="tab" aria-controls="{{ $item->name }}" aria-selected="true">{{ $item->name }}</button>
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                @foreach ($languages as $item)
                                    @php
                                        $lang_code = $item->code;
                                    @endphp
                                    <div class="tab-pane @if (get_default_language_code() == $item->code) fade show active @endif" id="{{ $item->name }}" role="tabpanel" aria-labelledby="english-tab">
                                        <div class="form-group">
                                            @include('admin.components.form.input',[
                                                'label'         => __("Heading"),
                                                'label_after'   => "*",
                                                'name'          => $item->code . "_heading",
                                                'value'         => old($item->code . "_heading",$data->value->language->$lang_code->heading ?? "")
                                            ])
                                            <small>{{ __("Ex: Highlighted Words [Service]") }} </small>
                                        </div>
                                        <div class="form-group">
                                            @include('admin.components.form.input',[
                                                'label'         => __("Sub Heading"),
                                                'label_after'   => "*",
                                                'name'          => $item->code . "_sub_heading",
                                                'value'         => old($item->code . "_sub_heading",$data->value->language->$lang_code->sub_heading ?? "")
                                            ])
                                        </div>
                                        <div class="form-group">
                                            @include('admin.components.form.input',[
                                                'label'         => __("Info Title"),
                                                'label_after'   => "*",
                                                'name'          => $item->code . "_info_title",
                                                'value'         => old($item->code . "_info_title",$data->value->language->$lang_code->info_title ?? "")
                                            ])
                                        </div>
                                        <div class="form-group">
                                            @include('admin.components.form.input',[
                                                'label'         => __("Phone Icon"),
                                                'label_after'   => "*",
                                                'name'          => $item->code . "_phone_icon",
                                                'value'         => old($item->code . "_phone_icon",$data->value->language->$lang_code->phone_icon ?? ""),
                                                'class'         => "form--control icp icp-auto iconpicker-element iconpicker-input",
                                            ])
                                        </div>
                                        <div class="form-group">
                                            @include('admin.components.form.input',[
                                                'label'         => __("Phone"),
                                                'label_after'   => "*",
                                                'name'          => $item->code . "_phone",
                                                'value'         => old($item->code . "_phone",$data->value->language->$lang_code->phone ?? "")
                                            ])
                                        </div>
                                        <div class="form-group">
                                            @include('admin.components.form.input',[
                                                'label'         => __("Email Icon"),
                                                'label_after'   => "*",
                                                'name'          => $item->code . "_email_icon",
                                                'value'         => old($item->code . "_email_icon",$data->value->language->$lang_code->email_icon ?? ""),
                                                'class'         => "form--control icp icp-auto iconpicker-element iconpicker-input",
                                            ])
                                        </div>
                                        <div class="form-group">
                                            @include('admin.components.form.input',[
                                                'label'         => __("Email"),
                                                'label_after'   => "*",
                                                'name'          => $item->code . "_email",
                                                'value'         => old($item->code . "_email",$data->value->language->$lang_code->email ?? "")
                                            ])
                                        </div>
                                        <div class="form-group">
                                            @include('admin.components.form.input',[
                                                'label'         => __("Location Icon"),
                                                'label_after'   => "*",
                                                'name'          => $item->code . "_location_icon",
                                                'value'         => old($item->code . "_location_icon",$data->value->language->$lang_code->location_icon ?? ""),
                                                'class'         => "form--control icp icp-auto iconpicker-element iconpicker-input",
                                            ])
                                        </div>
                                        <div class="form-group">
                                            @include('admin.components.form.input',[
                                                'label'         => __("Location"),
                                                'label_after'   => "*",
                                                'name'          => $item->code . "_location",
                                                'value'         => old($item->code . "_location",$data->value->language->$lang_code->location ?? "")
                                            ])
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        @include('admin.components.button.form-btn',[
                            'class'         => "w-100 btn-loading",
                            'text'          => __("Update"),
                            'permission'    => "admin.setup.sections.section.update"
                        ])
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('public/backend/js/fontawesome-iconpicker.js') }}"></script>

    <script>
        // icon picker
        $('.icp-auto').iconpicker();
    </script>


@endpush

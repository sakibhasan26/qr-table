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
            <h6 class="title">{{ __("Contact Section") }}</h6>
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

                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => __("Address"),
                                                    'label_after'   => "*",
                                                    'name'          => $item->code . "_address",
                                                    'value'         => old("_address",$data->value->contact->language->$lang_code->address ?? "")
                                                ])
                                            </div>
                                            <div class="col-xl-4 col-lg-4 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => __("Address Title"),
                                                    'label_after'   => "*",
                                                    'name'          => $item->code . "_address_title",
                                                    'value'         => old("_address_title",$data->value->contact->language->$lang_code->address_title ?? "")
                                                ])
                                            </div>
                                            <div class="col-xl-4 col-lg-4 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => __("Address Icon"),
                                                    'label_after'   => "*",
                                                    'name'          => $item->code . "_address_icon",
                                                    'value'         => old("_address_icon",$data->value->contact->language->$lang_code->address_icon ?? ""),
                                                    'class'         => "form--control icp icp-auto-icon iconpicker-element iconpicker-input",
                                                ])
                                            </div>
                                            <div class="col-xl-4 col-lg-4 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => __("Phone"),
                                                    'label_after'   => "*",
                                                    'name'          => $item->code . "_phone",
                                                    'value'         => old("_phone",$data->value->contact->language->$lang_code->phone ?? "")
                                                ])
                                            </div>
                                            <div class="col-xl-4 col-lg-4 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => __("Phone Title"),
                                                    'label_after'   => "*",
                                                    'name'          => $item->code . "_phone_title",
                                                    'value'         => old("_phone_title",$data->value->contact->language->$lang_code->phone_title ?? "")
                                                ])
                                            </div>
                                            <div class="col-xl-4 col-lg-4 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => __("Phone Icon"),
                                                    'label_after'   => "*",
                                                    'name'          => $item->code . "_phone_icon",
                                                    'value'         => old("_phone_icon",$data->value->contact->language->$lang_code->phone_icon ?? ""),
                                                    'class'         => "form--control icp icp-auto-icon iconpicker-element iconpicker-input",
                                                ])
                                            </div>
                                            <div class="col-xl-4 col-lg-4 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => __("Email"),
                                                    'label_after'   => "*",
                                                    'name'          => $item->code . "_email",
                                                    'value'         => old("_email",$data->value->contact->language->$lang_code->email ?? "")
                                                ])
                                            </div>
                                            <div class="col-xl-4 col-lg-4 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => __("Email Title"),
                                                    'label_after'   => "*",
                                                    'name'          => $item->code . "_email_title",
                                                    'value'         => old("_email_title",$data->value->contact->language->$lang_code->email_title ?? "")
                                                ])
                                            </div>
                                            <div class="col-xl-4 col-lg-4 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => __("Email Icon"),
                                                    'label_after'   => "*",
                                                    'name'          => $item->code . "_email_icon",
                                                    'value'         => old("_email_icon",$data->value->contact->language->$lang_code->email_icon ?? ""),
                                                    'class'         => "form--control icp icp-auto-icon iconpicker-element iconpicker-input",
                                                ])
                                            </div>

                                            <div class="form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => __("Heading"),
                                                    'label_after'   => "*",
                                                    'name'          => $item->code . "_contact_heading",
                                                    'value'         => old($item->code . "_contact_heading",$data->value->contact->language->$lang_code->contact_heading ?? "")
                                                ])
                                            </div>
                                            <div class="form-group">
                                                @include('admin.components.form.textarea',[
                                                    'label'         => __("Description"),
                                                    'label_after'   => "*",
                                                    'name'          => $item->code . "_contact_desc",
                                                    'value'         => old($item->code . "_contact_desc",$data->value->contact->language->$lang_code->contact_desc ?? "")
                                                ])
                                            </div>
                                            <div class="form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => __("Subscribe Text"),
                                                    'label_after'   => "*",
                                                    'name'          => $item->code . "_subcribe_text",
                                                    'value'         => old($item->code . "_subcribe_text",$data->value->contact->language->$lang_code->subcribe_text ?? "")
                                                ])
                                            </div>
                                            <div class="form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => __("Copyright Text"),
                                                    'label_after'   => "*",
                                                    'name'          => $item->code . "_copyright_text",
                                                    'value'         => old($item->code . "_copyright_text",$data->value->contact->language->$lang_code->copyright_text ?? "")
                                                ])
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="border-bottom my-3"></div>



                    <div class="border-bottom my-3"></div>

                    <div class="col-xl-12 col-lg-12 form-group">
                        <div class="custom-inner-card input-field-generator" data-source="setup_section_footer_social_link_input">
                            <div class="card-inner-header">
                                <h6 class="title">{{ __("Social Links") }}</h6>
                                <button type="button" class="btn--base add-row-btn"><i class="fas fa-plus"></i> {{ __("Add") }}</button>
                            </div>
                            <div class="card-inner-body">
                                <div class="results">
                                    @php
                                        $social_links = $data->value->contact->social_links ?? [];
                                    @endphp

                                    @forelse ($social_links as $item)
                                        <div class="row align-items-end">
                                            <div class="col-xl-3 col-lg-3 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => "Icon",
                                                    'label_after'   => "*",
                                                    'name'          => "icon[]",
                                                    'class'         => "form--control icp icp-auto iconpicker-element iconpicker-input",
                                                    'value'         => $item->icon ?? "",
                                                ])
                                            </div>
                                            <div class="col-xl-8 col-lg-8 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => "Link",
                                                    'label_after'   => "*",
                                                    'name'          => "link[]",
                                                    'value'         => $item->link ?? "",
                                                ])
                                            </div>
                                            <div class="col-xl-1 col-lg-1 form-group">
                                                <button type="button" class="custom-btn btn--base btn--danger row-cross-btn w-100"><i class="las la-times"></i></button>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="row align-items-end">
                                            <div class="col-xl-3 col-lg-3 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => "Icon",
                                                    'label_after'   => "*",
                                                    'name'          => "icon[]",
                                                    'class'         => "form--control icp icp-auto iconpicker-element iconpicker-input",
                                                ])
                                            </div>
                                            <div class="col-xl-8 col-lg-8 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => "Link",
                                                    'label_after'   => "*",
                                                    'name'          => "link[]",
                                                ])
                                            </div>
                                            <div class="col-xl-1 col-lg-1 form-group">
                                                <button type="button" class="custom-btn btn--base btn--danger row-cross-btn w-100"><i class="las la-times"></i></button>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 form-group">
                        @include('admin.components.button.form-btn',[
                            'class'         => "w-100 btn-loading",
                            'text'          => "Update",
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
        $('.icp-auto-icon').iconpicker();
        $('.icp-auto').iconpicker();


        $(".input-field-generator .add-row-btn").click(function(){
            // alert();
            setTimeout(() => {
                $('.icp-auto').iconpicker();
            }, 500);
        });
    </script>

@endpush

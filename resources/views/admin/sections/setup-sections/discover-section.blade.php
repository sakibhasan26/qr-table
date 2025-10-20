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
                    <div class="col-xl-8 col-lg-8 form-group mb-5">

                        @include('admin.components.form.input-file',[
                            'label'             => "Image:",
                            'name'              => "image",
                            'class'             => "file-holder",
                            'old_files_path'    => files_asset_path("site-section"),
                            'old_files'         => $data->value->image ?? "",
                        ])


                    </div>
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
                                            <div class="col-6">
                                                <div class="form-group">
                                                    @include('admin.components.form.input',[
                                                        'label'     => __("Title")."*",
                                                        'name'      => $item->code . "_title",
                                                        'value'     => old($item->code . "_title",$data->value->language->$lang_code->title ?? "")
                                                    ])

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    @include('admin.components.form.input',[
                                                        'label'     => __("Heading")."*",
                                                        'name'      => $item->code . "_heading",
                                                        'value'     => old($item->code . "_heading",$data->value->language->$lang_code->heading ?? "")
                                                    ])
                                                    <small>{{ __("Ex: Highlighted Words [Services]") }} </small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    @include('admin.components.form.input',[
                                                        'label'     => __("Sub Heading")."*",
                                                        'name'      => $item->code . "_sub_heading",
                                                        'value'     => old($item->code . "_sub_heading",$data->value->language->$lang_code->sub_heading ?? "")
                                                    ])

                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    @include('admin.components.form.input', [
                                                        'label' => __("Search Placeholder")."*",
                                                        'name'  => $item->code . "_search_placeholder",
                                                        'value' => old($item->code . "_search_placeholder", $data->value->language->$lang_code->search_placeholder ?? "")
                                                    ])
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    @include('admin.components.form.input', [
                                                        'label' => __("Search Icon")."*",
                                                        'name'  => $item->code . "_search_icon",
                                                        'value' => old($item->code . "_search_icon", $data->value->language->$lang_code->search_icon ?? ""),
                                                        'class'         => "form--control icp icp-auto iconpicker-element iconpicker-input",
                                                    ])
                                                </div>
                                            </div>


                                        </div>


                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        @include('admin.components.button.form-btn',[
                            'class'         => "w-100 btn-loading",
                            'text'          => "Submit",
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

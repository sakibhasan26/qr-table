@php
    $default = language_const()::NOT_REMOVABLE;
    $app_local = get_default_language_code();
@endphp

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
    ], 'active' => __("Category")])
@endsection

@section('content')


    <div class="custom-card">
        <div class="card-header">
            <h6 class="title">{{ __($page_title) }}</h6>
        </div>
        <div class="card-body">
            <form class="card-form" action="{{ setRoute('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center mb-10-none">
                    <div class="col-xl-12 col-lg-12 form-group mb-5">
                        <div class="row justify-content-center">
                            <div class="col-xl-12 col-lg-12 form-group">
                                @include('admin.components.form.input-file',[
                                    'label'             => __("Image").':',
                                    'name'              => "image",
                                    'class'             => "file-holder",
                                    'old_files_path'    => files_asset_path("site-section"),
                                    'old_files'         => old("old_image"),
                                ])
                            </div>
                        </div>


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
                                             <div class="form-group">
                                                @include('admin.components.form.input',[
                                                    'label'     => __("Dish Name")."*",
                                                    'name'      => $lang_code . "_dish_name",
                                                    'value'     => old($lang_code . "_dish_name",$data->value->language->$lang_code->dish_name ?? ""),
                                                    'placeholder' => __("Enter Dish Name")
                                                ])
                                            </div>

                                            <div class="form-group">
                                                @include('admin.components.form.textarea',[
                                                    'label'     => __("Details")."*",
                                                    'name'      => $lang_code . "_details",
                                                    'value'     => old($lang_code . "_details",$data->value->language->$lang_code->details ?? ""),
                                                    'placeholder' => __("Enter Details")
                                                ])
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            @include('admin.components.form.input',[
                                'label'     => __("Price")."*",
                                'name'      => "price",
                                'placeholder' => __("Enter Price")
                            ])
                        </div>
                        <div class="form-group">
                            <label for="popular">{{ __('Popular Dishes') }}</label>
                            <select name="popular" id="popular" class="form--control select2-auto-tokenize">
                                <option value="0">{{ __('NO') }}</option>
                                <option value="1">{{ __('YES') }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">{{ __('Quantity') }}</label>
                            <select name="qty" id="quantity" class="form--control select2-auto-tokenize">
                                @for ($i = 0; $i <= 500; $i++)
                                    <option value="{{ $i }}" {{ old('quantity') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">{{ __('Category') }}</label>
                            <select name="category" id="category" class="form--control select2-auto-tokenize">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ @$item->data->language->$app_local->name ?? @$item->data->language->$default->name }}</option>
                                @endforeach

                            </select>
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
    <script>

    </script>


@endpush

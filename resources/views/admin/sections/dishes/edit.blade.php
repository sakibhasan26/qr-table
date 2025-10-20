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
            <form class="card-form" action="{{ setRoute('admin.dishes.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.components.form.hidden-input',[
                    'name'          => 'target',
                    'value'         => $dish->id,
                ])

                <div class="row justify-content-center mb-10-none">
                    <input type="hidden" name="old_image" value="{{ old('old_image') }}">
                    <div class="col-xl-12 col-lg-12 form-group">
                        @include('admin.components.form.input-file',[
                            'label'             => __("Image"),
                            'name'              => "image",
                            'class'             => "file-holder",
                            'old_files_path'    => files_asset_path("dishes"),
                            'old_files'         => $dish->image,
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
                                            {{-- <input type="hidden" name="target" value="{{ $dish->id }}"> --}}
                                            <div class="col-xl-12 col-lg-12 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'         => __('Dish Name'),
                                                    'label_after'   => '*',
                                                    'name'          => $item->code . "_dish_name_edit",
                                                    'value'         => old($item->code . "_dish_name_edit"),
                                                    'value'     => old($item->code . "_dish_name_edit",$dish->data?->language?->$lang_code?->dish_name ?? null)

                                                ])
                                            </div>
                                            <div class="col-xl-12 col-lg-12 form-group">
                                                @include('admin.components.form.textarea',[
                                                    'label'         => __('Details'),
                                                    'label_after'   => '*',
                                                    'name'          => $item->code . "_details_edit",
                                                    'value'     => old($item->code . "_details_edit",$dish->data?->language?->$lang_code?->details ?? null)
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
                                'placeholder' => __("Enter Price"),
                                'value'     => get_amount(@$dish->price)

                            ])
                        </div>
                        <div class="form-group">
                            <label for="popular">{{ __('Popular Dishes') }}</label>
                            <select name="popular" id="popular" class="form--control select2-auto-tokenize">
                                <option value="0" {{ $dish->popular=='0'? 'selected':'' }}>{{ __('NO') }}</option>
                                <option value="1" {{ $dish->popular=='1'? 'selected':'' }}>{{ __('YES') }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">{{ __('Quantity') }}</label>
                            <select name="qty" id="quantity" class="form--control select2-auto-tokenize">
                                @for ($i = 0; $i <= 500; $i++)
                                    <option value="{{ $i }}" {{ (old('qty', $dish->qty ?? '') == $i) ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">{{ __('Category') }}</label>
                            <select name="category" id="category" class="form--control select2-auto-tokenize">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }} {{ $item->id == $dish->category_id ? 'selected':'' }}">{{ @$item->data->language->$app_local->name ?? @$item->data->language->$default->name }}</option>
                                @endforeach

                            </select>
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
    <script>
        openModalWhenError("add-category","#add-category");
    </script>
    <script>
        $(document).ready(function(){
            // Switcher
            switcherAjax("{{ setRoute('admin.category.status.update') }}");
        })

         $(".delete-modal-button").click(function(){
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));
            var actionRoute =  "{{ setRoute('admin.category.delete') }}";
            var target      = oldData.id;
            var message     = `{{ __('Are you sure to remove') }}`;
            openDeleteModal(actionRoute,target,message);
        });
    </script>

<script>
    var languages = "{{ $__languages }}";
    languages = JSON.parse(languages.replace(/&quot;/g,'"'));
    var appLocal = "{{ $app_local }}";

    $(document).ready(function(){
        openModalWhenError("edit-category","#edit-category");
        $(document).on("click",".edit-modal-button",function(){
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));
            console.log(oldData);
            var editModal = $("#edit-category");

            editModal.find("form").first().find("input[name=target]").val(oldData.id);
            $.each(languages,function(index,item) {
                editModal.find("input[name="+item.code+"_dish_name_edit]").val(oldData?.data.language[item.code]?.dish_name);
                editModal.find("textarea[name="+item.code+"_details_edit]").val(oldData?.data.language[item.code]?.details);
                editModal.find("input[name="+item.code+"_price_edit]").val(parseFloat(oldData?.price).toFixed(2));
                editModal.find("select[name="+item.code+"popular_edit]").val(oldData?.popular);
                // editModal.find("select[name="+item.code+"qty]").val(oldData?.qty);
                const popularValue = oldData?.popular ? '1' : '0';
                editModal.find('select[name="popular"]').val(popularValue);
                editModal.find("input[name=old_image]").val(oldData.image);
            });

            fileHolderPreviewReInit("#client-feedback-update input[name=image_edit]");
            editModal.find("input[name=name]").val(oldData.name)
            openModalBySelector("#edit-category");

        });
    });
</script>
@endpush

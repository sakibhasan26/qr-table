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

    <div class="table-area">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title">{{ $page_title }}</h5>

                {{-- <button class="btn--base modal-btn"> Add Plan</button> --}}

                @include('admin.components.link.add-default',[
                    'text'          => __("Add Dish"),
                    'href'          => setRoute('admin.dishes.create'),
                    'class'         => "modal-btn",
                    'permission'    => "admin.dishes.create",
                ])

                {{-- <a href="{{ setRoute('admin.dishes.create') }}">Add Dish</a> --}}
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Details') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Admin') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dishes  as $key => $item)
                            <tr data-item="{{ $item->editData }}">
                                <td> <img width="80" src="{{ get_image($item->image ?? "","dishes") }}" alt=""></td>
                                <td>{{ @$item->data?->language?->$app_local?->dish_name ?? @$item->data?->language?->$default?->dish_name }}</td>
                                <td>{{ @$item->data?->language?->$app_local?->details ?? @$item->data?->language?->$default?->details }}</td>
                                <td>{{ get_amount(@$item->price)  }} {{ get_default_currency_code() }}</td>


                                <td>{{ @$item->admin->fullname }}</td>

                                <td>
                                    @include('admin.components.form.switcher',[
                                        'name'          => 'status',
                                        'value'         => $item->status,
                                        'options'       => [__('Enable') => 1,__('Disable') => 0],
                                        'onload'        => true,
                                        'data_target'   => $item->id,
                                        'permission'    => "admin.dishes.status.update",
                                    ])
                                </td>

                                <td>
                                    @include('admin.components.link.edit-default',[
                                        'href'          => setRoute('admin.dishes.edit',$item->id),
                                        'class'         => "edit-modal-button",
                                        'permission'    => "admin.category.update",
                                    ])

                                    @include('admin.components.link.delete-default',[
                                        'href'          => "javascript:void(0)",
                                        'class'         => "delete-modal-button",
                                        'permission'    => "admin.category.delete",
                                    ])
                                </td>

                            </tr>
                        @empty
                            @include('admin.components.alerts.empty',['colspan' => 10])
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ get_paginate($dishes) }}
        </div>
    </div>




@endsection

@push('script')

    <script>

         $(".delete-modal-button").click(function(){
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));
            var actionRoute =  "{{ setRoute('admin.dishes.delete') }}";
            var target      = oldData.id;
            var message     = `{{ __('Are you sure to remove') }}`;
            openDeleteModal(actionRoute,target,message);
        });

         $(document).ready(function(){
            switcherAjax("{{ setRoute('admin.dishes.status.update') }}");
        })
    </script>


@endpush

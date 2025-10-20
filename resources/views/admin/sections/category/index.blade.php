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
                    'text'          => __("Add Category"),
                    'href'          => "#add-category",
                    'class'         => "modal-btn",
                    'permission'    => "admin.setup-sections.section.item.store",
                ])
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Admin') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories  as $key => $item)
                            <tr data-item="{{ $item->editData }}">
                                <td>{{ @$item->data?->language?->$app_local?->name ?? @$item->data?->language?->$default?->name }}</td>
                                {{-- <td>{{ $item->name ?? '' }}</td> --}}

                                <td>{{ @$item->admin->fullname }}</td>

                                <td>
                                    @include('admin.components.form.switcher',[
                                        'name'          => 'category_status',
                                        'value'         => $item->status,
                                        'options'       => [__('Enable') => 1,__('Disable') => 0],
                                        'onload'        => true,
                                        'data_target'   => $item->id,
                                        'permission'    => "admin.category.status.update",
                                    ])
                                </td>

                                <td>
                                    @include('admin.components.link.edit-default',[
                                        'href'          => "javascript:void(0)",
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
                            @include('admin.components.alerts.empty',['colspan' => 5])
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ get_paginate($categories) }}
        </div>
    </div>

    {{-- Currency Edit Modal --}}
    @include('admin.components.modals.edit-category')

    {{-- Currency Add Modal --}}
    @include('admin.components.modals.add-category')

@endsection

@push('script')
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
@endpush

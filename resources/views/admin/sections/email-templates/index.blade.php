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
    <div class="table-area">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title">{{ __($page_title) }}</h5>
                <div class="table-btn-area">
                    <div>
                        @include('admin.components.link.add-default',[
                        'text'          => __("Add Template"),
                        'href'          => setRoute('admin.email.template.create'),
                        'class'         => "btn-base",
                    ])
                    </div>
                </div>

            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>{{ __("Type") }}</th>
                            <th>{{ __("Status") }}</th>
                            <th>{{ __("Last Edit By") }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($email_templates ?? [] as $key => $item)
                            <tr>
                                <td>{{ $item->type ?? '' }}</td>
                                <td>
                                    @include('admin.components.form.switcher', [
                                        'name'          => 'status',
                                        'data_target'   => $item->id,
                                        'value'         => $item->status,
                                        'options'       => [__('Enable') => 1, __('Disabled') => 0],
                                        'onload'        => true,
                                        'permission'    => "admin.email.template.status.update",
                                    ])
                                </td>
                                <td>{{ $item->admin->fullname ?? '' }}</td>
                                <td>
                                    <a href="{{ setRoute('admin.email.template.preview',$item->slug) }}" class="btn btn--primary"><i class="las la-box"></i></a>
                                    <a href="{{ setRoute('admin.email.template.edit',$item->slug) }}" class="btn btn--base"><i class="las la-pen"></i></a>
                                </td>
                            </tr>
                        @empty
                            @include('admin.components.alerts.empty',['colspan' => 4])
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        switcherAjax("{{ setRoute('admin.email.template.status.update') }}");
    </script>
@endpush

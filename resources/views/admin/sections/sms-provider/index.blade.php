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
                        'text'          => __("Add Provider"),
                        'href'          => "#sms-provider-add",
                        'class'         => "modal-btn",
                        'permission'    => "admin.setup.sms.provider.store",
                    ])
                    </div>
                    <div>
                        @include('admin.components.link.custom',[
                        'class'         => "btn--base modal-btn w-100",
                        'href'          => "#test-sms",
                        'text'          => "Send Test SMS",
                        'permission'    => "admin.setup.sms.provider.test.sms.send",
                    ])
                    </div>
                </div>

            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ __("Name") }}</th>
                            <th>{{ __("Status") }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($providers ?? [] as $key => $item)
                            <tr>
                                <td>
                                    <ul class="user-list">
                                        <li><img src="{{ get_image($item->image, 'sms-provider') }}" alt="image"></li>
                                    </ul>
                                </td>
                                <td>{{ $item->provider_name }}</td>
                                <td>
                                    @include('admin.components.form.switcher', [
                                        'name'          => 'status',
                                        'data_target'   => $item->id,
                                        'value'         => $item->status,
                                        'options'       => [__('Enable') => 1, __('Disabled') => 0],
                                        'onload'        => true,
                                        'permission'    => "admin.setup.sms.provider.status.update",
                                    ])
                                </td>
                                <td>
                                    <a href="{{ setRoute('admin.setup.sms.provider.edit',$item->slug) }}" class="btn btn--base"><i class="las la-pen"></i></a>
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

    @include('admin.components.modals.sms-provider.add')
    @include('admin.components.modals.sms-provider.test-sms')

@endsection

@push('script')
    <script>
        switcherAjax("{{ setRoute('admin.setup.sms.provider.status.update') }}");
    </script>
@endpush

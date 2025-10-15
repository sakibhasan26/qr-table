@extends('admin.layouts.master')

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
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
    <div style="padding: 20px;">
        <div style="max-width: 600px; width: 100%; margin: 0 auto; padding: 20px; background-color: #ffffff; border-radius: 5px; box-sizing: border-box;">
            {!! $email_body !!}
        </div>
    </div>
</body>
@endsection

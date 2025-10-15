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
                <h5 class="title">{{ __("Dynamic Variable Details") }}</h5>

            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>{{ __("Type") }}</th>
                            <th>{{ __("Name") }}</th>
                            <th>{{ __("Description") }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($email_template->variables_info ?? [] as $key => $item)
                            <tr>
                                <td>{{ $email_template->type ?? '' }}</td>
                                <td>{{ '{' . '{' . $item->name . '}' . '}' }}</td>
                                <td>{{ $item->description ?? '' }}</td>
                                <td><button class="btn btn--base copy-btn" data-text="{{ '{' . '{' . $item->name . '}' . '}' }}">
                                    <i class="las la-copy"></i>
                                </button></td>
                            </tr>
                        @empty
                            @include('admin.components.alerts.empty',['colspan' => 4])
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="custom-card mt-15">
        <div class="card-header">
            <h6 class="title">{{ __($page_title) }}</h6>
        </div>
        <div class="card-body">
            <form class="card-form" method="POST" action="{{ setRoute('admin.email.template.update',$email_template->slug) }}">
                @csrf
                <div class="row mb-10-none">
                    <div class="col-xl-12 col-lg-12 form-group mt-2">
                        @include('admin.components.form.input',[
                            'label'         => __("Subject")."*",
                            'name'          => "subject",
                            'placeholder'   => __('Enter Subject').'...',
                            'value'         => old('subject',$email_template->subject)
                        ])
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        @include('admin.components.form.input-text-rich',[
                            'label'         => "Body",
                            'label_after'   => "*",
                            'name'          => "body",
                            'value'         => old("body",$email_template->body)
                        ])
                    </div>

                    <div class="col-xl-12 col-lg-12 form-group mt-4">
                        @include('admin.components.button.form-btn',[
                            'text'          => __("Update"),
                            'permission'    => "admin.email.template.update",
                            'class'         => "w-100 btn-loading",
                        ])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".copy-btn").forEach(button => {
            button.addEventListener("click", function () {
                let text = this.getAttribute("data-text");
                let tempInput = document.createElement("textarea");
                tempInput.value = text;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand("copy");
                document.body.removeChild(tempInput);
                throwMessage('success',["Copied: " + text]);
            });
        });
    });
</script>

@endpush


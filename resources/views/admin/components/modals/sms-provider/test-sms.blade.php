<div id="test-sms" class="mfp-hide medium">
    <div class="modal-data">
        <div class="modal-header px-0">
            <h5 class="modal-title">{{ __("Send Test SMS") }}</h5>
        </div>
        <div class="modal-form-data">
            <form class="modal-form" method="POST" action="{{ setRoute('admin.setup.sms.provider.test.sms.send') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-10-none mt-3">
                    <div class="col-xl-12 col-lg-12 form-group">
                        @include('admin.components.form.input',[
                            'label'         => __("Mobile Number")."*",
                            'name'          => "mobile",
                            'type'          => "text",
                            'placeholder'   => __('Enter Number').'...',
                            'value'         => old("mobile"),
                        ])
                    </div>

                    <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                        <button type="button" class="btn btn--danger modal-close">{{ __("Cancel") }}</button>
                        <button type="submit" class="btn btn--base">{{ __("Send") }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

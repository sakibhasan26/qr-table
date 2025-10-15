{{-- Modal START --}}
@if (admin_permission_by_name("admin.setup.sms.provider.store"))
@env('local')
    <div id="sms-provider-add" class="mfp-hide large">
        <div class="modal-data">
            <div class="modal-header">
                <h5 class="modal-title">{{ __("Create SMS Provider") }}</h5>
            </div>
            <div class="modal-form-data">
                <form class="modal-form" method="POST" action="{{ setRoute('admin.setup.sms.provider.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-10-none">

                        <div class="col-xl-12 col-lg-12 form-group">
                            <label for="gatewayImage">{{ __("Provider Image") }}</label>
                            <div class="col-12 col-sm-3 m-auto">
                                @include('admin.components.form.input-file',[
                                    'label'         => false,
                                    'class'         => "file-holder m-auto",
                                    'name'          => "image",
                                ])
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 form-group">
                            @include('admin.components.form.input',[
                                'label'         => __("Provider Name")."*",
                                'name'          => "provider_name",
                            ])
                        </div>

                        <div class="col-xl-12 col-lg-12 form-group">
                            @include('admin.components.form.input',[
                                'label'         => __("Provider Title")."*",
                                'name'          => "provider_title",
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group">
                            <div class="custom-inner-card input-field-generator" data-source="provider_credentials_field">
                                <div class="card-inner-header">
                                    <h6 class="title">{{ __("Genarate Fields") }}</h6>
                                    <button type="button" class="btn--base add-row-btn"><i class="fas fa-plus"></i> {{ __("Add") }}</button>
                                </div>
                                <div class="card-inner-body">
                                    <div class="results">
                                        <div class="row align-items-end">
                                            <div class="col-xl-3 col-lg-3 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'     => __("Title")."*",
                                                    'name'      => "title[]",
                                                ])
                                            </div>
                                            <div class="col-xl-3 col-lg-3 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'     => __("Name")."*",
                                                    'name'      => "name[]",
                                                ])
                                            </div>

                                            <div class="col-xl-5 col-lg-5 form-group">
                                                @include('admin.components.form.input',[
                                                    'label'     => __("Value")."*",
                                                    'name'      => "value[]",
                                                ])
                                            </div>

                                            <div class="col-xl-1 col-lg-1 form-group">
                                                <button type="button" class="custom-btn btn--base btn--danger row-cross-btn w-100"><i class="las la-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                            <button type="button" class="btn btn--danger modal-close">{{ __("Cancel") }}</button>
                            <button type="submit" class="btn btn--base">{{ __("Add") }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endenv
@endif

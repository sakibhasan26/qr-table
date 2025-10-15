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
    ], 'active' => __($page_title)])
@endsection

@section('content')
    <div class="custom-card">
        <div class="card-header">
            <h6 class="title">{{ __($page_title) }}</h6>
        </div>
        <div class="card-body">
            <form class="card-form" method="POST" action="{{ setRoute('admin.support.ticket.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-10-none">
                    <div class="input-fields">
                        <div class="row">
                            <input type="hidden" name="user_type">
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'     => __("Email"),
                                    'label_after'   => "*",
                                    'placeholder'   => __("Write Email").'...',
                                    'name'      => 'email',
                                    'value'     => old('email'),
                                ])
                                <label class="exist text-start"></label>
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group new-user d-none">
                                @include('admin.components.form.input',[
                                    'label'         => __("First Name")."*",
                                    'name'          => "firstname",
                                    'placeholder'   => __("Enter First Name"),
                                    'value'         => old("firstname"),
                                ])
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group new-user d-none">
                                @include('admin.components.form.input',[
                                    'label'         =>__("Last Name")."*",
                                    'name'          => "lastname",
                                    'placeholder'   => __("Enter Last Name"),
                                    'value'         => old("lastname"),
                                ])
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group new-user d-none">
                                <label>{{ __("Password") }}*</label>
                                <div class="input-group">
                                    <input type="text" class="form--control place_random_password @error("password") is-invalid @enderror" placeholder="{{ __('Enter Password') }}" name="password">
                                    <button class="input-group-text rand_password_generator" type="button">{{ __("Generate") }}</button>
                                </div>
                                @error("password")
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'     => __("Subject"),
                                    'label_after'   => "*",
                                    'placeholder'   => __("Write Subject").'...',
                                    'name'      => 'subject',
                                    'value'     => old('subject'),
                                ])
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                @include('admin.components.form.textarea',[
                                    'label'     => __("Message"),
                                    'label_after'   => "*",
                                    'placeholder'   => __("Write Message").'...',
                                    'name'      => 'desc',
                                    'value'     => old('desc'),
                                ])
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <label>{{ __("Attachments") }}</label>
                                <input type="file" name="attachment[]" multiple>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        @include('admin.components.button.form-btn',[
                            'class'         => "w-100 btn-loading",
                            'text'          => "Save",
                            'permission'    => "admin.support.ticket.store",
                        ])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
<script>
    $("input[name=email]").keyup(function(){
        var checkUserURL    = "{{ setRoute('admin.support.ticket.check.user') }}";
        var email           = $(this).val();
        var user            = "{{ support_ticket_const()::USER }}";
        var new_user        = "{{ support_ticket_const()::NEWUSER }}";

        if(email == '' || email == null){
            $('.exist').text('');
        }
        $.post(checkUserURL,{email:email,_token:"{{ csrf_token() }}"},function(response){
            if(response.not_exists){
                if($('.exist').hasClass('text--success')){
                    $('.exist').removeClass('text--success');
                }
                $('.exist').addClass('text--danger').text(response.not_exists);
                $('.new-user').removeClass('d-none');
                $('input[name=user_type]').val(new_user);
                return false
            }
            if(response['data'] != null){
                if($('.exist').hasClass('text--danger')){
                    $('.exist').removeClass('text--danger');
                }
                $('.new-user').addClass('d-none');
                $('.exist').text(`Registered user.`).addClass('text--success');
                $('input[name=user_type]').val(user);
            } else {
                if($('.exist').hasClass('text--success')){
                    $('.exist').removeClass('text--success');
                }
                $('.new-user').removeClass('d-none');
                $('.exist').text('Unregistered user.').addClass('text--danger');
                $('input[name=user_type]').val(new_user);
                return false
            }
        });
    });
</script>
<script>
    function placeRandomPassword(clickedButton,placeInput) {
        $(clickedButton).click(function(){
            var generateRandomPassword = makeRandomString(10);
            $(placeInput).val(generateRandomPassword);
        });
    }
    placeRandomPassword(".rand_password_generator",".place_random_password");
</script>
@endpush

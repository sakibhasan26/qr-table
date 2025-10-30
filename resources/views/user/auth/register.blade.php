@extends('layouts.master')

@push('css')

@endpush

@php
    $select_lang = selectedLang();
    $default_lang = system_default_lang();
    $section_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::REGISTER_SECTION);
    $register = App\Models\Admin\SiteSections::getData($section_slug)->first();
@endphp


@section('content')
    {{-- <section class="account-section bg_img" data-background="{{ asset("public/frontend/images/element/account.png") }}">
        <div class="right float-end">
            <div class="account-header text-center">
                <a class="site-logo" href="{{ route('frontend.index') }}"><img src="{{ get_logo($basic_settings) }}" alt="logo"></a>
            </div>
            <div class="account-middle">
                <div class="account-form-area">
                    <h3 class="title">{{ __('Register Information') }}</h3>
                    <p>{{ __("Please input your details and register to your account to get access to your dashboard.") }}</p>
                    <form action="{{ setRoute('user.register.submit') }}" class="account-form" method="POST">
                        @csrf
                        <div class="row ml-b-20">
                            <div class="col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'name'          => "firstname",
                                    'placeholder'   => "First Name",
                                    'value'         => old("firstname"),
                                ])
                            </div>
                            <div class="col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'name'          => "lastname",
                                    'placeholder'   => "Last Name",
                                    'value'         => old("lastname"),
                                ])
                            </div>
                            <div class="col-lg-6 form-group">
                                <select name="country" class="form--control country-select" data-old="{{ old('country',$user_country) }}">
                                    <option selected disabled>Select Country</option>
                                </select>
                            </div>
                            <div class="col-lg-6 form-group">
                                <div class="input-group">
                                    <div class="input-group-text phone-code">--</div>
                                    <input class="phone-code" type="hidden" name="phone_code" />
                                    <input type="text" class="form--control" placeholder="Enter Phone" name="phone" value="{{ old('phone') }}">
                                </div>
                                @error("phone")
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-12 form-group">
                                @include('admin.components.form.input',[
                                    'type'          => "email",
                                    'name'          => "email",
                                    'placeholder'   => "Email",
                                    'value'         => old("email"),
                                ])
                            </div>
                            <div class="col-lg-12 form-group" id="show_hide_password">
                                <input type="password" class="form--control" name="password" placeholder="Password" required>
                                <a href="javascript:void(0)" class="show-pass"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                @error("password")
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="custom-check-group mb-0">
                                    <input type="checkbox" id="level-1" name="agree">
                                    <label for="level-1" class="mb-0">{{ __("I have read agreed with the") }} <a href="#0" class="text--base">{{ __("Terms Of Use , Privacy Policy & Warning") }}</a></label>
                                </div>
                                @error("agree")
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="btn--base w-100">{{ __("Register Now") }}</button>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="account-item mt-10">
                                    <label>{{ __("Already Have An Account?") }} <a href="{{ setRoute('user.login') }}" class="text--base">{{ _("Login Now") }}</a></label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="account-footer text-center">
                <p>{{ __("Copyright") }} © {{ date("Y",time()) }} {{ __("All Rights Reserved.") }}</a></p>
            </div>
        </div>
    </section> --}}


<div class="user-page-wrapper">
    <div class="container">
        <div class="signup-page-wrapper">
            <div class="row align-items-center">
                <!-- Image Section -->
                <div class="col-lg-6">
                    <div class="user-page-image">
                        <div class="image-overlay"></div>
                        <img src="{{ get_image(@$register?->value?->image ?? '',"site-section") }}" alt="Sign Up" class="img-fluid">
                        <div class="image-content">
                            <div class="logo-container">
                                <a href="{{ url('/') }}">
                                    <img src="{{ get_logo($basic_settings) }}" data-white_img="{{ get_logo($basic_settings,'white') }}" data-dark_img="{{ get_logo($basic_settings,'dark') }}" alt="site-logo">
                                </a>
                            </div>
                            <h2>{{ @$register?->value?->language?->$select_lang->heading ?? $register?->value?->language?->$default_lang->heading }}</h2>
                            <p>{{ @$register?->value?->language?->$select_lang->sub_heading ?? $register?->value?->language?->$default_lang->sub_heading }}</p>
                        </div>
                    </div>
                </div>
                <!-- Form Section -->
                <div class="col-lg-6">
                    <div class="user-page-form">
                        <div class="form-container">
                            <h3 class="form-title">{{ @$register?->value?->language?->$select_lang->form_text ?? $register?->value?->language?->$default_lang->form_text }}</h3>
                            <form {{ setRoute('user.register.submit') }} class="auth-form" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="signup-email">{{ __('Email Address') }} <span>*</span></label>
                                    <input name="email" type="email" id="signup-email" placeholder="Enter your email address">
                                </div>
                                <div class="form-group">
                                    <label for="signup-password">{{ __('Password') }} <span>*</span></label>
                                    <div class="password-input-wrapper">
                                        <input name="password" type="password" id="signup-password" placeholder="Create your password">
                                        <div class="show_hide_password">
                                            <a href="#" class="show-pass">
                                                <i class="fas fa-eye-slash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn--base w-100">{{ __('Create Account') }}</button>
                                </div>
                                <!-- Continue with Google Section -->
                                <div class="social-login-section">
                                    <div class="divider">
                                        <span>{{ __('Or continue with') }}</span>
                                    </div>
                                    <div class="social-buttons">
                                        <button type="button" class="social-btn google-btn">
                                            <img src="{{ asset('public/frontend') }}/images/user-images/google-icon.png" alt="Google">
                                            <span>{{ __('Continue with Google') }}</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-links">
                                    <p>{{ __('Already have an account?') }} <a href="login.html" class="login-link">{{ __('Sign In') }}</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Animated Icons -->
    <div class="floating-icons">
        <span class="icon"><i class="fas fa-pizza-slice"></i></span>
        <span class="icon"><i class="fas fa-hamburger"></i></span>
        <span class="icon"><i class="fas fa-ice-cream"></i></span>
        <span class="icon"><i class="fas fa-coffee"></i></span>
        <span class="icon"><i class="fas fa-cookie"></i></span>
        <span class="icon"><i class="fas fa-apple-alt"></i></span>
        <span class="icon"><i class="fas fa-lemon"></i></span>
        <span class="icon"><i class="fas fa-cheese"></i></span>
    </div>
</div>




@endsection

@push('script')
    <script>
        getAllCountries("{{ setRoute('global.countries') }}",$(".country-select"));
        $(document).ready(function(){
            $("select[name=country]").change(function(){
                var phoneCode = $("select[name=country] :selected").attr("data-mobile-code");
                placePhoneCode(phoneCode);
            });

            setTimeout(() => {
                var phoneCodeOnload = $("select[name=country] :selected").attr("data-mobile-code");
                placePhoneCode(phoneCodeOnload);
            }, 400);
        });
    </script>

@endpush

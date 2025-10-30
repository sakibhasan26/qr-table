
@extends('layouts.master')

@push('css')

@endpush

@php
    $select_lang = selectedLang();
    $default_lang = system_default_lang();
    $section_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::LOGIN_SECTION);
    $login = App\Models\Admin\SiteSections::getData($section_slug)->first();
@endphp


@section('content')
    {{-- <section class="account-section bg_img" data-background="{{ asset('public/frontend/images/element/account.png') }}">
        <div class="right float-end">
            <div class="account-header text-center">
                <a class="site-logo" href="{{ setroute('frontend.index') }}"><img src="{{ asset('public/frontend/images/logo/logo.png') }}" alt="logo"></a>
            </div>
            <div class="account-middle">
                <div class="account-form-area">
                    <h3 class="title">{{ __("Login Information") }}</h3>
                    <p>{{ __("Please input your username and password and login to your account to get access to your dashboard.") }}</p>
                    <form action="{{ setRoute('user.login.submit') }}" class="account-form" method="POST">
                        @csrf
                        <div class="row ml-b-20">
                            <div class="col-lg-12 form-group">
                                @include('admin.components.form.input',[
                                    'name'          => "credentials",
                                    'placeholder'   => "Username OR Email Address",
                                    'required'      => true,
                                ])
                            </div>
                            <div class="col-lg-12 form-group" id="show_hide_password">
                                <input type="password" class="form-control form--control" name="password" placeholder="Password" required>
                                <a href="javascript:void(0)" class="show-pass"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="forgot-item">
                                    <label><a href="{{ setRoute('user.password.forgot') }}" class="text--base">{{ __("Forgot Password?") }}</a></label>
                                </div>
                            </div>
                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="btn--base w-100">{{ __("Login Now") }}</button>
                            </div>
                            <div class="or-area">
                                <span class="or-line"></span>
                                <span class="or-title">{{ __("Or") }}</span>
                                <span class="or-line"></span>
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="account-form-btn">
                                    <a href="{{ setRoute('user.social.auth.facebook') }}" class="facebook">
                                        <svg viewBox="0 0 24 24" width="24" height="24" class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy"><path d="M13.213 5.22c-.89.446-.606 3.316-.606 3.316h3.231v2.907h-3.23v10.359H8.773V11.444H6.39V8.536h2.423c-.221 0 .12-2.845.146-3.114.136-1.428 1.19-2.685 2.544-3.153 1.854-.638 3.55-.286 5.385.17l-.484 2.504s-2.585-.455-3.191.277z"></path></svg>
                                    </a>
                                    <a href="{{ setRoute('user.social.auth.google') }}" class="google">
                                        <svg viewBox="0 0 24 24" width="24" height="24" class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy"><path d="M15.303 8.287l2.26-2.206C16.174 4.791 14.368 4 12.206 4a8 8 0 0 0-7.151 4.412l2.588 2.01c.65-1.93 2.446-3.326 4.563-3.326 1.504 0 2.518.649 3.096 1.191zm4.59 3.897c0-.659-.054-1.139-.17-1.637h-7.516v2.97h4.412c-.089.74-.569 1.851-1.636 2.598l2.526 1.957c1.512-1.396 2.384-3.451 2.384-5.888zm-12.24 1.405a4.928 4.928 0 0 1-.267-1.583c0-.552.098-1.086.258-1.584l-2.588-2.01a8.013 8.013 0 0 0-.854 3.594c0 1.29.311 2.508.854 3.593l2.597-2.01zm4.554 6.422c2.162 0 3.976-.711 5.302-1.939l-2.526-1.957c-.676.472-1.584.8-2.776.8-2.117 0-3.914-1.396-4.554-3.326l-2.588 2.01c1.316 2.615 4.011 4.412 7.142 4.412z"></path></svg>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="account-item mt-10">
                                    <label>{{ __("Don't Have An Account?") }} <a href="{{ setRoute('user.register') }}" class="text--base">{{ __("Register Now") }}</a></label>
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


<!-- Login Page -->
<div class="user-page-wrapper">
    <div class="container">
        <div class="login-page-wrapper">
            <div class="row align-items-center">
                <!-- Image Section -->
                <div class="col-lg-6">
                    <div class="user-page-image">
                        <div class="image-overlay"></div>
                        <img src="{{ get_image(@$login?->value?->image ?? '',"site-section") }}" alt="Login" class="img-fluid">
                        <div class="image-content">
                            <div class="logo-container">
                                <a href="index.html">
                                    <img src="{{ get_logo($basic_settings) }}" data-white_img="{{ get_logo($basic_settings,'white') }}" data-dark_img="{{ get_logo($basic_settings,'dark') }}" alt="site-logo">
                                </a>
                            </div>
                            <h2>{{ @$login?->value?->language?->$select_lang->heading ?? $login?->value?->language?->$default_lang->heading }}</h2>
                            <p>{{ @$login?->value?->language?->$select_lang->sub_heading ?? $login?->value?->language?->$default_lang->sub_heading }}</p>
                        </div>
                    </div>
                </div>
                <!-- Form Section -->
                <div class="col-lg-6">
                    <div class="user-page-form">
                        <div class="form-container">
                            <h3 class="form-title">{{ @$login?->value?->language?->$select_lang->form_text ?? $login?->value?->language?->$default_lang->form_text }}</h3>
                            <form action="{{ setRoute('user.login.submit') }}" method="POST" class="auth-form">
                                <div class="form-group">
                                    <label for="login-email">{{ __('Email') }} <span>*</span></label>
                                    <input type="text" id="login-email" placeholder="{{ __('Enter your email') }}">
                                </div>
                                <div class="form-group">
                                    <label for="login-password">{{ __('Password') }} <span>*</span></label>
                                    <div class="password-input-wrapper">
                                        <input type="password" id="login-password" placeholder="{{ __('Enter your password') }}">
                                        <div class="show_hide_password">
                                            <a href="#" class="show-pass">
                                                <i class="fas fa-eye-slash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn--base w-100">{{ __('Sign In') }}</button>
                                </div>
                                <div class="form-links">
                                    <a href="forget-password.html" class="forgot-pass">{{ __('Forgot Password?') }}</a>
                                    <p>{{ __("Don't have an account?") }} <a href="{{ setRoute('user.register') }}" class="signup-link">{{ __('Sign Up') }}</a></p>
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

@endpush

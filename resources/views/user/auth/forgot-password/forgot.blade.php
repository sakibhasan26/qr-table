
@extends('layouts.master')

@push('css')
    
@endpush

@section('content')
    <section class="account-section bg_img" data-background="{{ asset('public/frontend/images/element/account.png') }}">
        <div class="right float-end">
            <div class="account-header text-center">
                <a class="site-logo" href="{{ setroute('frontend.index') }}"><img src="{{ asset('public/frontend/images/logo/logo.png') }}" alt="logo"></a>
            </div>
            <div class="account-middle">
                <div class="account-form-area">
                    <h3 class="title">{{ __("Password Forgot") }}</h3>
                    <p>{{ __("Enter your account email or username to verify") }}</p>
                    <form action="{{ setRoute('user.password.forgot.send.code') }}" class="account-form" method="POST">
                        @csrf
                        <div class="row ml-b-20">
                            <div class="col-lg-12 form-group">
                                @include('admin.components.form.input',[
                                    'name'          => "credentials",
                                    'placeholder'   => "Username OR Email Address",
                                    'required'      => true,
                                ])
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="forgot-item">
                                    <label><a href="{{ setRoute('user.login') }}" class="text--base">{{ __("Login") }}</a></label>
                                </div>
                            </div>
                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="btn--base w-100">{{ __("Send Code") }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="account-footer text-center">
                <p>{{ __("Copyright") }} © {{ date("Y",time()) }} {{ __("All Rights Reserved.") }}</a></p>
            </div>
        </div>
    </section>
@endsection

@push('script')
    
@endpush
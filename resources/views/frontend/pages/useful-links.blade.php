@extends('frontend.layouts.master')
@php
    $default = selectedLang();
    $default_lang = system_default_lang();
@endphp

@push("css")
    <style>
        .free_plan_button{
            background-color: #61626344;
            color: #000;
            border: 1px solid #f8f9fa;
        }
    </style>
@endpush

@section('content')




<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start privacy-policy
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="privacy-policy-section ptb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="privacy-policy-wrapper">
                    <h2>{{ @$useful_link->title->language->$default->title ?? $useful_link->title->language->$default_lang->title }} </h2>

                    @php
                        echo @$useful_link->content->language->$default->content ?? @$useful_link->content->language->$default_lang->content
                    @endphp

                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End privacy-policy
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


@endsection


@push("script")

@endpush

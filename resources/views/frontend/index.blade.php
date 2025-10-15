@php
    $Select_lang = selectedLang();
    $default_lang = system_default_lang();
@endphp
@extends('frontend.layouts.master')

@push("css")

@endpush

@section('content')

    @include('frontend.partials.components.banner-section')

    @include('frontend.partials.components.brands-section')

    @include('frontend.partials.components.popular-section')

    @include('frontend.partials.components.what-we-serve-section')

    @include('frontend.partials.components.testimonial-section')

    @include('frontend.partials.components.gallery-section')

    @include('frontend.partials.components.download-section')


@endsection


@push("script")

@endpush

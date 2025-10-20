@php
    $select_lang = selectedLang();
    $default_lang = system_default_lang();
@endphp
@extends('frontend.layouts.master')

@push("css")

@endpush

@section('content')

    @foreach ($page_section->sections ?? [] as $item)
        @if ($item->section->key == 'banner-section')
            @include('frontend.partials.components.banner-section')
        @elseif ($item->section->key == 'brand-section')
            @include('frontend.partials.components.brands-section')
        @elseif ($item->section->key == 'discover-section')
            @include('frontend.partials.components.discover-section')
        @elseif ($item->section->key == 'popular-section')
            @include('frontend.partials.components.popular-section')
        @elseif ($item->section->key == 'what-we-serve-section')
            @include('frontend.partials.components.what-we-serve-section')
        @elseif ($item->section->key == 'client-feedback-section')
            @include('frontend.partials.components.testimonial-section')
        @elseif ($item->section->key == 'gallery-section')
            @include('frontend.partials.components.gallery-section')
        @elseif ($item->section->key == 'download-section')
            @include('frontend.partials.components.download-section')
        @elseif ($item->section->key == 'contact-us-section')
            @include('frontend.partials.components.contact-section')
        @elseif ($item->section->key == 'services-section')
            @include('frontend.partials.components.service-section')
        @elseif ($item->section->key == 'menu-banner-section')
            @include('frontend.partials.components.menu-banner-section')
        @elseif ($item->section->key == 'category-wise-item')
            @include('frontend.partials.components.menu-item-section')
        @elseif ($item->section->key == 'reservation-section')
            @include('frontend.partials.components.reservation-section')
        @elseif ($item->section->key == 'reservation-item')
            @include('frontend.partials.components.reservation-item-section')
        @elseif ($item->section->key == 'trusted-brand-section')
            @include('frontend.partials.components.trusted-brand-section')
        @endif
    @endforeach

@endsection


@push("script")

@endpush

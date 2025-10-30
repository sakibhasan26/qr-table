@php
    $select_lang = selectedLang();
    $default_lang = system_default_lang();
@endphp
@extends('frontend.layouts.master')

@push("css")

@endpush

@section('content')

<section class="menu-details-section">
    <div class="container">

        <!-- Snacks Section -->
        <div class="menu-category" id="">
            <div class="row">
                <div class="col-12">
                    <div class="category-content">
                        <h3 class="category-title">{{ __('Search Results') }}</h3>
                        <div class="row">
                            @forelse ($dishes ?? [] as $item)
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                    <div class="dish-card {{ $item->qty <= 0 ? 'sold-out' : '' }}">
                                        <div class="dish-card-image">
                                            <img src="{{ asset('public/frontend') }}/images/dishes-img/sandwich.webp" alt="Classic Burger">
                                            <div class="dish-card-badge {{ $item->qty <= 0 ? 'badge-sold-out' : 'badge-available' }}">Available</div>
                                        </div>
                                        <div class="dish-card-content">
                                            <h3 class="dish-card-title">{{ $item?->data?->language?->$select_lang?->dish_name ?? $item?->data?->language?->$default_lang?->dish_name }}</h3>
                                            <p class="dish-card-price">${{ get_amount(@$item->price) }} {{ get_default_currency_code() }}</p>
                                            <p class="dish-card-description">{{ $item?->data?->language?->$select_lang?->details ?? $item?->data?->language?->$default_lang?->details }}</p>
                                        </div>
                                        <div class="dish-card-actions">
                                            <button class="add-to-cart-btn">Add to Cart</button>
                                            <div class="quantity-controls">
                                                <button class="qty-btn minus-btn">−</button>
                                                <input type="number" class="qty-input" value="1" min="0">
                                                <button class="qty-btn plus-btn">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                             <div><span class="text-center">{{ __("No Data Found") }}</span></div>
                            @endforelse



                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>



@endsection

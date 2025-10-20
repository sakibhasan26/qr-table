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
                        <h3 class="category-title">Search Results</h3>
                        <div class="row">
                            <!-- Dish Card 1 -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="dish-card">
                                    <div class="dish-card-image">
                                        <img src="{{ asset('public/frontend') }}/images/dishes-img/sandwich.webp" alt="Classic Burger">
                                        <div class="dish-card-badge badge-available">Available</div>
                                    </div>
                                    <div class="dish-card-content">
                                        <h3 class="dish-card-title">Classic Burger</h3>
                                        <p class="dish-card-price">$12.99</p>
                                        <p class="dish-card-description">Juicy beef patty with fresh vegetables</p>
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
                            <!-- Dish Card 1 -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="dish-card">
                                    <div class="dish-card-image">
                                        <img src="{{ asset('public/frontend') }}/images/dishes-img/sandwich.webp" alt="Classic Burger">
                                        <div class="dish-card-badge badge-available">Available</div>
                                    </div>
                                    <div class="dish-card-content">
                                        <h3 class="dish-card-title">Classic Burger</h3>
                                        <p class="dish-card-price">$12.99</p>
                                        <p class="dish-card-description">Juicy beef patty with fresh vegetables</p>
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
                            <!-- Dish Card 1 -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="dish-card">
                                    <div class="dish-card-image">
                                        <img src="{{ asset('public/frontend') }}/images/dishes-img/sandwich.webp" alt="Classic Burger">
                                        <div class="dish-card-badge badge-available">Available</div>
                                    </div>
                                    <div class="dish-card-content">
                                        <h3 class="dish-card-title">Classic Burger</h3>
                                        <p class="dish-card-price">$12.99</p>
                                        <p class="dish-card-description">Juicy beef patty with fresh vegetables</p>
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
                            <!-- Dish Card 1 -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="dish-card">
                                    <div class="dish-card-image">
                                        <img src="{{ asset('public/frontend') }}/images/dishes-img/sandwich.webp" alt="Classic Burger">
                                        <div class="dish-card-badge badge-available">Available</div>
                                    </div>
                                    <div class="dish-card-content">
                                        <h3 class="dish-card-title">Classic Burger</h3>
                                        <p class="dish-card-price">$12.99</p>
                                        <p class="dish-card-description">Juicy beef patty with fresh vegetables</p>
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
                            <!-- Dish Card 1 -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="dish-card">
                                    <div class="dish-card-image">
                                        <img src="{{ asset('public/frontend') }}/images/dishes-img/sandwich.webp" alt="Classic Burger">
                                        <div class="dish-card-badge badge-available">Available</div>
                                    </div>
                                    <div class="dish-card-content">
                                        <h3 class="dish-card-title">Classic Burger</h3>
                                        <p class="dish-card-price">$12.99</p>
                                        <p class="dish-card-description">Juicy beef patty with fresh vegetables</p>
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

                            <!-- Dish Card 2 -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="dish-card">
                                    <div class="dish-card-image">
                                        <img src="{{ asset('public/frontend') }}/images/menu/regular-food/veg-thali.webp" alt="Margherita Pizza">
                                        <div class="dish-card-badge badge-available">Available</div>
                                    </div>
                                    <div class="dish-card-content">
                                        <h3 class="dish-card-title">Margherita Pizza</h3>
                                        <p class="dish-card-price">$15.99</p>
                                        <p class="dish-card-description">Fresh tomato, mozzarella and basil</p>
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

                            <!-- Dish Card 3 - Sold Out -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="dish-card sold-out">
                                    <div class="dish-card-image">
                                        <img src="{{ asset('public/frontend') }}/images/dishes-img/caesar-salad.webp" alt="Caesar Salad">
                                        <div class="dish-card-badge badge-sold-out">Sold Out</div>
                                    </div>
                                    <div class="dish-card-content">
                                        <h3 class="dish-card-title">Caesar Salad</h3>
                                        <p class="dish-card-price">$9.99</p>
                                        <p class="dish-card-description">Crisp romaine with Caesar dressing</p>
                                    </div>
                                    <div class="dish-card-actions">
                                        <button class="add-to-cart-btn" disabled>Add to Cart</button>
                                        <div class="quantity-controls">
                                            <button class="qty-btn minus-btn">−</button>
                                            <input type="number" class="qty-input" value="1" min="0">
                                            <button class="qty-btn plus-btn">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Dish Card 4 -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="dish-card">
                                    <div class="dish-card-image">
                                        <img src="https://images.unsplash.com/photo-1563379926898-05f4575a45d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Grilled Salmon">
                                        <div class="dish-card-badge badge-available">Available</div>
                                    </div>
                                    <div class="dish-card-content">
                                        <h3 class="dish-card-title">Grilled Salmon</h3>
                                        <p class="dish-card-price">$18.99</p>
                                        <p class="dish-card-description">Fresh salmon with lemon butter sauce</p>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>



@endsection

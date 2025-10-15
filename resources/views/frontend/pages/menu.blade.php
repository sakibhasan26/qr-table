@extends('frontend.layouts.master')

@push("css")

@endpush

@section('content')


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Menu banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="menu-banner-section ptb-100 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-6 ">
                <div class="section-header">
                    <h2 class="section-title">
                    Crafted with <span>Passion</span>, Served with Perfection
                    </h2>
                </div>
                <div class="offering-info">
                    <div class="offering-header">
                        <h3 class="offering-title">Today's Special Offer</h3>
                        <div class="offering-badge">Limited Time</div>
                    </div>

                    <div class="offering-content">
                        <div class="offer-item animated-item" data-delay="0">
                            <span class="offer-icon">🔥</span>
                            <div class="offer-text">
                                <h4>50% OFF</h4>
                                <p>On all main course items</p>
                            </div>
                        </div>

                        <div class="offer-item animated-item" data-delay="200">
                            <span class="offer-icon">🎁</span>
                            <div class="offer-text">
                                <h4>Free Dessert</h4>
                                <p>With every order above $30</p>
                            </div>
                        </div>
                    </div>

                    <div class="offering-footer">
                        <p class="offering-note">🎉 Hurry up! Offers valid until midnight</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 ">
                <div class="menu-image-robo" data-aos="fade-left" data-aos-duration="1200">
                    <img src="{{ asset('public/frontend') }}/images/banner-images/delivery-robot-working.webp" alt="robo food serving" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Menu banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Menu details
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="menu-details-section">
    <div class="container">
        <!-- Sticky Navigation -->
        <nav class="menu-details-nav" id="menuNav">
            <ul class="nav-links">
                <li class="nav-item">
                    <a href="#snacks" class="nav-link menu-nav-active" data-target="snacks">Snacks</a>
                </li>
                <li class="nav-item">
                    <a href="#breakfast" class="nav-link" data-target="breakfast">Breakfast</a>
                </li>
                <li class="nav-item">
                    <a href="#offers" class="nav-link" data-target="offers">Offer Items</a>
                </li>
                <li class="nav-item">
                    <a href="#specials" class="nav-link" data-target="specials"> Specials</a>
                </li>
            </ul>
        </nav>
        <!-- Snacks Section -->
        <div class="menu-category" id="snacks">
            <div class="row">
                <div class="col-12">
                    <div class="category-content">
                        <h3 class="category-title">Snacks</h3>
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

        <!-- Breakfast Section -->
        <div class="menu-category" id="breakfast">
            <div class="row">
                <div class="col-12">
                    <div class="category-content">
                        <h3 class="category-title">Breakfast</h3>
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

        <!-- Offers Section -->
        <div class="menu-category" id="offers">
            <div class="row">
                <div class="col-12">
                    <div class="category-content">
                        <h3 class="category-title">Offer Items</h3>
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

        <!-- Specials Section -->
        <div class="menu-category" id="specials">
            <div class="row">
                <div class="col-12">
                    <div class="category-content">
                        <h3 class="category-title">QR Table Specials</h3>
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
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Menu details
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start marketting section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="marketing-section">
    <div class="container">
        <div class="text-center top" data-aos="fade-up" data-aos-duration="1200">
            <h3 class="service-heading">QR-Table <span>Services</span></h3>
            <p>Enhance your dining experience with premium QR-powered service features, fast and efficient.</p>
        </div>

        <div class="row mt-50">
            <div class="col-12 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-feature">
                    <div class="feature-badge">
                        <i class="fa-solid fa-utensils"></i>
                    </div>
                    <h4 class="service-name">Table-Side Ordering</h4>
                    <p class="service-description">Order food directly from your seat using our contactless QR-code menu system.</p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-feature">
                    <div class="feature-badge">
                        <i class="fa-solid fa-bell-concierge"></i>
                    </div>
                        <h4 class="service-name">On-Demand Service</h4>
                        <p class="service-description">Request assistance or additional items without leaving your table or waving for staff.</p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="service-feature">
                    <div class="feature-badge">
                        <i class="fa-solid fa-receipt"></i>
                    </div>
                    <h4 class="service-name">Instant Billing</h4>
                    <p class="service-description">View your bill anytime and pay instantly via mobile, reducing wait times and confusion.</p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="service-feature">
                    <div class="feature-badge">
                        <i class="fa-solid fa-thumbs-up"></i>
                    </div>
                    <h4 class="service-name">Customer Feedback</h4>
                    <p class="service-description">Share your dining experience instantly through integrated review and feedback tools.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End marketting section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


@endsection

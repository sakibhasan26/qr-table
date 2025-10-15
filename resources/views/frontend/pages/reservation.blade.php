@extends('frontend.layouts.master')

@push("css")

@endpush

@section('content')


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start reservation Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class=" reservation-banner-section ptb-100 " >
    <div class="container">
        <div class="row align-items-center">

            <!-- Left Content Side -->
            <div class="col-lg-6">
                <div class="section-header">
                    <div class="section-subtitle">
                    <i class="fas fa-utensil-spoon left-icon"></i>
                    <span>Popular dishes </span>
                    <i class="fas fa-wine-glass-alt right-icon"></i>
                    </div>

                    <h2 class="section-title">
                    Crafted with <span>Passion</span>, Served with Perfection
                    </h2>

                    <p class="section-description">
                        QR-powered dining at your fingertips. These are the most-ordered dishes,  optimized for flavor and designed for digital simplicity.
                    </p>
                </div>
            </div>
            <!-- Right QR Code Side -->
            <div class="col-lg-6">
                <div class="banner-visual">
                    <img src="{{ asset('public/frontend') }}/images/banner-images/reservation-banner-image.webp" alt="">
                </div>
            </div>


        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End reservation Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End reservation details
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="reservation-section">
    <div class="container">
        <div class="row">
            <!-- 1. Event Reservation -->
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-right" data-aos-duration="1200">
                <div class="reservation-card">
                    <div class="reservation-image">
                        <img src="{{ asset('public/frontend') }}/images/reservations/event-reservation.webp" alt="Event Reservation">
                    </div>
                    <div class="reservation-card-header">
                        <div class="reservation-price">$24.99</div>
                        <span class="reservation-status available">Available</span>
                    </div>
                    <div class="reservation-card-content">
                        <h3 class="reservation-item-name">Event Reservation</h3>
                        <p class="reservation-item-stats"><i class="fa-solid fa-star"></i> 4.9 (312 Services Taken)</p>
                        <p class="reservation-item-description">Fast and flexible servation options for public, private, or themed events anytime & any where.</p>
                    </div>
                    <button class="btn--base" type="button" class="trigger-btn" data-bs-toggle="modal" data-bs-target="#reservationModal">
                        Book Now
                    </button>
                </div>
            </div>

            <!-- 2. Function Hall Reservation -->
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-right" data-aos-duration="1200">
                <div class="reservation-card">
                    <div class="reservation-image">
                        <img src="{{ asset('public/frontend') }}/images/reservations/wdding-hall.webp" alt="Function Hall Reservation">
                    </div>
                    <div class="reservation-card-header">
                        <div class="reservation-price">$32.99</div>
                        <span class="reservation-status available">Available</span>
                    </div>
                    <div class="reservation-card-content">
                        <h3 class="reservation-item-name">Function Hall Reservation</h3>
                        <p class="reservation-item-stats"><i class="fa-solid fa-star"></i> 4.8 (229 Services Taken)</p>
                        <p class="reservation-item-description">Secure the perfect venue for your next function with quick hall servation support to make your event remarkable.</p>
                    </div>
                    <button class="btn--base" type="button" class="trigger-btn" data-bs-toggle="modal" data-bs-target="#reservationModal">
                        Book Now
                    </button>
                </div>
            </div>

            <!-- 3. VIP Dining Slot -->
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-left" data-aos-duration="1200">
                <div class="reservation-card">
                    <div class="reservation-image">
                        <img src="{{ asset('public/frontend') }}/images/reservations/vip-dining-sliot.webp" alt="VIP Dining Slot">
                    </div>
                    <div class="reservation-card-header">
                        <div class="reservation-price">$45.99</div>
                        <span class="reservation-status available">Available</span>
                    </div>
                    <div class="reservation-card-content">
                        <h3 class="reservation-item-name">VIP Dining Slot</h3>
                        <p class="reservation-item-stats"><i class="fa-solid fa-star"></i> 4.9 (172 Services Taken)</p>
                        <p class="reservation-item-description">Exclusive servation experience with privacy, luxury, and personalized service included.</p>
                    </div>
                    <button class="btn--base" type="button" class="trigger-btn" data-bs-toggle="modal" data-bs-target="#reservationModal">
                        Book Now
                    </button>
                </div>
            </div>

            <!-- 4. Outdoor Event Booking -->
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-left" data-aos-duration="1200">
                <div class="reservation-card">
                    <div class="reservation-image">
                        <img src="{{ asset('public/frontend') }}/images/reservations/outdoor-event.webp" alt="Outdoor Event Booking">
                    </div>
                    <div class="reservation-card-header">
                        <div class="reservation-price">$28.99</div>
                        <span class="reservation-status not-available">Unavailable</span>
                    </div>
                    <div class="reservation-card-content">
                        <h3 class="reservation-item-name">Outdoor Event Booking</h3>
                        <p class="reservation-item-stats"><i class="fa-solid fa-star"></i> 4.7 (198 Services Taken)</p>
                        <p class="reservation-item-description">Arrange open-air servations with scenic backdrops and stress-free planning options.These could be best choice.</p>
                    </div>
                    <button class="btn--base"   data-bs-toggle="modal" data-bs-target="#reservationModal">
                        Book Now
                    </button>
                </div>
            </div>
            <!-- 1. Event Reservation -->
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-right" data-aos-duration="1200">
                <div class="reservation-card">
                    <div class="reservation-image">
                        <img src="{{ asset('public/frontend') }}/images/reservations/event-reservation.webp" alt="Event Reservation">
                    </div>
                    <div class="reservation-card-header">
                        <div class="reservation-price">$24.99</div>
                        <span class="reservation-status available">Available</span>
                    </div>
                    <div class="reservation-card-content">
                        <h3 class="reservation-item-name">Event Reservation</h3>
                        <p class="reservation-item-stats"><i class="fa-solid fa-star"></i> 4.9 (312 Services Taken)</p>
                        <p class="reservation-item-description">Fast and flexible servation options for public, private, or themed events anytime & any where.</p>
                    </div>
                    <button class="btn--base" type="button" class="trigger-btn" data-bs-toggle="modal" data-bs-target="#reservationModal">
                        Book Now
                    </button>
                </div>
            </div>

            <!-- 2. Function Hall Reservation -->
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-right" data-aos-duration="1200">
                <div class="reservation-card">
                    <div class="reservation-image">
                        <img src="{{ asset('public/frontend') }}/images/reservations/wdding-hall.webp" alt="Function Hall Reservation">
                    </div>
                    <div class="reservation-card-header">
                        <div class="reservation-price">$32.99</div>
                        <span class="reservation-status available">Available</span>
                    </div>
                    <div class="reservation-card-content">
                        <h3 class="reservation-item-name">Function Hall Reservation</h3>
                        <p class="reservation-item-stats"><i class="fa-solid fa-star"></i> 4.8 (229 Services Taken)</p>
                        <p class="reservation-item-description">Secure the perfect venue for your next function with quick hall servation support to make your event remarkable.</p>
                    </div>
                    <button class="btn--base" type="button" class="trigger-btn" data-bs-toggle="modal" data-bs-target="#reservationModal">
                        Book Now
                    </button>
                </div>
            </div>

            <!-- 3. VIP Dining Slot -->
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-left" data-aos-duration="1200">
                <div class="reservation-card">
                    <div class="reservation-image">
                        <img src="{{ asset('public/frontend') }}/images/reservations/vip-dining-sliot.webp" alt="VIP Dining Slot">
                    </div>
                    <div class="reservation-card-header">
                        <div class="reservation-price">$45.99</div>
                        <span class="reservation-status available">Available</span>
                    </div>
                    <div class="reservation-card-content">
                        <h3 class="reservation-item-name">VIP Dining Slot</h3>
                        <p class="reservation-item-stats"><i class="fa-solid fa-star"></i> 4.9 (172 Services Taken)</p>
                        <p class="reservation-item-description">Exclusive servation experience with privacy, luxury, and personalized service included.</p>
                    </div>
                    <button class="btn--base" type="button" class="trigger-btn" data-bs-toggle="modal" data-bs-target="#reservationModal">
                        Book Now
                    </button>
                </div>
            </div>

            <!-- 4. Outdoor Event Booking -->
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-left" data-aos-duration="1200">
                <div class="reservation-card">
                    <div class="reservation-image">
                        <img src="{{ asset('public/frontend') }}/images/reservations/outdoor-event.webp" alt="Outdoor Event Booking">
                    </div>
                    <div class="reservation-card-header">
                        <div class="reservation-price">$28.99</div>
                        <span class="reservation-status not-available">Unavailable</span>
                    </div>
                    <div class="reservation-card-content">
                        <h3 class="reservation-item-name">Outdoor Event Booking</h3>
                        <p class="reservation-item-stats"><i class="fa-solid fa-star"></i> 4.7 (198 Services Taken)</p>
                        <p class="reservation-item-description">Arrange open-air servations with scenic backdrops and stress-free planning options.These could be best choice.</p>
                    </div>
                    <button class="btn--base"   data-bs-toggle="modal" data-bs-target="#reservationModal">
                        Book Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End reservation details
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<section class="trust-gained-section section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-10">
                <div class="section-header text-center">
                    <h2 class="section-title">Trusted by Leading <span>Brands</span> </h2>
                    <p class="section-subtitle">We're proud to work with industry leaders</p>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="row align-items-center justify-content-center">
                    <!-- Brand Logo 1 -->
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-4 ">
                        <div class="brand-card">
                            <a href="#" class="brand-logo-link">
                                <img src="{{ asset('public/frontend') }}/images/brands/bandai_871362.png" alt="Brand 1" class="brand-logo">
                            </a>
                        </div>
                    </div>

                    <!-- Brand Logo 2 -->
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-4 ">
                        <div class="brand-card">
                            <a href="#" class="brand-logo-link">
                                <img src="{{ asset('public/frontend') }}/images/brands/bebo_3670268.png" alt="Brand 2" class="brand-logo">
                            </a>
                        </div>
                    </div>

                    <!-- Brand Logo 3 -->
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-4 ">
                        <div class="brand-card">
                            <a href="#" class="brand-logo-link">
                                <img src="{{ asset('public/frontend') }}/images/brands/bravo_18388809.png" alt="Brand 3" class="brand-logo">
                            </a>
                        </div>
                    </div>

                    <!-- Brand Logo 4 -->
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-4 ">
                        <div class="brand-card">
                            <a href="#" class="brand-logo-link">
                                <img src="assets/images/brands/bridgestone_5977577.png" alt="Brand 4" class="brand-logo">
                            </a>
                        </div>
                    </div>

                    <!-- Brand Logo 5 -->
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-4 ">
                        <div class="brand-card">
                            <a href="#" class="brand-logo-link">
                                <img src="assets/images/brands/habbo_4926557.png" alt="Brand 5" class="brand-logo">
                            </a>
                        </div>
                    </div>
                    <!-- Brand Logo 1 -->
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-4 ">
                        <div class="brand-card">
                            <a href="#" class="brand-logo-link">
                                <img src="assets/images/brands/bandai_871362.png" alt="Brand 1" class="brand-logo">
                            </a>
                        </div>
                    </div>

                    <!-- Brand Logo 2 -->
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-4 ">
                        <div class="brand-card">
                            <a href="#" class="brand-logo-link">
                                <img src="assets/images/brands/bebo_3670268.png" alt="Brand 2" class="brand-logo">
                            </a>
                        </div>
                    </div>

                    <!-- Brand Logo 3 -->
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-4 ">
                        <div class="brand-card">
                            <a href="#" class="brand-logo-link">
                                <img src="assets/images/brands/bravo_18388809.png" alt="Brand 3" class="brand-logo">
                            </a>
                        </div>
                    </div>

                    <!-- Brand Logo 4 -->
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-4 ">
                        <div class="brand-card">
                            <a href="#" class="brand-logo-link">
                                <img src="assets/images/brands/bridgestone_5977577.png" alt="Brand 4" class="brand-logo">
                            </a>
                        </div>
                    </div>

                    <!-- Brand Logo 5 -->
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-4 ">
                        <div class="brand-card">
                            <a href="#" class="brand-logo-link">
                                <img src="assets/images/brands/habbo_4926557.png" alt="Brand 5" class="brand-logo">
                            </a>
                        </div>
                    </div>



                    <!-- Continue for brand9 to brand16 with same structure -->
                </div>
            </div>
        </div>


    </div>
</section>

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Reservation Modal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="reservationModalLabel">Make a Reservation</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="reservation-modal-content">
                    <!-- Left Side: Image & Details -->
                    <div class="reservation-details">
                        <div class="reservation-image">
                            <img src="assets/images/reservations/event-reservation.webp" alt="Event Reservation">
                        </div>
                        <div class="reservation-info">
                            <h3>Event Reservation</h3>
                            <p>Fast and flexible servation options for public, private, or themed events anytime & any where.</p>
                            <div class="reservation-meta">
                                <div class="price">$24.99</div>
                                <span class="status available">Available</span>
                            </div>
                            <div class="reservation-rating">
                                <i class="fa-solid fa-star"></i> 4.9 (312 Services Taken)
                            </div>
                        </div>
                        <div class="social-share">
                            <h4>Share This</h4>
                            <div class="social-links">
                                <a href="#" class="social-link facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-link twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="social-link linkedin">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="social-link whatsapp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side: Booking Form -->
                    <div class="reservation-form">
                        <form id="bookingForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName">First Name *</label>
                                    <input type="text" id="firstName" name="firstName" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastName">Last Name *</label>
                                    <input type="text" id="lastName" name="lastName" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="reservationDate">Reservation Date *</label>
                                    <input type="date" id="reservationDate" name="reservationDate" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="reservationTime">Reservation Time *</label>
                                    <select id="reservationTime" name="reservationTime" required>
                                        <option value="">Select Time</option>
                                        <option value="09:00">9:00 AM</option>
                                        <option value="10:00">10:00 AM</option>
                                        <option value="11:00">11:00 AM</option>
                                        <option value="12:00">12:00 PM</option>
                                        <option value="13:00">1:00 PM</option>
                                        <option value="14:00">2:00 PM</option>
                                        <option value="15:00">3:00 PM</option>
                                        <option value="16:00">4:00 PM</option>
                                        <option value="17:00">5:00 PM</option>
                                        <option value="18:00">6:00 PM</option>
                                        <option value="19:00">7:00 PM</option>
                                        <option value="20:00">8:00 PM</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="guests">Number of Guests *</label>
                                <select id="guests" name="guests" required>
                                <option value="">Select Guests</option>
                                <option value="1">1 Person</option>
                                <option value="2">2 People</option>
                                <option value="3">3 People</option>
                                <option value="4">4 People</option>
                                <option value="5">5 People</option>
                                <option value="6">6 People</option>
                                <option value="7">7 People</option>
                                <option value="8">8 People</option>
                                <option value="9">9+ People</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="specialRequests">Special Requests</label>
                            <textarea id="specialRequests" name="specialRequests" rows="4" placeholder="Any special requirements or preferences..."></textarea>
                        </div>

                        <button type="submit" class="btn--base w-100">Complete Reservation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Reservation Modal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

@include('frontend.partials.components.marketing-section')


@endsection

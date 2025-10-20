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




@endsection

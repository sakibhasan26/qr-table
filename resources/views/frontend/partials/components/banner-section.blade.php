@php
    $section_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::BANNER_SECTION);
    $banner = App\Models\Admin\SiteSections::getData($section_slug)->first();
    $tagline = preg_replace('/\[(.*?)\]/', '<span class="color--base">$1</span>', e(@$banner?->value?->language?->$Select_lang->heading ?? $banner?->value?->language?->$default_lang->heading ?? ''));
@endphp

<section class="banner-section" style="background-image: url('{{ get_image(@$banner?->value?->background_image ?? '',"site-section") }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row align-items-center">
          <!-- Right QR Code Side -->
            <div class="col-lg-6">
                <div class="banner-visual">
                    <div class="qr-container">
                        <div class="qr-code">
                            <img src="{{ get_image(@$banner?->value?->image ?? '',"site-section") }}" alt="">
                        </div>
                        <div class="scan-text bounce-shadow " class="trigger-btn" data-target="userCanvas">
                            {{ $banner?->value?->language?->$Select_lang->qr_code_title ?? $banner?->value?->language?->$default_lang->qr_code_title  }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Left Content Side -->
            <div class="col-lg-6">
                <div class="banner-content">

                    <h1 class="banner-title">{!! $tagline !!}</h1>

                    <p class="banner-description">{{ @$banner?->value?->language?->$Select_lang->sub_heading ?? @$banner?->value?->language?->$default_lang->sub_heading  }}</p>

                    <!-- Coupon Cards -->
                    <div class="coupon-cards">
                        <div class="coupon-card">
                            <div class="discount-badge">{{ @$banner?->value?->language?->$Select_lang->left_card_discount ?? @$banner?->value?->language?->$default_lang->left_card_discount  }}</div>
                            <div class="card-content">
                                <p>{{ $banner?->value?->language?->$Select_lang->left_card_title ?? $banner?->value?->language?->$default_lang->left_card_title  }}</p>
                                <div class="coupon-code">{{ @$banner?->value?->language?->$Select_lang->left_card_number ?? @$banner?->value?->language?->$default_lang->left_card_number  }}</div>
                            </div>
                        </div>
                        <div class="coupon-card">
                            <div class="discount-badge">{{ @$banner?->value?->language?->$Select_lang->right_card_discount ?? @$banner?->value?->language?->$default_lang->right_card_discount  }}</div>
                            <div class="card-content">
                                <p>{{ $banner?->value?->language?->$Select_lang->right_card_title ?? @$banner?->value?->language?->$default_lang->right_card_title  }}</p>
                                <div class="coupon-code">{{ $banner?->value?->language?->$Select_lang->right_card_number ?? @$banner?->value?->language?->$default_lang->right_card_number  }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="contact-info">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="{{ @$banner?->value?->language?->$Select_lang->bottom_left_card_icon ?? @$banner?->value?->language?->$default_lang->bottom_left_card_icon  }}"></i>
                            </div>
                            <div class="contact-content">
                                <span class="contact-label">{{ @$banner?->value?->language?->$Select_lang->bottom_left_card_title ?? @$banner?->value?->language?->$default_lang->bottom_left_card_title  }}</span>
                                <span class="contact-number">{{ @$banner?->value?->language?->$Select_lang->bottom_left_card_number ?? @$banner?->value?->language?->$default_lang->bottom_left_card_number  }}</span>
                            </div>
                            <div class="contact-hover-effect"></div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-content">
                                <span class="contact-label">{{ @$banner?->value?->language?->$Select_lang->bottom_right_card_title ?? @$banner?->value?->language?->$default_lang->bottom_right_card_title  }}</span>
                                <span class="contact-availability ">{{ @$banner?->value?->language?->$Select_lang->bottom_right_card_number ?? @$banner?->value?->language?->$default_lang->bottom_right_card_number  }}</span>
                            </div>
                            <div class="contact-hover-effect"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

@php
    $section_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::RESERVATION_SECTION);
    $reservation = App\Models\Admin\SiteSections::getData($section_slug)->first();
    $tagline = preg_replace('/\[(.*?)\]/', '<span class="color--base">$1</span>', e(@$reservation?->value?->language?->$select_lang->title ?? $reservation?->value?->language?->$default_lang->title ?? ''));
@endphp

<section class="reservation-banner-section ptb-100">
    <div class="container">
        <div class="row align-items-center">

            <!-- Left Content Side -->
            <div class="col-lg-6">
                <div class="section-header">
                    <div class="section-subtitle">
                    <i class="fas fa-utensil-spoon left-icon"></i>
                    <span> {{ @$reservation?->value?->language?->$select_lang->heading ?? $reservation?->value?->language?->$default_lang->heading }} </span>
                    <i class="fas fa-wine-glass-alt right-icon"></i>
                    </div>

                    <h2 class="section-title">
                        {!! @$tagline !!}
                    </h2>

                    <p class="section-description">
                        {{ @$reservation?->value?->language?->$select_lang->details ?? $reservation?->value?->language?->$default_lang->details }}
                    </p>
                </div>
            </div>
            <!-- Right QR Code Side -->
            <div class="col-lg-6">
                <div class="banner-visual">
                    <img src="{{ get_image(@$reservation?->value?->image ?? '',"site-section") }}" alt="">
                </div>
            </div>


        </div>
    </div>
</section>

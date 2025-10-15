@php
    $section_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::DOWNLOAD_SECTION);
    $download = App\Models\Admin\SiteSections::getData($section_slug)->first();
    $tagline = preg_replace('/\[(.*?)\]/', '<span class="color--base">$1</span>', e(@$download?->value?->language?->$Select_lang->title ?? @$download?->value?->language?->$default_lang->title ?? ''));
@endphp
<section class="app-available-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Text Content Column -->
            <div class="col-lg-6 col-12">
                <div class="app-available-content" data-aos="fade-right" data-aos-duration="1200">
                    <h3 class="app-available-title">
                        {!! $tagline !!}
                    </h3>
                    <p class="app-available-description">
                        {{ @$download?->value?->language?->$Select_lang->heading ?? @$download?->value?->language?->$default_lang->heading }}
                    </p>

                    <div class="app-download-links">
                        <a href="#" class="app-store-link">
                            <img src="{{ get_image(@$download?->value?->images?->app_store ?? '',"site-section") }}" alt="Download on App Store">
                        </a>
                        <a href="#" class="app-store-link">
                            <img src="{{ get_image(@$download?->value?->images?->google_play ?? '',"site-section") }}" alt="Download on Play Store">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Image Column -->
            <div class="col-lg-6 col-12">
                <div class="app-available-image" data-aos="fade-left" data-aos-duration="1200">
                    <img src="{{ get_image(@$download?->value?->images->home_image ?? '',"site-section") }}" alt="QR Table App Preview" class="app-preview-image">
                </div>
            </div>

        </div>
    </div>
</section>

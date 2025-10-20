@php
    $section_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::SERVICES_SECTION);
    $services = App\Models\Admin\SiteSections::getData($section_slug)->first();
    $tagline = preg_replace('/\[(.*?)\]/', '<span class="color--base">$1</span>', e(@$services?->value?->language?->$select_lang->sub_heading ?? $services?->value?->language?->$default_lang->sub_heading ?? ''));
@endphp

<section class="marketing-section">
    <div class="container">
        <div class="text-center top" data-aos="fade-up" data-aos-duration="1200">
            <h3 class="service-heading">
                {!! @$tagline !!}
            </h3>
            <p>{{ @$services?->value?->language?->$select_lang->heading ?? $services?->value?->language?->$default_lang->heading }}</p>
        </div>

        <div class="row mt-50">

            @forelse ($services?->value?->items ?? [] as $item)
                <div class="col-12 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-feature">
                        <div class="feature-badge">
                            <i class="{{ @$item?->icon }}"></i>
                        </div>
                        <h4 class="service-name">{{ @$item?->language?->$select_lang->title ?? $item?->language?->$default_lang->title }}</h4>
                        <p class="service-description">{{ @$item?->language?->$select_lang->description ?? $item?->language?->$default_lang->description }}</p>
                    </div>
                </div>
            @empty
                <div><span class="text-center">{{ __("No Data Found") }}</span></div>
            @endforelse





        </div>
    </div>
</section>

@php
    $section_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::TRUSTED_BRANDS_SECTION);
    $trusted_brand = App\Models\Admin\SiteSections::getData($section_slug)->first();
    $tagline = preg_replace('/\[(.*?)\]/', '<span class="color--base">$1</span>', e(@$trusted_brand?->value?->language?->$select_lang->title ?? $trusted_brand?->value?->language?->$default_lang->title ?? ''));
@endphp

<section class="trust-gained-section section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-10">
                <div class="section-header text-center">
                    <h2 class="section-title">
                        {!! @$tagline !!}
                    </h2>
                    <p class="section-subtitle">{{ @$trusted_brand?->value?->language?->$select_lang->heading ?? $trusted_brand?->value?->language?->$default_lang->heading }}</p>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="row align-items-center justify-content-center">
                    @forelse ($trusted_brand?->value?->items ?? [] as $item)
                        <!-- Brand Logo 1 -->
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-4 ">
                            <div class="brand-card">
                                <a href="#" class="brand-logo-link">
                                    <img src="{{ get_image(@$item->image ?? '',"site-section") }}" alt="Brand 1" class="brand-logo">
                                </a>
                            </div>
                        </div>

                    @empty
                        <div><span class="text-center">{{ __("No Data Found") }}</span></div>
                    @endforelse





                    <!-- Continue for brand9 to brand16 with same structure -->
                </div>
            </div>
        </div>


    </div>
</section>

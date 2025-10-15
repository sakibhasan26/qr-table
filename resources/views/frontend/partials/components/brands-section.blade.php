

@php
    $section_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::BRAND_SECTION);
    $brand = App\Models\Admin\SiteSections::getData($section_slug)->first();
@endphp
<section class="brands-section">
    <div class="brands-scroll-container">
        <div class="brands-track">
            @forelse ($brand?->value?->items ?? [] as $item)

                <div class="brand-item">
                    <img width="140px" src="{{ get_image(@$item->image ?? '',"site-section") }}" alt="brand">
                </div>

            @empty
                <div><span class="text-center">{{ __("No Data Found") }}</span></div>
            @endforelse


        </div>
    </div>
</section>

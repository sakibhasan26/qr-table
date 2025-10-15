@php
    $section_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::GALLERY_SECTION);
    $gallery = App\Models\Admin\SiteSections::getData($section_slug)->first();
    $tagline = preg_replace('/\[(.*?)\]/', '<span class="color--base">$1</span>', e(@$gallery?->value?->language?->$Select_lang->section_title ?? @$gallery?->value?->language?->$default_lang->section_title ?? ''));
@endphp

<section class="gallery-section ptb-80 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-header">
                    <h2 class="section-title">
                        {!! $tagline !!}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row g-3">
             @forelse ($gallery?->value?->items ?? [] as $item)

                <div class="col-xl-3 col-md-3 col-sm-6 col-12 ">
                    <div class="gallery-item">
                        <div class="image-container">
                            <img src="{{ get_image(@$item->image ?? '',"site-section") }}"
                                class="img-fluid" alt="Coleslaw Salad" loading="lazy">
                            <div class="dish-name">{{ $item?->language?->$Select_lang->title ?? @$item?->language?->$default_lang->title }}</div>
                        </div>
                    </div>
                </div>

            @empty
                <div><span class="text-center">{{ __("No Data Found") }}</span></div>
            @endforelse


        </div>
    </div>
</section>

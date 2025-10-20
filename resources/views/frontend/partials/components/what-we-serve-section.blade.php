@php
    $section_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::WHAT_WE_SERVE_SECTION);
    $serve = App\Models\Admin\SiteSections::getData($section_slug)->first();
    $tagline = preg_replace('/\[(.*?)\]/', '<span class="color--base">$1</span>', e(@$serve?->value?->language?->$select_lang->heading ?? @$serve?->value?->language?->$default_lang->heading ?? ''));
@endphp

<section class="what-we-serve ptb-100 ">
  <div class="container">
    <div class="section-header">
      <div class="section-subtitle">
        <i class="fas fa-utensil-spoon left-icon"></i>
        <span>{{ @$serve?->value?->language?->$select_lang->title ?? @$serve?->value?->language?->$default_lang->title }} </span>
        <i class="fas fa-wine-glass-alt right-icon"></i>
      </div>

      <h2 class="section-title">
        {!! $tagline !!}
      </h2>

      <p class="section-description">
        {{ @$serve?->value?->language?->$select_lang->sub_heading ?? @$serve?->value?->language?->$default_lang->sub_heading }}
      </p>
    </div>

    <div class="row">

        @forelse ($serve?->value?->items ?? [] as $item)
            <!-- Card 1 -->
            <div class="col-xl-4 col-lg-3 col-md-4  mb-4">
                <div class="serve-item-card">
                <div class="serve-item-header">
                    <div class="serve-icon">
                    <i class="{{ @$item?->icon ?? @$item?->icon }}"></i>
                    </div>
                    <h3 class="serve-heading">{{ @$item?->language?->$select_lang->title ?? @$item?->language?->$default_lang->title }}</h3>
                </div>
                <p class="serve-description">
                    {{ @$item?->language?->$select_lang->description ?? @$item?->language?->$default_lang->description }} </p>
                </div>
            </div>

        @empty
            <div><span class="text-center">{{ __("No Data Found") }}</span></div>
        @endforelse

    </div>
  </div>
</section>

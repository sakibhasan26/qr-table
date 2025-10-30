@php
    $section_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::DISCOVER_SECTION);
    $discover = App\Models\Admin\SiteSections::getData($section_slug)->first();
    $tagline = preg_replace('/\[(.*?)\]/', '<span class="color--base">$1</span>', e(@$discover?->value?->language?->$select_lang->heading ?? $discover?->value?->language?->$default_lang->heading ?? ''));
    $category = App\Models\Admin\Category::where('status',1)->get();
@endphp

<section class="search-section ptb-100">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left Column - Search Content -->
      <div class="col-xl-6 col-md-6">
        <div class="search-content">
          <!-- Section Header -->
          <div class="section-header">
            <div class="section-subtitle">
              <i class="fas fa-utensil-spoon left-icon"></i>
              <span>{{ @$discover?->value?->language?->$select_lang->title ?? $discover?->value?->language?->$default_lang->title }}</span>
              <i class="fas fa-wine-glass-alt right-icon"></i>
            </div>

            <h2 class="section-title">
              {!! @$tagline !!}
            </h2>

            <p class="section-description">
              {{ @$discover?->value?->language?->$select_lang->sub_heading ?? $discover?->value?->language?->$default_lang->sub_heading }}
            </p>
          </div>

            <!-- Search Form -->
            <div class="search-form">
                <div class="input-group">
                    <form action="{{ route('frontend.search') }}" method="GET" class="w-100">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="{{ @$discover?->value?->language?->$select_lang->search_placeholder ?? $discover?->value?->language?->$default_lang->search_placeholder }}">
                                <button class="btn btn-search" type="submit">
                                <i class="{{ @$discover?->value?->language?->$select_lang->search_icon ?? $discover?->value?->language?->$default_lang->search_icon }}"></i>
                                </button>
                        </div>
                    </form>
                </div>
            </div>


          <!-- Search Tags -->
          <div class="search-tags">
            <h4>{{ __('Popular Tags:') }}</h4>
            <div class="tags-container">
                @foreach ($category ?? [] as $item)
                    <a href="{{ route('frontend.menu'). '#'. @$item->slug }}" class="tag">{{ @$item->data->language->$select_lang->name ?? $item->data->language->$default_lang->name }}</a>
                @endforeach


            </div>
          </div>
        </div>
      </div>

      <!-- Right Column - Image -->
      <div class="col-xl-6 col-md-6">
        <div class="search-image-robo" data-aos="fade-left" data-aos-duration="1200">
          <img src="{{ get_image(@$discover?->value?->image ?? '',"site-section") }}" alt="Delicious food selection" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</section>

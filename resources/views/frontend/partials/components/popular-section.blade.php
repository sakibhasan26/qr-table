@php
    $section_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::POPULAR_SECTION);
    $popular = App\Models\Admin\SiteSections::getData($section_slug)->first();
    $tagline = preg_replace('/\[(.*?)\]/', '<span class="color--base">$1</span>', e(@$popular?->value?->language?->$select_lang->heading ?? @$popular?->value?->language?->$default_lang->heading ?? ''));

    $dishes = App\Models\Admin\Dishes::where('popular', 1)->where('status', 1)->take(8)->get();


@endphp

<section class="popular-dishes ptb-100">
  <div class="container">
      <div class="section-header">
        <div class="section-subtitle">
          <i class="fas fa-utensil-spoon left-icon"></i>
          <span> {{ @$popular?->value?->language?->$select_lang->title ?? @$popular?->value?->language?->$default_lang->title }} </span>
          <i class="fas fa-wine-glass-alt right-icon"></i>
        </div>

        <h2 class="section-title">
          {!! @$tagline !!}

        </h2>

        <p class="section-description">
        {{ @$popular?->value?->language?->$select_lang->sub_heading ?? @$popular?->value?->language?->$default_lang->sub_heading }}     </p>
      </div>

      <div class="row">

        @forelse ($dishes ?? [] as $item)
            <!-- Dish Card 2 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
              <div class="dish-card {{ $item->qty <= 0 ? 'sold-out' : '' }}">
                  <div class="dish-card-image">
                      <img src="{{ get_image(@$item->image ?? '',"dishes") }}" alt="Margherita Pizza">
                      <div class="dish-card-badge badge-available">
                        {{ $item->qty <= 0 ? __('Sold Out') : __('Available') }}
                      </div>
                  </div>
                  <div class="dish-card-content">
                      <h3 class="dish-card-title">{{ $item?->data?->language?->$select_lang?->dish_name ?? $item?->data?->language?->$default_lang?->dish_name }}</h3>
                      <p class="dish-card-price">{{ get_amount(@$item->price) }} {{ get_default_currency_code() }}</p>
                      <p class="dish-card-description">{{ $item?->data?->language?->$select_lang?->details ?? $item?->data?->language?->$default_lang?->details }}</p>
                  </div>
                  <div class="dish-card-actions">
                      <button class="add-to-cart-btn">Add to Cart</button>
                      <div class="quantity-controls">
                          <button class="qty-btn minus-btn">−</button>
                          <input type="number" class="qty-input" value="1" min="0">
                          <button class="qty-btn plus-btn">+</button>
                      </div>
                  </div>
              </div>
            </div>
        @empty
            <div><span class="text-center">{{ __("No Data Found") }}</span></div>
        @endforelse


      </div>
  </div>
</section>

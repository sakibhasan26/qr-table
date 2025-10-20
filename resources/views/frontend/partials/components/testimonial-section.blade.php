@php
    $section_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::CLIENT_FEEDBACK_SECTION);
    $feedback = App\Models\Admin\SiteSections::getData($section_slug)->first();
    $tagline = preg_replace('/\[(.*?)\]/', '<span class="color--base">$1</span>', e(@$feedback?->value?->language?->$select_lang->heading ?? @$feedback?->value?->language?->$default_lang->heading ?? ''));
@endphp
<section class="testimonial-section ptb-100 ">
    <div class="container">
        <div class="section-header">
            <div class="section-subtitle">
                <i class="fas fa-utensil-spoon left-icon"></i>
                <span>{{ @$feedback?->value?->language?->$select_lang->title ?? @$feedback?->value?->language?->$default_lang->title }}</span>
                <i class="fas fa-wine-glass-alt right-icon"></i>
            </div>

            <h2 class="section-title">
                {!! @$tagline !!}
            </h2>

            <p class="section-description">
                {{ @$feedback?->value?->language?->$select_lang->sub_heading ?? @$feedback?->value?->language?->$default_lang->sub_heading }}
            </p>
        </div>

        <div class="testimonial-slider ">
            <div class="slider-wrapper pt-50 ">
                <div class="testimonial-track">
                    @forelse (@$feedback->value->items as $item)
                        <div class="testimonial-card">
                            <div class="card-content">
                                <div class="rating">
                                    @for ($i = 0; $i < ($item->star ?? 0); $i++)
                                        <span class="star">★</span>
                                    @endfor
                                </div>
                                <p class="testimonial-text">"Outstanding results! Our productivity increased by 40% after implementing their solutions."</p>
                                <div class="client-info">
                                    <div class="author-image">
                                        <img src="{{ get_image(@$item?->image ?? '',"site-section") }}" alt="Emily Rodriguez">
                                    </div>
                                    <div class="author-details">
                                        <h4 class="client-name"> {{ @$item->name }}</h4>
                                        <p class="client-role">{{ @$item->designation }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                      <div class="no-data-found">
                          <span class="text-center text--danger">{{ __('No Data Found') }}</span>
                      </div>
                    @endforelse


                </div>
            </div>

            <div class="testimonial-pagination">
                <div class="bullet active" data-slide="0"></div>
                <div class="bullet" data-slide="1"></div>
                <div class="bullet" data-slide="2"></div>
            </div>
        </div>
    </div>
</section>

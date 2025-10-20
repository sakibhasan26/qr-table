@php
    $section_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::MENU_BANNER_SECTION);
    $menu_banner = App\Models\Admin\SiteSections::getData($section_slug)->first();
    $tagline = preg_replace('/\[(.*?)\]/', '<span class="color--base">$1</span>', e(@$menu_banner?->value?->language?->$select_lang->heading ?? $menu_banner?->value?->language?->$default_lang->heading ?? ''));
@endphp

<section class="menu-banner-section ptb-100 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-6 ">
                <div class="section-header">
                    <h2 class="section-title">
                        {!! @$tagline !!}
                    </h2>
                </div>
                <div class="offering-info">
                    <div class="offering-header">
                        <h3 class="offering-title">{{ @$menu_banner?->value?->language?->$select_lang->title ?? $menu_banner?->value?->language?->$default_lang->title }}</h3>
                        <div class="offering-badge">{{ @$menu_banner?->value?->language?->$select_lang->limit_text ?? $menu_banner?->value?->language?->$default_lang->limit_text }}</div>
                    </div>

                    <div class="offering-content">
                        <div class="offer-item animated-item" data-delay="0">
                            <span class="offer-icon">
                                <i class="{{ @$menu_banner?->value?->language?->$select_lang->first_card_icon ?? $menu_banner?->value?->language?->$default_lang?->first_card_icon }}"></i>
                            </span>
                            <div class="offer-text">
                                <h4>{{ @$menu_banner?->value?->language?->$select_lang->first_card_title ?? $menu_banner?->value?->language?->$default_lang->first_card_title }}</h4>
                                <p>{{ @$menu_banner?->value?->language?->$select_lang->first_card_sub_title ?? $menu_banner?->value?->language?->$default_lang->first_card_sub_title }}</p>
                            </div>
                        </div>

                        <div class="offer-item animated-item" data-delay="200">
                            <span class="offer-icon">
                                <i class="{{ @$menu_banner?->value?->language?->$select_lang->second_card_icon ?? $menu_banner?->value?->language?->$default_lang->second_card_icon }}"></i>
                            </span>
                            <div class="offer-text">
                                <h4>{{ @$menu_banner?->value?->language?->$select_lang->second_card_title ?? $menu_banner?->value?->language?->$default_lang->second_card_title }}</h4>
                                <p>{{ @$menu_banner?->value?->language?->$select_lang->second_card_sub_title ?? $menu_banner?->value?->language?->$default_lang->second_card_sub_title }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="offering-footer">
                        <p class="offering-note">{{ @$menu_banner?->value?->language?->$select_lang->bottom_text ?? $menu_banner?->value?->language?->$default_lang->bottom_text }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 ">
                <div class="menu-image-robo" data-aos="fade-left" data-aos-duration="1200">
                    <img src="{{ get_image(@$menu_banner?->value?->image ?? '',"site-section") }}" alt="robo food serving" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

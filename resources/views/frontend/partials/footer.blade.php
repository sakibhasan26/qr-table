@php
    $Select_lang = selectedLang();
    $default_lang = system_default_lang();
    $section_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::FOOTER_SECTION);
    $footer = App\Models\Admin\SiteSections::getData($section_slug)->first();
    $useful_link = App\Models\Admin\UsefulLink::orderBy('id')->where('status',1)->get();
@endphp

<footer class="footer-section">
    <div class="container">
        <div class="footer-cta pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="single-cta">
                        <i class="{{ @$footer?->value?->contact?->language?->$Select_lang->address_icon ?? @$footer?->value?->contact?->language?->$default_lang->address_icon }}"></i>
                        <div class="cta-text">
                            <h4>{{ @$footer?->value?->contact?->language?->$Select_lang->address ?? @$footer?->value?->contact?->language?->$default_lang->address }}</h4>
                            <span>{{ @$footer?->value?->contact?->language?->$Select_lang->address_title ?? @$footer?->value?->contact?->language?->$default_lang->address_title }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="single-cta">
                        <i class="{{ @$footer?->value?->contact?->language?->$Select_lang->phone_icon ?? @$footer?->value?->contact?->language?->$default_lang->phone_icon }}"></i>
                        <div class="cta-text">
                            <h4>{{ @$footer?->value?->contact?->language?->$Select_lang->phone ?? @$footer?->value?->contact?->language?->$default_lang->phone }}</h4>
                            <span>{{ @$footer?->value?->contact?->language?->$Select_lang->phone_title ?? @$footer?->value?->contact?->language?->$default_lang->phone_title }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="single-cta">
                        <i class="{{ @$footer?->value?->contact?->language?->$Select_lang->email_icon ?? @$footer?->value?->contact?->language?->$default_lang->address_icon }}"></i>
                        <div class="cta-text">
                            <h4>{{ @$footer?->value?->contact?->language?->$Select_lang->email ?? @$footer?->value?->contact?->language?->$default_lang->email }}</h4>
                            <span>{{ @$footer?->value?->contact?->language?->$Select_lang->email_title ?? @$footer?->value?->contact?->language?->$default_lang->email_title }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-content pt-5 pb-5">
            <div class="row">
                <div class="col-xl-5 col-lg-5 mb-5">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{ asset('public/frontend') }}/images/logo/logo-hm-png-tp.png" class="img-fluid" alt="logo">
                            </a>
                        </div>
                        <div class="footer-text">
                            <p>{{ @$footer?->value?->contact?->language?->$Select_lang->contact_desc ?? @$footer?->value?->contact?->language?->$default_lang->contact_desc }}</p>
                        </div>
                        <div class="footer-social-icon">
                            <span>{{ @$footer?->value?->contact?->language?->$Select_lang->contact_heading ?? @$footer?->value?->contact?->language?->$default_lang->contact_heading }}</span>
                            <div class="social-links">
                                @forelse ($footer?->value?->contact?->social_links ?? [] as $item)
                                    <a href="{{ @$item->link }}" class="social-link">
                                        <i class="{{ @$item->icon }}"></i>
                                    </a>
                                @empty

                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 mb-5">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>{{ __('Useful Links') }}</h3>
                        </div>
                        <ul class="footer-links">
                             @foreach ($useful_link as $key=> $data)
                                <li><a href="{{ route('frontend.useful.link',$data->slug) }}">{{ @$data->title->language->$default->title ?? $data->title->language->$default_lang->title }} </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 mb-5">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>{{ __('Subscribe') }}</h3>
                        </div>
                        <div class="footer-text mb-4">
                            <p>{{ @$footer?->value?->contact?->language?->$Select_lang->subcribe_text ?? @$footer?->value?->contact?->language?->$default_lang->subcribe_text }}</p>
                        </div>
                        <div class="subscribe-form">
                            <form action="#">
                                <input type="email" placeholder="Email Address">
                                <button type="submit">
                                    <i class="fab fa-telegram-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-start">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2024, All Right Reserved <a href="#">AppDevs</a></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 text-center text-lg-end">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Policy</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


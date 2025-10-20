@php
    $section_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::CONTACT_US_SECTION);
    $contact = App\Models\Admin\SiteSections::getData($section_slug)->first();
    $tagline = preg_replace('/\[(.*?)\]/', '<span class="color--base">$1</span>', e(@$contact?->value?->language?->$select_lang->heading ?? $contact?->value?->language?->$default_lang->heading ?? ''));
@endphp
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="contact-inner">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="contact-form-inner">
                                <div class="contact-field">
                                    <div class="section-header">
                                        <h2 class="section-title">
                                            {!! @$tagline !!}
                                        </h2>
                                    </div>
                                    <p>{{ @$contact?->value?->language?->$select_lang->sub_heading ?? $contact?->value?->language?->$default_lang->sub_heading }}</p>
                                    <form action="{{ route('frontend.contact.message.send') }}" method="post">
                                        @csrf
                                        <input name="name" type="text" class="form-control form-group" placeholder="{{ __('Name') }}" />
                                        <input name="email" type="text" class="form-control form-group" placeholder="{{ __('Email') }}" />
                                        <textarea name="message" class="form-control form-group" placeholder="{{ __('Message') }}"></textarea>
                                        <button class=" btn--base w-100 "> {{ __('Send') }} </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="right-contact-social-icon d-flex ">

                            </div>
                        </div>
                    </div>
                    <div class="contact-info-sec">
                        <h4>{{ @$contact?->value?->language?->$select_lang->info_title ?? $contact?->value?->language?->$default_lang->info_title }}</h4>
                        <div class="d-flex info-single align-items-start">
                            <i class="{{ @$contact?->value?->language?->$select_lang->phone_icon ?? $contact?->value?->language?->$default_lang->phone_icon }}"></i>
                            <span>{{ @$contact?->value?->language?->$select_lang->phone ?? $contact?->value?->language?->$default_lang->phone }}</span>
                        </div>
                        <div class="d-flex info-single align-items-start">
                            <i class="{{ @$contact?->value?->language?->$select_lang->email_icon ?? $contact?->value?->language?->$default_lang->email_icon }}"></i>
                            <span>{{ @$contact?->value?->language?->$select_lang->email ?? $contact?->value?->language?->$default_lang->email }}</span>
                        </div>
                        <div class="d-flex info-single align-items-start">
                            <i class="{{ @$contact?->value?->language?->$select_lang->location_icon ?? $contact?->value?->language?->$default_lang->location_icon }}"></i>
                            <span>{{ @$contact?->value?->language?->$select_lang->location ?? $contact?->value?->language?->$default_lang->location }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

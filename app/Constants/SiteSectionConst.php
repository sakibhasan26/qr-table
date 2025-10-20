<?php

namespace App\Constants;

class SiteSectionConst{
    const SITE_COOKIE               = "site-cookie";
    const BANNER_SECTION            = "Banner Section";
    const MENU_BANNER_SECTION       = "Menu Banner Section";
    const BRAND_SECTION             = "Brand Section";
    const DISCOVER_SECTION          = "Discover Section";
    const POPULAR_SECTION           = "Popular Section";
    const WHAT_WE_SERVE_SECTION     = "What We Serve Section";
    const LOGIN_SECTION             = "Login Section";
    const REGISTER_SECTION          = "Register Section";
    const FORGET_PASSWORD_SECTION   = "Forget Password Section";
    const RESET_PASSWORD_SECTION    = "Reset Password Section";
    const GALLERY_SECTION           = "Gallery Section";
    const TRUSTED_BRANDS_SECTION    = "Trusted Brand Section";
    const DOWNLOAD_SECTION          = "Download Section";
    const RESERVATION_SECTION       = "Reservation Section";
    const ABOUT_US_SECTION          = "About Us Section";
    const SERVICES_SECTION          = "Services Section";
    const FEATURE_SECTION           = "Feature Section";
    const CLIENT_FEEDBACK_SECTION   = "Client Feedback Section";
    const FOOTER_SECTION            = "Footer Section";
    const ABOUT_PAGE_SECTION        = "About Page Section";
    const CONTACT_US_SECTION        = "Contact Us Section";



    const NOT_DISPLAY_COOKIE_SECTION          = "site-cookie";
    const NOT_DISPLAY_LOGIN_SECTION           = "login-section";
    const NOT_DISPLAY_REGISTER_SECTION        = "register-section";
    const NOT_DISPLAY_FOOTER_SECTION          = "footer-section";
    const NOT_DISPLAY_BREADCRUMB_SECTION      = "breadcrumb-section";
    const NOT_DISPLAY_FORGET_PASSWORD_SECTION = "forget-password-section";
    const NOT_DISPLAY_RESET_PASSWORD_SECTION  = "reset-password-section";
    const NOT_DISPLAY_ABOUT_SECTION           = "about-section";

    public static function notDisplaySections(): array{
        return [
            self::NOT_DISPLAY_COOKIE_SECTION,
            self::NOT_DISPLAY_LOGIN_SECTION,
            self::NOT_DISPLAY_REGISTER_SECTION,
            self::NOT_DISPLAY_FOOTER_SECTION,
            self::NOT_DISPLAY_BREADCRUMB_SECTION,
            self::NOT_DISPLAY_FORGET_PASSWORD_SECTION,
            self::NOT_DISPLAY_RESET_PASSWORD_SECTION,
            self::NOT_DISPLAY_ABOUT_SECTION,
        ];
    }
}

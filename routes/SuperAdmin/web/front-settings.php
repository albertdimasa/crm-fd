<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\FrontSetting\SignUpController;
use App\Http\Controllers\SuperAdmin\FrontSetting\FrontMenuController;
use App\Http\Controllers\SuperAdmin\FrontSetting\SeoDetailController;
use App\Http\Controllers\SuperAdmin\FrontSetting\FaqSettingController;
use App\Http\Controllers\SuperAdmin\FrontSetting\FrontWidgetController;
use App\Http\Controllers\SuperAdmin\FrontSetting\FrontSettingController;
use App\Http\Controllers\SuperAdmin\FrontSetting\ClientSettingController;
use App\Http\Controllers\SuperAdmin\FrontSetting\FooterSettingController;
use App\Http\Controllers\SuperAdmin\FrontSetting\FeatureSettingController;
use App\Http\Controllers\SuperAdmin\FrontSetting\SocialLinkSettingController;
use App\Http\Controllers\SuperAdmin\FrontSetting\TestimonialSettingController;
use App\Http\Controllers\SuperAdmin\FrontSetting\FeatureTranslationSettingController;

Route::group(['prefix' => 'front-settings', 'as' => 'front-settings.'], function () {
        Route::get('/', function () {
            return redirect()->route('superadmin.front-settings.front_theme_settings');
        });
        Route::get('front-theme-settings', [FrontThemeSettingController::class, 'index'])->name('front_theme_settings');
        Route::put('front-theme-update', [FrontThemeSettingController::class, 'themeUpdate'])->name('front_theme_update');
        Route::get('front-settings-translation/{lang?}', [FrontSettingController::class, 'lang'])->name('front-settings.lang');
        Route::put('front-settings-translation', [FrontSettingController::class, 'updateLang'])->name('front-settings.update_lang');
        Route::get('price-settings-translation/{lang?}', [FrontSettingController::class, 'priceLang'])->name('price-settings.lang');
        Route::put('price-settings-translation', [FrontSettingController::class, 'updatePriceLang'])->name('price-settings.update_lang');

        Route::get('features-translation/{lang?}', [FeatureTranslationSettingController::class, 'lang'])->name('features-translation.lang');
        Route::put('features-translation', [FeatureTranslationSettingController::class, 'updateLang'])->name('features-translation.update_lang');

        Route::get('social-link', [SocialLinkSettingController::class, 'socialLink'])->name('social_link');
        Route::put('social-link', [SocialLinkSettingController::class, 'socialLinkUpdate'])->name('post.social_links');

        Route::resource('features-settings', FeatureSettingController::class);

        Route::put('footer-settings-translation', [FooterSettingController::class, 'updateLang'])->name('footer-settings.update_lang');
        Route::resource('footer-settings', FooterSettingController::class)->except(['index', 'show']);
        Route::post('footer-settings-slug', [FooterSettingController::class, 'generateSlug'])->name('footer-settings.generate_slug');
        Route::get('footer-settings/{lang?}', [FooterSettingController::class, 'index'])->name('footer-settings.index');

        Route::get('cta-settings/{lang?}', [FooterSettingController::class, 'ctaLang'])->name('cta-settings.lang');
        Route::put('cta-settings', [FooterSettingController::class, 'updateCtaLang'])->name('cta-settings.update_lang');
        Route::resource('front-widgets', FrontWidgetController::class);
        Route::get('seo-detail/{lang?}', [SeoDetailController::class, 'index'])->name('seo-detail.index');
        Route::resource('seo-detail', SeoDetailController::class)->only(['edit', 'update']);

        Route::get('contact-settings', [FrontSettingController::class, 'contact'])->name('contact_settings');
        Route::put('contact-settings', [FrontSettingController::class, 'contactUpdate'])->name('update_contact_settings');
        Route::get('auth-settings', [FrontSettingController::class, 'authSetting'])->name('auth_settings');
        Route::put('auth-settings', [FrontSettingController::class, 'authUpdate'])->name('auth_settings.update');
        Route::resource('front-settings', FrontSettingController::class)->only(['update']);
        Route::get('front-settings/{lang?}', [FrontSettingController::class, 'index'])->name('front-settings.index');

        Route::get('signup-setting-translation/{lang?}', [SignUpController::class, 'lang'])->name('signup_setting.lang');
        Route::put('signup-setting-translation', [SignUpController::class, 'updateLang'])->name('signup_setting.update_lang');
        Route::resource('sign-up-setting', SignUpController::class)->only(['index', 'update']);
        Route::get('testimonial-setting-translation', [TestimonialSettingController::class, 'createTestimonialTitle'])->name('create_testimonial_title');
        Route::post('testimonial-setting-translation', [TestimonialSettingController::class, 'storeOrUpdateTestimonialTitle'])->name('store_testimonial_title');
        Route::get('testimonial-setting-translation/{id}', [TestimonialSettingController::class, 'editTestimonialTitle'])->name('edit_testimonial_title');
        Route::resource('testimonial-settings', TestimonialSettingController::class);

        Route::put('client-setting-translation', [ClientSettingController::class, 'updateLang'])->name('client_setting.update_lang');
        Route::put('client-setting-translation', [ClientSettingController::class, 'updateLang'])->name('client_setting.update_lang');

        // Overwrite index and below added except
        Route::resource('client-settings', ClientSettingController::class)->except(['index', 'show']);
        Route::get('client-settings/{lang?}', [ClientSettingController::class, 'index'])->name('client-settings.index');

        Route::put('faq-setting-translation', [FaqSettingController::class, 'updateLang'])->name('faq_setting.update_lang');
        Route::resource('faq-settings', FaqSettingController::class)->except(['index', 'show']);
        Route::get('faq-settings/{lang?}', [FaqSettingController::class, 'index'])->name('faq-settings.index');

        Route::put('front-menu-settings', [FrontMenuController::class, 'updateLang'])->name('front_menu_settings.updateLang');
        Route::get('front-menu-settings/{lang?}', [FrontMenuController::class, 'lang'])->name('front_menu_settings.lang');
});

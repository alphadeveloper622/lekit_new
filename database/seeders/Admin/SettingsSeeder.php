<?php

namespace Database\Seeders\Admin;

use DB;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(['title' => 'current_version',                         'value' => '1.0.0',                                     'lang' => 'en']);

        //General setting
        Setting::create(['title' => 'default_language',                        'value' => 'en',                                        'lang' => 'en']);
        Setting::create(['title' => 'system_name',                             'value' => 'Yoori e-Commerce CMS',                      'lang' => 'en']);
        Setting::create(['title' => 'default_time_zone',                       'value' => 'Asia/Dhaka',                                'lang' => 'en']);
        Setting::create(['title' => 'default_currency',                        'value' => 1,                                           'lang' => 'en']);
        Setting::create(['title' => 'favicon',                                 'value' => 'a:14:{s:17:"originalImage_url";s:39:"images/icon/20211030175341-favicon8.png";s:15:"image_16x16_url";s:46:"images/icon/20211030175341-favicon-16x1626.png";s:15:"image_32x32_url";s:45:"images/icon/20211030175341-favicon-32x322.png";s:15:"image_57x57_url";s:45:"images/icon/20211030175341-favicon-57x576.png";s:15:"image_60x60_url";s:46:"images/icon/20211030175341-favicon-60x6023.png";s:15:"image_72x72_url";s:45:"images/icon/20211030175341-favicon-72x725.png";s:15:"image_76x76_url";s:45:"images/icon/20211030175341-favicon-76x761.png";s:15:"image_96x96_url";s:45:"images/icon/20211030175341-favicon-96x965.png";s:17:"image_114x114_url";s:48:"images/icon/20211030175341-favicon-114x11422.png";s:17:"image_120x120_url";s:48:"images/icon/20211030175341-favicon-120x12012.png";s:17:"image_144x144_url";s:48:"images/icon/20211030175341-favicon-144x14429.png";s:17:"image_152x152_url";s:48:"images/icon/20211030175341-favicon-152x15250.png";s:17:"image_180x180_url";s:47:"images/icon/20211030175341-favicon-180x1803.png";s:17:"image_192x192_url";s:48:"images/icon/20211030175341-favicon-192x19217.png";}', 'lang' => 'en']);

        //Preference Setting
        Setting::create(['title' => 'https',                                   'value' => 0,                                           'lang' => 'en']);
        Setting::create(['title' => 'maintenance_mode',                        'value' => 0,                                           'lang' => 'en']);
        Setting::create(['title' => 'seller_system',                           'value' => 1,                                           'lang' => 'en']);
        Setting::create(['title' => 'classified_product',                      'value' => 1,                                           'lang' => 'en']);
        Setting::create(['title' => 'seller_product_auto_approve',             'value' => 1,                                           'lang' => 'en']);
        Setting::create(['title' => 'wallet_system',                           'value' => 1,                                           'lang' => 'en']);
        Setting::create(['title' => 'coupon_system',                           'value' => 1,                                           'lang' => 'en']);
        Setting::create(['title' => 'pickup_point',                            'value' => 1,                                           'lang' => 'en']);
        Setting::create(['title' => 'conversation',                            'value' => 1,                                           'lang' => 'en']);
        Setting::create(['title' => 'color',                                   'value' => 1,                                           'lang' => 'en']);

        //Email Setting
        Setting::create(['title' => 'mail_driver',                             'value'  => 'smtp',                                     'lang' => 'en']);
        Setting::create(['title' => 'smtp_mail_host',                          'value'  => 'smtp.mailtrap.io',                         'lang' => 'en']);
        Setting::create(['title' => 'smtp_mail_port',                          'value'  => '2525',                                      'lang' => 'en']);
        Setting::create(['title' => 'smtp_mail_address',                       'value'  => 'ex4useonly@gmail.com',                     'lang' => 'en']);
        Setting::create(['title' => 'smtp_name',                               'value'  => 'YOORI',                                    'lang' => 'en']);
        Setting::create(['title' => 'smtp_mail_username',                      'value'  => '9cd87755deaf57',                           'lang' => 'en']);
        Setting::create(['title' => 'smtp_mail_password',                      'value'  => '0cc311fe2978ef',                           'lang' => 'en']);
        Setting::create(['title' => 'smtp_mail_encryption_type',               'value'  => 'tls',                                      'lang' => 'en']);

        Setting::create(['title' => 'sendgrid_mail_host',                      'value'  => 'smtp.sendgrid.net',                        'lang' => 'en']);
        Setting::create(['title' => 'sendgrid_mail_port',                      'value'  => '587',                                      'lang' => 'en']);
        Setting::create(['title' => 'sendgrid_mail_address',                   'value'  => 'ex4useonly@gmail.com',                                       'lang' => 'en']);
        Setting::create(['title' => 'sendgrid_name',                           'value'  => 'yoori',                                    'lang' => 'en']);
        Setting::create(['title' => 'sendgrid_mail_username',                  'value'  => 'apikey',                                   'lang' => 'en']);
        Setting::create(['title' => 'sendgrid_mail_password',                  'value'  => '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',             'lang' => 'en']);
        Setting::create(['title' => 'sendgrid_mail_encryption_type',           'value'  => 'tls',                                      'lang' => 'en']);

        Setting::create(['title' => 'sendmail_path',                           'value'  => '/usr/sbin/sendmail -bs',                   'lang' => 'en']);

        Setting::create(['title' => 'mailgun_mail_host',                       'value'  => 'smtp.mailgun.org',                         'lang' => 'en']);
        Setting::create(['title' => 'mailgun_mail_port',                       'value'  => '587',                                      'lang' => 'en']);
        Setting::create(['title' => 'mailgun_mail_address',                    'value'  => 'ex4useonly@gmail.com',                     'lang' => 'en']);
        Setting::create(['title' => 'mailgun_name',                            'value'  => 'yoori',                                    'lang' => 'en']);
        Setting::create(['title' => 'mailgun_mail_username',                   'value'  => 'postmaster@sandbox1c585606ebde4674a70a41195656d3ca.mailgun.org',                      'lang' => 'en']);
        Setting::create(['title' => 'mailgun_mail_password',                   'value'  => '7dd5cd5b45c3bb402bd7b999f0e8b750-1831c31e-c1f5f9c5',                                  'lang' => 'en']);
        Setting::create(['title' => 'mailgun_mail_encryption_type',            'value'  => 'tls',                                      'lang' => 'en']);

        Setting::create(['title' => 'mailgun_domain',                          'value'  => "postmaster@sandbox1c585606ebde4674a70a41195656d3ca.mailgun.org",                      'lang' => 'en']);
        Setting::create(['title' => 'mailgun_secret',                          'value'  => "pubkey-9d9d4c74181ad6c592e70853213ee2a4",                                             'lang' => 'en']);

        Setting::create(['title' => 'mail_signature',                          'value'  => NULL,                                       'lang' => 'en']);

        //Currency setting
        Setting::create(['title' => 'currency_symbol_format',                  'value'  => 'symbol_amount',                            'lang'  => 'en']);
        Setting::create(['title' => 'decimal_separator',                       'value'  => '.',                                        'lang'  => 'en']);
        Setting::create(['title' => 'no_of_decimals',                          'value'  => 2,                                          'lang'  => 'en']);

        //Storage
        Setting::create(['title' => 'default_storage',                         'value'  => 'local',                                    'lang' => 'en']);
        Setting::create(['title' => 'aws_access_key_id',                       'value'  => 'AKIAVYWNX47HQQEHWEQO',                     'lang' => 'en']);
        Setting::create(['title' => 'aws_secret_access_key',                   'value'  => '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', 'lang' => 'en']);
        Setting::create(['title' => 'aws_default_region',                      'value'  => 'ap-south-1',                               'lang' => 'en']);
        Setting::create(['title' => 'aws_bucket',                              'value'  => 'demo11223',                                'lang' => 'en']);

        Setting::create(['title' => 'wasabi_access_key_id',                     'value'  => 'HUMKHC9V5OHOUOJIXX6Y',                     'lang' => 'en']);
        Setting::create(['title' => 'wasabi_secret_access_key',                 'value'  => '952VnBFzv0ZJWJIJNeVPEV7VNjCmv3mgzEh48TfQ', 'lang' => 'en']);
        Setting::create(['title' => 'wasabi_default_region',                    'value'  => 'us-east-1',                                'lang' => 'en']);
        Setting::create(['title' => 'wasabi_bucket',                            'value'  => 'demo11223',                                'lang' => 'en']);


        Setting::create(['title' => 'image_optimization',                      'value'  => 1,                                          'lang' => 'en']);
        Setting::create(['title' => 'image_optimization_percentage',           'value'  => 80,                                         'lang' => 'en']);

        //Cache....
        Setting::create(['title' => 'is_cache_enabled',                        'value'  => 'disable',                                  'lang' => 'en']);
        Setting::create(['title' => 'default_cache',                           'value'  => 'file',                                     'lang' => 'en']);
        Setting::create(['title' => 'redis_host',                              'value'  => NULL,                                       'lang' => 'en']);
        Setting::create(['title' => 'redis_password',                          'value'  => NULL,                                       'lang' => 'en']);
        Setting::create(['title' => 'redis_port',                              'value'  => NULL,                                       'lang' => 'en']);
        Setting::create(['title' => 'memcached_host',                          'value'  => NULL,                                       'lang' => 'en']);
//        Setting::create(['title' => 'memcached_password',                      'value'  => NULL,                                       'lang' => 'en']);
        Setting::create(['title' => 'memcached_port',                          'value'  => NULL,                                       'lang' => 'en']);

        //Miscellaneous
        Setting::create(['title' => 'pagination',                              'value'  => 15,                                         'lang' => 'en']);
        Setting::create(['title' => 'api_paginate',                            'value'  => 20,                                         'lang' => 'en']);
        Setting::create(['title' => 'index_form_paginate',                     'value'  => 10,                                         'lang' => 'en']);
        Setting::create(['title' => 'media_paginate',                          'value'  => 32,                                         'lang' => 'en']);
        Setting::create(['title' => 'order_prefix',                            'value'  => 'YR',                                       'lang' => 'en']);


        //Store front Theme Options
        Setting::create(['title' => 'primary_color',                           'value'  => '#C9151B',                                  'lang' => 'en']);
        Setting::create(['title' => 'secondary_color',                         'value'  => '#333333',                                  'lang' => 'en']);
        Setting::create(['title' => 'full_width_menu_background',              'value'  => '1',                                  'lang' => 'en']);
        Setting::create(['title' => 'menu_background_color',                   'value'  => '#333333',                                  'lang' => 'en']);
        Setting::create(['title' => 'menu_text_color',                         'value'  => '#ffffff',                                  'lang' => 'en']);
        Setting::create(['title' => 'menu_border_bottom_color',                'value'  => '#EEEEEE',                                  'lang' => 'en']);
        Setting::create(['title' => 'fonts',                                   'value'  => 'Poppins',                                   'lang' => 'en']);

        //Website SEO
        Setting::create(['title' => 'meta_title',                              'value'  => NULL,                                       'lang' => 'en']);
        Setting::create(['title' => 'meta_description',                        'value'  => NULL,                                       'lang' => 'en']);
        Setting::create(['title' => 'keyword',                                 'value'  => NULL,                                       'lang' => 'en']);
        Setting::create(['title' => 'article',                                 'value'  => NULL,                                       'lang' => 'en']);
        Setting::create(['title' => 'og_image',                                'value'  => null,                                       'lang' => 'en']);
        //Website
        Setting::create(['title' => 'popup_title',                             'value'  => NULL,                                       'lang' => 'en']);
        Setting::create(['title' => 'popup_description',                       'value'  => NULL,                                       'lang' => 'en']);
        Setting::create(['title' => 'popup_show_in',                           'value'  => 'home_page',                                'lang' => 'en']);
        Setting::create(['title' => 'popup_image',                             'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'site_popup_status',                       'value'  => 1,                                          'lang' => 'en']);
        //Custom
        Setting::create(['title' => 'custom_css',                              'value'  => NULL,                                       'lang' => 'en']);
        //Custom CSS
        Setting::create(['title' => 'custom_header_script',                    'value'  => NULL,                                       'lang' => 'en']);
        Setting::create(['title' => 'custom_footer_script',                    'value'  => NULL,                                       'lang' => 'en']);
        //Custom Js
        Setting::create(['title' => 'cookies_agreement',                       'value'  => NULL,                                       'lang' => 'en']);
        Setting::create(['title' => 'cookies_status',                          'value'  => 1,                                          'lang' => 'en']);
        //Header Content
        Setting::create(['title' => 'header_theme',                            'value'  => 'header_theme1',                            'lang' => 'en']);
        Setting::create(['title' => 'light_logo',                              'value'  => 'a:10:{s:7:"storage";s:5:"local";s:14:"original_image";s:44:"images/icon/20220208093016-light_logo383.png";s:12:"image_100x38";s:0:"";s:11:"image_89x33";s:0:"";s:12:"image_118x45";s:51:"images/icon/20220208093015-light_logo-118x45108.png";s:11:"image_48x25";s:0:"";s:11:"image_50x40";s:0:"";s:13:"image_900x300";s:0:"";s:12:"image_105x75";s:0:"";s:11:"image_72x72";s:57:"images/icon/20220208093016image_small_twolight_logo57.png";}',                                       'lang' => 'en']);
        Setting::create(['title' => 'dark_logo',                               'value'  => 'a:10:{s:7:"storage";s:5:"local";s:14:"original_image";s:42:"images/icon/20220208093016-dark_logo92.png";s:12:"image_100x38";s:0:"";s:11:"image_89x33";s:0:"";s:12:"image_118x45";s:50:"images/icon/20220208093016-dark_logo-118x45300.png";s:11:"image_48x25";s:0:"";s:11:"image_50x40";s:0:"";s:13:"image_900x300";s:0:"";s:12:"image_105x75";s:0:"";s:11:"image_72x72";s:57:"images/icon/20220208093016image_small_twodark_logo432.png";}',                                       'lang' => 'en']);
        Setting::create(['title' => 'header_contact_number',                   'value'  => 1,                                          'lang' => 'en']);

        //Topbar Section
        Setting::create(['title' => 'header_contact_phone',                    'value'  => '8801234567890',                                       'lang' => 'en']);
        Setting::create(['title' => 'header_contact_email',                    'value'  => 'support@website.com',                           'lang' => 'en']);
        Setting::create(['title' => 'language_switcher',                       'value'  => 1,                                          'lang' => 'en']);
        Setting::create(['title' => 'currency_switcher',                       'value'  => 1,                                          'lang' => 'en']);
        Setting::create(['title' => 'topbar_play_store_link',                  'value'  => 1,                                          'lang' => 'en']);
        Setting::create(['title' => 'topbar_app_store_link',                   'value'  => 1,                                          'lang' => 'en']);
        //Banner
        Setting::create(['title' => 'banner_link',                             'value'  => NULL,                                       'lang' => 'en']);
        Setting::create(['title' => 'banner_image',                            'value'  => null,                                       'lang' => 'en']);

        //Header Menu

        Setting::create(['title' => 'header_menu',                             'value'  => 'a:7:{i:0;a:2:{s:5:"label";s:4:"Home";s:3:"url";s:1:"/";}i:1;a:2:{s:5:"label";s:8:"Products";s:3:"url";s:9:"/products";}i:2;a:2:{s:5:"label";s:10:"Categories";s:3:"url";s:11:"/categories";}i:3;a:2:{s:5:"label";s:6:"Brands";s:3:"url";s:7:"/brands";}i:4;a:2:{s:5:"label";s:9:"Campaigns";s:3:"url";s:10:"/campaigns";}i:5;a:2:{s:5:"label";s:7:"Sellers";s:3:"url";s:8:"/sellers";}i:6;a:5:{s:5:"label";s:5:"Pages";s:3:"url";s:18:"javascript:void(0)";i:0;a:2:{s:5:"label";s:5:"Blogs";s:3:"url";s:6:"/blogs";}i:1;a:2:{s:5:"label";s:8:"About Us";s:3:"url";s:11:"/page/about";}i:2;a:2:{s:5:"label";s:10:"Contact Us";s:3:"url";s:8:"/contact";}}}', 'lang' => 'en']);
        //Footer About
        Setting::create(['title' => 'footer_theme',                            'value'  => 'footer_theme1',                            'lang' => 'en']);
        Setting::create(['title' => 'about_description',                       'value'  => '<p><span style="font-family: Poppins, Helvetica, sans-serif;"><font color="#767676"><b>Yoori&nbsp;</b></font></span><span style="color: rgb(102, 102, 102); font-family: Roboto, Helvetica, sans-serif;">being the trusted online shop in over the world aims to provide a trouble-free shopping experience for the people of the world but is also providing ample opportunity for international online shopping from yoori.&nbsp;</span><span style="font-size: 0.875rem; font-family: Roboto, Helvetica, sans-serif;"><font color="#767676"><span style="font-weight: bolder;">Yoori&nbsp;</span></font></span><span style="font-size: 0.875rem; color: rgb(102, 102, 102); font-family: Roboto, Helvetica, sans-serif;">being the trusted online shop in over the world aims to provide a trouble-free shopping experience for the people of the world but is also providing ample opportunity for international online shopping from yoori.&nbsp;</span>',                                       'lang' => 'en']);
        Setting::create(['title' => 'play_store_link',                         'value'  => 'https://play.google.com/store/apps/developer?id=SpaGreen+Creative',                                       'lang' => 'en']);
        Setting::create(['title' => 'apple_store_link',                        'value'  => 'https://apps.apple.com/au/developer/spagreen-creative/id1502207090',                                       'lang' => 'en']);
        Setting::create(['title' => 'footer_logo',                             'value'  => 'a:10:{s:7:"storage";s:5:"local";s:14:"original_image";s:45:"images/icon/20220208093316-footer_logo491.png";s:12:"image_100x38";s:0:"";s:11:"image_89x33";s:50:"images/icon/20220208093316-footer_logo-89x3344.png";s:12:"image_118x45";s:0:"";s:11:"image_48x25";s:0:"";s:11:"image_50x40";s:0:"";s:13:"image_900x300";s:0:"";s:12:"image_105x75";s:0:"";s:11:"image_72x72";s:59:"images/icon/20220208093316image_small_twofooter_logo422.png";}',                                       'lang' => 'en']);
        Setting::create(['title' => 'show_social_links',                       'value' => 1,                                           'lang' => 'en']);

        //Footer Contat
        Setting::create(['title' => 'footer_contact_phone',                    'value'  => '01234567890',                                       'lang' => 'en']);
        Setting::create(['title' => 'footer_contact_email',                    'value'  => 'test@gmail.com',                           'lang' => 'en']);
        Setting::create(['title' => 'footer_contact_address',                  'value'  => 'Concord Shopping Complex, Lake City, Khilkhet, Dhaka-1229',                                       'lang' => 'en']);

        //Copyright
        Setting::create(['title' => 'copyright',                               'value'  => "©Yoori by SpaGreen Creative 2022, All Rights Reserved.",                                       'lang' => 'en']);

        //Footer Menu
        Setting::create(['title' => 'footer_menu',                             'value'  => 'a:6:{i:0;a:2:{s:5:"label";s:4:"Home";s:3:"url";s:1:"/";}i:1;a:2:{s:5:"label";s:14:"All Categories";s:3:"url";s:10:"categories";}i:2;a:2:{s:5:"label";s:10:"All Brands";s:3:"url";s:6:"brands";}i:3;a:2:{s:5:"label";s:12:"All Products";s:3:"url";s:8:"products";}i:4;a:2:{s:5:"label";s:5:"Blogs";s:3:"url";s:5:"blogs";}i:5;a:2:{s:5:"label";s:9:"Campaigns";s:3:"url";s:9:"campaigns";}}',                                       'lang' => 'en']);
        //useful link
        Setting::create(['title' => 'useful_links',                             'value'  => 'a:7:{i:0;a:2:{s:5:"label";s:11:"Latest News";s:3:"url";s:6:"/blogs";}i:1;a:2:{s:5:"label";s:19:"Browse All Products";s:3:"url";s:9:"/products";}i:2;a:2:{s:5:"label";s:19:"Browse All Category";s:3:"url";s:11:"/categories";}i:3;a:2:{s:5:"label";s:17:"Browse All Brands";s:3:"url";s:7:"/brands";}i:4;a:2:{s:5:"label";s:18:"Terms & Conditions";s:3:"url";s:22:"/page/terms-conditions";}i:5;a:2:{s:5:"label";s:14:"Privacy Policy";s:3:"url";s:20:"/page/privacy-policy";}i:6;a:2:{s:5:"label";s:13:"Refund Policy";s:3:"url";s:19:"/page/refund-policy";}}',                                       'lang' => 'en']);

        //Social Link
        Setting::create(['title' => 'facebook_link',                           'value'  => 'https://www.facebook.com/',                                       'lang' => 'en']);
        Setting::create(['title' => 'twitter_link',                            'value'  => 'https://www.twitter.com/',                                       'lang' => 'en']);
        Setting::create(['title' => 'instagram_link',                          'value'  => 'https://www.instagram.com/',                                       'lang' => 'en']);
        Setting::create(['title' => 'youtube_link',                            'value'  => 'https://www.youtube.com/',                                       'lang' => 'en']);
        Setting::create(['title' => 'linkedin_link',                           'value'  => 'https://www.linked.com/',                                       'lang' => 'en']);
        Setting::create(['title' => 'social_link_status',                      'value'  => 1,                                          'lang' => 'en']);

        //Payment Methods
        Setting::create(['title' => 'payment_method_banner',                   'value'  => '',                                       'lang' => 'en']);


        //OTP System
        Setting::create(['title' => 'active_sms_provider',                     'value'  => 'spagreen',                                       'lang' => 'en']);

        //Twilio Credential
        Setting::create(['title' => 'sms_method',                              'value'  => 'twilio',                                   'lang' => 'en']);
        Setting::create(['title' => 'twilio_sms_sid',                          'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'twilio_sms_auth_token',                   'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'valid_twilio_sms_number',                 'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'is_twilio_sms_activated',                 'value'  => 0,                                          'lang' => 'en']);

        //Fast 2SMS Credential
        Setting::create(['title' => 'fast_2_auth_key',                         'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'fast_2_entity_id',                        'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'fast_2_route',                            'value'  => 'dlt_manual',                               'lang' => 'en']);
        Setting::create(['title' => 'fast_2_language',                         'value'  => 'english',                                  'lang' => 'en']);
        Setting::create(['title' => 'fast_2_sender_id',                        'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'is_fast_2_activated',                     'value'  => 0,                                          'lang' => 'en']);

        //Spagreen Credential
        Setting::create(['title' => 'spagreen_url',                            'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'spagreen_sms_api_key',                    'value'  => 'bed780abc0260925',                                       'lang' => 'en']);
        Setting::create(['title' => 'spagreen_secret_key',                     'value'  => 'ed566d8d',                                       'lang' => 'en']);
        Setting::create(['title' => 'is_spagreen_sms_activated',               'value'  => 1,                                          'lang' => 'en']);

        //MIMO Credential
        Setting::create(['title' => 'mimo_username',                           'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'mimo_sms_password',                       'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'mimo_sms_sender_id',                      'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'is_mimo_sms_activated',                   'value'  => 0,                                          'lang' => 'en']);

        //Nexmo Credential
        Setting::create(['title' => 'nexmo_sms_key',                           'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'nexmo_sms_secret_key',                    'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'type',                                    'value'  => 'nexmo',                                    'lang' => 'en']);
        Setting::create(['title' => 'is_nexmo_sms_activated',                  'value'  => 0,                                          'lang' => 'en']);

        //SSL Wireless Credential
        Setting::create(['title' => 'ssl_sms_api_token',                       'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'ssl_sms_sid',                             'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'ssm_sms_url',                             'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'is_ssl_wireless_sms_activated',           'value'  => 0,                                          'lang' => 'en']);


        //payment Gateway Paypal Setting
        Setting::create(['title' => 'payment_method',                          'value'  => 'paypal',                                   'lang' => 'en']);
        Setting::create(['title' => 'paypal_client_id',                        'value'  => 'AZxyKxJo_Ogc7jYDellCuEogwYbkFVdIXYGmCajwgbkBe-Wodlls8jplUzZAmXHxxmxhWB9xJq1L79V1',                                       'lang' => 'en']);
        Setting::create(['title' => 'paypal_client_secret',                    'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'is_paypal_activated',                     'value'  => 1,                                          'lang' => 'en']);
        Setting::create(['title' => 'is_paypal_sandbox_mode_activated',        'value'  => 0,                                          'lang' => 'en']);

        //Stripe Setting
        Setting::create(['title' => 'stripe_key',                              'value'  => 'pk_test_51KSEttAEcZ6N0eChIDGzc0EXX8P1gOsTmYwexZ7188WFnyY2bEOqfvPT3MyePOwDNCPNKDb2o5M50w31dCUdjQha00R590C6Wg', 'lang' => 'en']);
        Setting::create(['title' => 'stripe_secret',                           'value'  => 'sk_test_51KSEttAEcZ6N0eChifvBvTyjszi2Bti1iuLvOjuIvt9PfMgDLRlRDgfgzGylXTqkOGFO6KYPeCb7N78FCKSUNwNh00hE1xcGN2',  'lang' => 'en']);
        Setting::create(['title' => 'is_stripe_activated',                     'value'  => 1,                                          'lang' => 'en']);
        Setting::create(['title' => 'is_stripe_sandbox_mode_activated',        'value'  => 0,                                          'lang' => 'en']);

        //SSLCOMMERZ Setting
        Setting::create(['title' => 'sslcommerz_id',                           'value'  => 'ecomm621c6cee01086',                       'lang' => 'en']);
        Setting::create(['title' => 'sslcommerz_password',                     'value'  => 'ecomm621c6cee01086@ssl',                   'lang' => 'en']);
        Setting::create(['title' => 'is_sslcommerz_activated',                 'value'  => 1,                                          'lang' => 'en']);
        Setting::create(['title' => 'is_sslcommerz_sandbox_mode_activated',    'value'  => 0,                                          'lang' => 'en']);

        //Paytm Setting
        Setting::create(['title' => 'merchant_id',                             'value'  => 'asdasdsa',                                 'lang' => 'en']);
        Setting::create(['title' => 'merchant_key',                            'value'  => '&77cn6xIrDf#89TK',                         'lang' => 'en']);
        Setting::create(['title' => 'merchant_website',                        'value'  =>  'WEBSTAGING',                              'lang' => 'en']);
        Setting::create(['title' => 'channel',                                 'value'  =>  'WEB',                                     'lang' => 'en']);
        Setting::create(['title' => 'industry_type',                           'value'  => 'Retail',                                   'lang' => 'en']);
        Setting::create(['title' => 'is_paytm_activated',                      'value'  => 1,                                          'lang' => 'en']);
        Setting::create(['title' => 'is_paytm_sandbox_mode_activated',         'value'  => 0,                                          'lang' => 'en']);

        //JazzCash Setting
        Setting::create(['title' => 'jazz_cash_merchant_id',                    'value'  => 'MC34318',                                 'lang' => 'en']);
        Setting::create(['title' => 'jazz_cash_password',                       'value'  => '8h484tw2t8',                              'lang' => 'en']);
        Setting::create(['title' => 'jazz_cash_integrity_salt',                 'value'  => 'w218xv9215',                              'lang' => 'en']);
        Setting::create(['title' => 'is_jazz_cash_activated',                   'value'  => 1,                                          'lang' => 'en']);


        //Razorpay Setting
        Setting::create(['title' => 'razorpay_key',                            'value'  => 'rzp_test_0TxiJynxZFTbwx',                  'lang' => 'en']);
        Setting::create(['title' => 'razorpay_secret',                         'value'  => '3WTWGfrzVjwTcVMgzy8phSpJ',                 'lang' => 'en']);
        Setting::create(['title' => 'is_razorpay_activated',                   'value'  => 1,                                          'lang' => 'en']);


        //Mobile Apps APIs Settings
        Setting::create(['title' => 'api_server_url',                          'value'  => 'http://yoori-laravel.test/api',            'lang' => 'en']);
        Setting::create(['title' => 'api_key_app',                             'value'  => null,                                       'lang' => 'en']);

        //Android Settings
        Setting::create(['title' => 'latest_apk_version',                      'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'latest_apk_code',                         'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'apk_file_url',                            'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'whats_new_latest_apk',                    'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'android_skippable',                       'value'  => 0,                                          'lang' => 'en']);

        //iOS Settings
        Setting::create(['title' => 'latest_ipa_version',                      'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'latest_ipa_code',                         'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'ipa_file_url',                            'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'whats_new_latest_ipa',                    'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'ios_skippable',                           'value'  => null,                                       'lang' => 'en']);

        //App Config Settings
        Setting::create(['title' => 'privacy_policy_url',                      'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'terms_condition_url',                     'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'support_url',                             'value'  => null,                                       'lang' => 'en']);
        Setting::create(['title' => 'intro_skippable',                         'value'  => 0,                                          'lang' => 'en']);
        Setting::create(['title' => 'mandatory_login',                         'value'  => 0,                                          'lang' => 'en']);

        //Ads Config Settings
        Setting::create(['title' => 'admob_app_id',                             'value'  => null,                                      'lang' => 'en']);
        Setting::create(['title' => 'admob_banner_ads_id',                      'value'  => null,                                      'lang' => 'en']);
        Setting::create(['title' => 'admob_interstitial_ads_id',                'value'  => null,                                      'lang' => 'en']);
        Setting::create(['title' => 'admob_native_ads_id',                      'value'  => null,                                      'lang' => 'en']);
        Setting::create(['title' => 'ads_enable',                               'value'  => 0,                                         'lang' => 'en']);

        //Seller Commission
        Setting::create(['title' => 'seller_commission',                        'value'  => null,                                     'lang' => 'en']);
        Setting::create(['title' => 'seller_commission_status',                 'value'  => 1,                                        'lang' => 'en']);

        //Delivery Hero Configuration
        Setting::create(['title' => 'delivery_hero_payment_type',               'value'  => 'delivery_hero_salary',                   'lang' => 'en']);
        Setting::create(['title' => 'delivery_hero_send_mail',                  'value'  => 0,                                        'lang' => 'en']);
        Setting::create(['title' => 'delivery_hero_OTP',                        'value'  => 0,                                        'lang' => 'en']);
        //Refund Setting
        Setting::create(['title' => 'refund_request_time',                      'value'  => 10,                                       'lang' => 'en']);
        Setting::create(['title' => 'refund_sticker',                           'value'  => null,                                     'lang' => 'en']);

        //Reward Configuration
        Setting::create(['title' => 'reward_convert_rate',                      'value'  => 10,                                       'lang' => 'en']);

        Setting::create(['title' => 'admin_panel_copyright_text',                'value' => "©Yoori by SpaGreen Creative 2022, All Rights Reserved.",                                       'lang' => 'en']);

        //Shipping Configuration
        Setting::create(['title' => 'shipping_fee_type',                        'value'  => 'product_base',                           'lang' => 'en']);
        Setting::create(['title' => 'shipping_fee_flat_rate',                   'value'  => null,                                     'lang' => 'en']);
        Setting::create(['title' => 'shipping_fee_admin_product',               'value'  => null,                                     'lang' => 'en']);

        //home page sections
        Setting::create(['title' => 'home_page_contents',                       'value'   => 'a:13:{i:0;a:1:{s:8:"campaign";a:2:{i:0;s:1:"1";i:1;s:1:"2";}}i:1;a:1:{s:16:"popular_category";a:8:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"8";i:3;s:1:"3";i:4;s:1:"4";i:5;s:1:"5";i:6;s:1:"6";i:7;s:1:"7";}}i:2;a:1:{s:21:"best_selling_products";a:1:{i:0;s:1:"3";}}i:3;a:1:{s:12:"top_category";a:7:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"8";i:3;s:1:"4";i:4;s:1:"5";i:5;s:1:"6";i:6;s:2:"10";}}i:4;a:1:{s:11:"todays_deal";s:1:"5";}i:5;a:1:{s:16:"category_section";a:3:{s:8:"category";s:1:"5";s:6:"banner";s:0:"";s:10:"banner_url";s:26:"http://yoori-laravel.test/";}}i:6;a:1:{s:11:"top_sellers";a:1:{i:0;s:1:"7";}}i:7;a:1:{s:11:"latest_news";a:1:{i:0;s:1:"8";}}i:8;a:1:{s:10:"flash_deal";s:1:"9";}i:9;a:1:{s:14:"popular_brands";a:1:{i:0;s:2:"10";}}i:10;a:1:{s:17:"offer_ending_soon";a:2:{s:6:"banner";s:0:"";s:10:"banner_url";s:0:"";}}i:11;a:1:{s:21:"best_selling_products";a:1:{i:0;s:2:"12";}}i:12;a:1:{s:16:"download_section";a:3:{s:4:"text";s:13:"download here";s:8:"sub_text";s:18:"download from here";s:6:"banner";s:0:"";}}}',                                     'lang' => 'en']);
        Setting::create(['title' => 'show_service_info_section',               'value'    => 1,                                           'lang' => 'en']);
        Setting::create(['title' => 'show_subscription_section',               'value'    => 1,                                           'lang' => 'en']);

        //social logins
        Setting::create(['title' => 'is_facebook_login_activated',               'value'  => 1,                                                     'lang' => 'en']);
        Setting::create(['title' => 'facebook_client_id',                        'value'  => '998954674053847',                                     'lang' => 'en']);
        Setting::create(['title' => 'facebook_client_secret',                    'value'  => 'c851200a958b191579bc2f4f64e0240a',                    'lang' => 'en']);

        Setting::create(['title' => 'is_google_login_activated',                 'value'  => 1,                                                     'lang' => 'en']);
        Setting::create(['title' => 'google_client_id',                          'value'  => '945100016675-2lbdo4v0j02qjhkfnvhg1vrnrd9fprrm.apps.googleusercontent.com',    'lang' => 'en']);
        Setting::create(['title' => 'google_client_secret',                      'value'  => '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',                 'lang' => 'en']);

        Setting::create(['title' => 'is_twitter_login_activated',                'value'  => 1,                                                     'lang' => 'en']);
        Setting::create(['title' => 'twitter_client_id',                         'value'  => 'fnZ4FgnESCf3ZylATXCN6o0fd',                           'lang' => 'en']);
        Setting::create(['title' => 'twitter_client_secret',                     'value'  => 'arY6pGwCBLtsd4UD9JpB1zUU22VZuNsH7jgZqlYuaW2hvwZ7bU',  'lang' => 'en']);

        Setting::create(['title' => 'is_pusher_notification_active',             'value'  => 0,                                                     'lang' => 'en']);
        Setting::create(['title' => 'pusher_app_id',                             'value'  => '884999',                                              'lang' => 'en']);
        Setting::create(['title' => 'pusher_app_key',                            'value'  => 'b1fabed7446612f51451',                                'lang' => 'en']);
        Setting::create(['title' => 'pusher_app_secret',                         'value'  => '3deb262cc69b198b57b5',                                'lang' => 'en']);
        Setting::create(['title' => 'pusher_app_cluster',                        'value'  => 'ap2',                                                 'lang' => 'en']);

        Setting::create(['title' => 'latitude',                                   'value'  => '23.806931',                                           'lang' => 'en']);
        Setting::create(['title' => 'zoom_level',                                 'value'  => '15',                                                 'lang' => 'en']);
        Setting::create(['title' => 'map_api_key',                                 'value' => 'AIzaSyAuuA4DQxB6an7im3zbYXUMT7EatgTjNuU',            'lang' => 'en']);
        Setting::create(['title' => 'longitude',                                   'value' => '90.368709',                                           'lang' => 'en']);

        Setting::create(['title' => 'is_mollie_activated',                          'value'  => '1',                                                 'lang' => 'en']);
        Setting::create(['title' => 'mollie_api_key',                               'value'  => 'test_NB2BVwR8rekUbtQvenmb9nCvVVRwNJ',               'lang' => 'en']);
        Setting::create(['title' => 'mollie_partner_id',                             'value' => '15292639',                                           'lang' => 'en']);
        Setting::create(['title' => 'mollie_profile_id',                             'value' => 'pfl_kFwynTXZc9',                                      'lang' => 'en']);

        Setting::create(['title' => 'is_paystack_activated',                        'value'  => '1',                                                 'lang' => 'en']);
            Setting::create(['title' => 'paystack_secret_key',                          'value'  => 'pk_test_0c22c8b86d1c70fc97d85caaa57c460efde7c9fc',   'lang' => 'en']);
        Setting::create(['title' => 'paystack_public_key',                          'value'  => 'sk_test_95d06017a0e7dc907708c44c33ee0dd06c43c9b2',    'lang' => 'en']);

        Setting::create(['title' => 'is_flutterwave_activated',                      'value'  => '1',                                                 'lang' => 'en']);
        Setting::create(['title' => 'flutterwave_secret_key',                        'value'  => 'FLWSECK_TEST-9c0006c90876625527cbe75cac4f8769-X',   'lang' => 'en']);
        Setting::create(['title' => 'flutterwave_public_key',                        'value'  => 'FLWPUBK_TEST-30c136d283b2f91b21544ce83c611307-X',    'lang' => 'en']);































//         DB::statement("INSERT INTO `settings` (`lang`, `title`, `value`, `created_at`, `updated_at`) VALUES
// ('en', 'system_name', 'Yoori e-Commerce CMS', '2021-10-23 03:44:10', '2021-10-23 03:44:10'),
// ('en', 'default_time_zone', 'Asia/Dhaka', '2021-10-23 03:44:10', '2021-10-23 03:44:10'),
// ('en', 'default_language', 'en', '2021-10-23 03:44:10', '2021-10-23 03:44:10'),
// ('en', 'default_currency', 1, '2021-10-23 03:44:10', '2021-10-23 03:44:10'),
// ('en', 'favicon', 'a:14:{s:17:\"originalImage_url\";s:39:\"images/icon/20211030175341-favicon8.png\";s:15:\"image_16x16_url\";s:46:\"images/icon/20211030175341-favicon-16x1626.png\";s:15:\"image_32x32_url\";s:45:\"images/icon/20211030175341-favicon-32x322.png\";s:15:\"image_57x57_url\";s:45:\"images/icon/20211030175341-favicon-57x576.png\";s:15:\"image_60x60_url\";s:46:\"images/icon/20211030175341-favicon-60x6023.png\";s:15:\"image_72x72_url\";s:45:\"images/icon/20211030175341-favicon-72x725.png\";s:15:\"image_76x76_url\";s:45:\"images/icon/20211030175341-favicon-76x761.png\";s:15:\"image_96x96_url\";s:45:\"images/icon/20211030175341-favicon-96x965.png\";s:17:\"image_114x114_url\";s:48:\"images/icon/20211030175341-favicon-114x11422.png\";s:17:\"image_120x120_url\";s:48:\"images/icon/20211030175341-favicon-120x12012.png\";s:17:\"image_144x144_url\";s:48:\"images/icon/20211030175341-favicon-144x14429.png\";s:17:\"image_152x152_url\";s:48:\"images/icon/20211030175341-favicon-152x15250.png\";s:17:\"image_180x180_url\";s:47:\"images/icon/20211030175341-favicon-180x1803.png\";s:17:\"image_192x192_url\";s:48:\"images/icon/20211030175341-favicon-192x19217.png\";}', '2021-10-22 21:44:10', '2021-10-30 05:53:41'),
// ('en', 'default_storage', 'local', '2021-11-02 04:23:10', '2021-11-02 04:23:10'),
// ('en', 'aws_access_key_id', 'AKIAVYWNX47HQQEHWEQO', '2021-11-02 04:23:10', '2021-11-02 04:23:10'),
// ('en', 'aws_secret_access_key', '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', '2021-11-02 04:23:10', '2021-11-02 04:23:10'),
// ('en', 'aws_default_region', 'ap-south-1', '2021-11-02 04:23:10', '2021-11-02 04:23:10'),
// ('en', 'aws_bucket', 'demo11223', '2021-11-02 04:23:10', '2021-11-02 04:23:10'),
// ('en', 'image_optimization', '0', '2021-11-02 04:23:10', '2021-11-02 04:23:10'),
// ('en', 'image_optimization_percentage', '90', '2021-11-02 04:23:10', '2021-11-02 04:23:10'),
// ('en', 'pagination', '12', '2021-10-23 03:44:10', '2021-10-23 03:44:10'),
// ('en', '', '20', '2021-10-23 03:44:10', '2021-10-23 03:44:10'),
// ('en', 'index_form_paginate', '10', '2021-10-23 03:44:10', '2021-10-23 03:44:10'),
// ('en', 'media_paginate', '32', '2021-10-23 03:44:10', '2021-10-23 03:44:10')");
    }
}

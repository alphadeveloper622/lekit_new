<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

    public function run()
    {
        //role seed
        Role::create(['name' => 'Superadmin',
            'slug' => 'superadmin',
            'permissions' => $this->superAdminPermissions(),
        ]);
        Role::create(['name' => 'Staff',
            'slug' => 'staff',
            'permissions' => $this->managerPermissions(),
        ]);
    }

    private function superAdminPermissions()
    {
        return [
            'customer_create',
            'customer_read',
            'customer_update',
            'customer_delete',

            'staff_create',
            'staff_read',
            'staff_update',
            'staff_delete',
            'staff_ban',

            'role_create',
            'role_read',
            'role_update',
            'role_delete',

            'seller_create',
            'seller_read',
            'seller_update',
            'seller_delete',
            'seller_verify',

            'language_create',
            'language_read',
            'language_update',
            'language_delete',
            'translation_message_update',

            'media_create',
            'media_read',
            'media_update',
            'media_delete',
            'media_download',

            'brand_create',
            'brand_read',
            'brand_update',
            'brand_delete',

            'color_create',
            'color_read',
            'color_update',
            'color_delete',

            'attribute_set_create',
            'attribute_set_read',
            'attribute_set_update',
            'attribute_set_delete',

            'attribute_value_create',
            'attribute_value_read',
            'attribute_value_update',
            'attribute_value_delete',

            'category_create',
            'category_read',
            'category_update',
            'category_delete',

            'product_create',
            'product_read',
            'product_update',
            'product_delete',
            'product_restore',
            'product_clone',

            'blog_create',
            'blog_read',
            'blog_update',
            'blog_delete',
            'blog_restore',

            'blog_category_create',
            'blog_category_read',
            'blog_category_update',
            'blog_category_delete',

            'support_create',
            'support_read',
            'support_update',
            'support_delete',

            'support_department_create',
            'support_department_read',
            'support_department_update',
            'support_department_delete',

            'seller_payout_read',
            'seller_payout_accept',
            'seller_payout_reject',

            'seller_commission_read',
            'seller_commission_update',

            'order_create',
            'order_read',
            'order_update',
            'order_view',
            'order_delete',
            'order_invoice',

            'pickup_hub_create',
            'pickup_hub_read',
            'pickup_hub_update',
            'pickup_hub_delete',

            'recharge_request_read',
            'recharge_request_status_update',

            'general_setting_update',
            'preference_setting_update',
            'social_login_setting_update',
            'email_setting_update',
            'currency_setting_update',
            'vat_tax_setting_update',
            'storage_setting_update',
            'cache_update',
            'miscellaneous_setting_update',
            'admin_panel_setting_update',
            'facebook_service_update',
            'google_service_update',
            'pusher_notification_update',

            'otp_setting_read',
            'otp_setting_update',

            'sms_template_read',
            'sms_template_update',

            'payment_gateway_read',
            'payment_gateway_update',

            'theme_option_update',
            'header_content_update',
            'footer_content_update',
            'home_page_update',
            'website_seo_update',
            'website_popup_update',
            'custom_css_update',
            'custom_js_update',
            'gdpr_update',
            'page_read',
            'page_create',
            'page_update',
            'page_delete',

            'campaign_create',
            'campaign_read',
            'campaign_update',
            'campaign_delete',
            'campaign_request_read',
            'campaign_request_approved',

            'campaign_product_create',
            'campaign_product_read',
            'campaign_product_update',
            'campaign_product_delete',

            'bulk_sms_read',
            'send_bulk_sms',

            'subscriber_read',
            'subscriber_delete',

            'coupon_read',
            'coupon_create',
            'coupon_update',
            'coupon_delete',

            'shipping_configuration_read',
            'shipping_configuration_update',

            'country_read',
            'country_update',

            'state_read',
            'state_create',
            'state_update',
            'state_delete',

            'city_read',
            'city_create',
            'city_update',
            'city_delete',

            'admin_product_sale_read',
            'seller_product_sale_read',
            'product_stock_read',
            'product_wishlist_read',
            'user_searches_read',
            'commission_history_read',
            'wallet_recharge_history_read',


            'api_setting_update',
            'android_setting_update',
            'ios_setting_update',
            'app_config_update',
            'ads_config_update',
            'download_link_update',


            'mobile_app_intro_read',
            'mobile_app_intro_create',
            'mobile_app_intro_update',
            'mobile_app_intro_delete',


            'delivery_hero_read',
            'delivery_hero_create',
            'delivery_hero_update',
            'delivery_hero_delete',
            'delivery_hero_ban',
            'Delivery_hero_account_deposit',
            'delivery_hero_email_activation',
            'delivery_hero_commission_history',
            'delivery_hero_deposit_history',
            'delivery_hero_collection_history',
            'delivery_hero_cancel_request',
            'delivery_hero_configuration_read',
            'delivery_hero_configuration_update',

            'wholesale_product_read',
            'wholesale_product_create',
            'wholesale_product_update',
            'wholesale_product_delete',
            'wholesale_product_clone',
            'wholesale_product_restore',
            'wholesale_product_setting',

            'refund_read',
            'refund_approve',
            'refund_process',
            'refund_reject',

            'refund_setting_read',
            'refund_setting_update',

            'reward_configuration_read',
            'reward_configuration_update',

            'reward_setting_read',
            'reward_setting_create',
            'reward_setting_update',

            'user_reward_read',
            'user_reward_update',

            'offline_payment_read',
            'offline_payment_create',
            'offline_payment_update',
            'offline_payment_delete',

            'service_read',
            'service_create',
            'service_update',
            'service_delete',

            'slider_read',
            'slider_create',
            'slider_update',
            'slider_delete',

            'wallet_recharge_read',
            'wallet_recharge_update',

            'login_singup_read',
            'login_singup_update',

            'state_import_create',
            'city_import_create',

            'addon_read',
            'addon_update',

        ];
    }

    private function managerPermissions()
    {
        return [
            'customer_create',
            'customer_read',
            'customer_update',
            'customer_delete',
            'customer_ban',

            'staff_create',
            'staff_read',
            'staff_update',
            'staff_delete',

            'role_create',
            'role_read',
            'role_update',
            'role_delete',

            'seller_create',
            'seller_read',
            'seller_update',
            'seller_delete',
            'seller_ban',

            'language_create',
            'language_read',
            'language_update',
            'language_delete',
            'translation_message_update',

            'media_create',
            'media_read',
            'media_update',
            'media_delete',
            'media_download',

            'brand_create',
            'brand_read',
            'brand_update',
            'brand_delete',

            'color_create',
            'color_read',
            'color_update',
            'color_delete',
        ];
    }
}

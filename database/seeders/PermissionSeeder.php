<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $attributes = [
            'order'                 => [
                'read'                      => 'order_read',
                'create'                    => 'order_create',
                'update'                    => 'order_update',
                'view'                      => 'order_view',
                'invoice'                   => 'order_invoice',
//                'delete'                    => 'order_delete' ,
                'approve_offline_payment'   => 'order_approve_offline_payment'
            ],
            'pickup_hub'            => [
                'read'                      => 'pickup_hub_read',
                'create'                    => 'pickup_hub_create',
                'update'                    => 'pickup_hub_update',
                'delete'                    => 'pickup_hub_delete'
            ],
            'product'               => [
                'read'                      => 'product_read',
                'create'                    => 'product_create',
                'update'                    => 'product_update',
                'delete'                    => 'product_delete',
                'restore'                   => 'product_restore',
                'clone'                     => 'product_clone'
            ],
            'color'                 => [
                'read'                      => 'color_read',
                'create'                    => 'color_create',
                'update'                    =>'color_update',
                'delete'                    =>'color_delete'
            ],
            'attribute_set'         => ['read' => 'attribute_set_read', 'create'     => 'attribute_set_create','update'        => 'attribute_set_update', 'delete'      =>'attribute_set_delete'],
            'attribute_value'       => ['read' =>'attribute_value_read','create' =>'attribute_value_create', 'update'  =>'attribute_value_update','delete'  =>'attribute_value_delete'],
            'brand'                 => ['read' => 'brand_read', 'create'         =>'brand_create','update'             =>'brand_update','delete'            =>'brand_delete'],
            'category'              => ['read' => 'category_read', 'create'      =>'category_create','update'          =>'category_update','delete'         =>'category_delete'],
            'wholesale_product'     => [
                'read'                      => 'wholesale_product_read',
                'create'                    => 'wholesale_product_create',
                'update'                    => 'wholesale_product_update',
                'delete'                    => 'wholesale_product_delete',
                'clone'                     => 'wholesale_product_clone',
                'restore'                   =>'wholesale_product_restore',
                'setting'                   => 'wholesale_product_setting'
            ],

            'customer'              => [
                'read'                      => 'customer_read',
                'create'                    => 'customer_create',
                'update'                    => 'customer_update',
//                'delete'                    => 'customer_delete',
                'ban'                       => 'customer_ban',
                'user_reward_read'          => 'user_reward_read',
                'user_reward_update'        => 'user_reward_update'
            ],
            'seller'                => [
                'read'                      => 'seller_read',
                'create'                    => 'seller_create',
                'update'                    => 'seller_update',
//                'delete'                    => 'seller_delete',
                'verify'                    => 'seller_verify',
                'ban'                       => 'seller_ban',
                'seller_commission_read'    => 'seller_commission_read',
                'seller_commission_update'  => 'seller_commission_update',
                'seller_payout_read'        => 'seller_payout_read',
                'seller_payout_reject'      => 'seller_payout_reject',
                'seller_payout_accept'      => 'seller_payout_accept'
            ],

            'delivery_hero'         => [
                'read'                      => 'delivery_hero_read',
                'create'                    => 'delivery_hero_create',
                'update'                    => 'delivery_hero_update',
//                'delete'                    => 'delivery_hero_delete',
                'Ban Delivery Hero'         => 'delivery_hero_ban',
                'Account Deposit'           => 'Delivery_hero_account_deposit',
                'Email Activation'          => 'delivery_hero_email_activation',
                'Commission History'        => 'delivery_hero_commission_history',
                'Deposit History'           => 'delivery_hero_deposit_history',
                'Collection History'        => 'delivery_hero_collection_history',
                'Cancel Request'            => 'delivery_hero_cancel_request',
                'Configuration Read'        => 'delivery_hero_configuration_read',
                'Configuration Update'      => 'delivery_hero_configuration_update'
            ],

            'media'                 => [
                'read'                      => 'media_read',
                'create'                    =>'media_create',
                'update'                    => 'media_update',
                'delete'                    =>'media_delete'
            ],
            'report'                => [
                'admin_product_sale'        => 'admin_product_sale_read',
                'seller_product_sale'       => 'seller_product_sale_read',
                'product_stock'             => 'product_stock_read',
                'product_wishlist'          =>'product_wishlist_read',
                'user_searches'             => 'user_searches_read',
                'commission_history'        => 'commission_history_read',
                'wallet_recharge_history'   =>'wallet_recharge_history_read'
            ],
            'refund'                => ['read' => 'refund_read','approve' => 'refund_approve', 'process' => 'refund_process', 'reject' => 'refund_reject','refund_setting_read'=> 'refund_setting_read','refund_setting_update' => 'refund_setting_update'],
            'bulk_sms'              => ['read' => 'bulk_sms_read', 'send_sms' => 'send_bulk_sms','otp_setting_read'=> 'otp_setting_read','otp_setting_update'=> 'otp_setting_update','sms_template_read'=> 'sms_template_read','sms_template_update'=> 'sms_template_update'],
            'campaign'              => ['read' => 'campaign_read','create'  => 'campaign_create', 'update'=> 'campaign_update', 'delete'=>'campaign_delete','campaign_request_read'=> 'campaign_request_read','campaign_request_approved'=> 'campaign_request_approved'],
            'campaign_product'      => ['read' => 'campaign_product_read','create'=> 'campaign_product_create','update'=> 'campaign_product_update','delete' => 'campaign_product_delete'],
            'subscriber'            => ['read' => 'subscriber_read','delete'=> 'subscriber_delete' ],
            'coupon'                => ['read' => 'coupon_read', 'create'   => 'coupon_create','update'                 => 'coupon_update', 'delete'            => 'coupon_delete'],
            'blog'                  => ['read' => 'blog_read', 'create'=> 'blog_create', 'update' => 'blog_update', 'delete' => 'blog_delete' ,'restore'  => 'blog_restore'],
            'blog_category'         => ['read' => 'blog_category_read', 'create' => 'blog_category_create', 'update'   => 'blog_category_update', 'delete'   => 'blog_category_delete'],
            'support'               => ['read' => 'support_read','create'        => 'support_create','update'          => 'support_update', 'delete'         => 'support_delete'],
            'support_department'    => ['read' => 'support_department_read', 'create' => 'support_department_create', 'update' => 'support_department_update','delete' => 'support_department_delete'],
            'offline_payment'       => ['read' => 'offline_payment_read','create'=> 'offline_payment_create','update' => 'offline_payment_update','delete'=> 'offline_payment_delete','wallet_recharge_read' => 'wallet_recharge_read','wallet_recharge_update'=> 'wallet_recharge_update'],
            'reward_configuration'  => ['read' => 'reward_configuration_read','update' => 'reward_configuration_update','reward_setting_read' => 'reward_setting_read','reward_setting_create'=> 'reward_setting_create','reward_setting_update'=> 'reward_setting_update'],
            'payment_gateway'       => ['read' => 'payment_gateway_read','update' => 'payment_gateway_update'],
            'shipping_configuration'=> ['read' => 'shipping_configuration_read', 'update' => 'shipping_configuration_update'],
            'shipping_country'      => ['read' => 'country_read', 'update' => 'country_update'],
            'shipping_state'        => ['read' => 'state_read','create' => 'state_create' , 'update' => 'state_update', 'delete' => 'state_delete'],
            'shipping_city'         => ['read' => 'city_read', 'create' => 'city_create' , 'update'  => 'city_update', 'delete'  => 'city_delete'],
            'store_front'           => [
                'theme_option'          => 'theme_option_update',
                'header_content'        => 'header_content_update',
                'footer_content'        => 'footer_content_update',
                'home_page'             => 'home_page_update',
                'website_seo'           => 'website_seo_update',
                'website_popup'         => 'website_popup_update',
                'custom_css'            => 'custom_css_update',
                'custom_js'             => 'custom_js_update',
                'gdpr'                  => 'gdpr_update',
                'all_page_read'         => 'page_read',
                'all_page_create'       => 'page_create',
                'all_page_update'       => 'page_update',
                'all_page_delete'       => 'page_delete'
            ],
            'service'               => [
                'read'                  => 'service_read',
                'create'                => 'service_create',
                'update'                => 'service_update',
                'delete'                => 'service_delete'
            ],
            'slider'                => [
                'read'                  => 'slider_read',
                'create'                => 'slider_create',
                'update'                => 'slider_update',
                'delete'                => 'slider_delete'
            ],
            'wallet'                => [
                'Read'                  => 'recharge_request_read',
                'Status Update'         => 'recharge_request_status_update',

            ],
            'setting'               => [
                'general_setting'       => 'general_setting_update',
                'preference'            => 'preference_setting_update',
                'Social Login'          => 'social_login_setting_update',
                'email_setting'         => 'email_setting_update',
                'currency'              => 'currency_setting_update',
                'vat_tax'               => 'vat_tax_setting_update',
                'storage'               => 'storage_setting_update',
                'cache'                 => 'cache_update',
                'miscellaneous'         => 'miscellaneous_setting_update',
                'Admin Panel Setting Update'    => 'admin_panel_setting_update',
                'Facebook Service'      => 'facebook_service_update',
                'Google Service'        => 'google_service_update',
                'Pusher Notification'   => 'pusher_notification_update'
            ],
            'chat_messenger'        => [
                'read'                  => 'chat_messenger_read',
                'update'                => 'chat_messenger_update'
            ],
            'language'              => [
                'read'                  => 'language_read',
                'create'                => 'language_create',
                'update'                => 'language_update',
                'delete'                => 'language_delete'
            ],
            'staff'                 => [
                'read'                  => 'staff_read',
                'create'                => 'staff_create',
                'update'                => 'staff_update',
//                'delete'                => 'staff_delete',
                'ban'                   => 'staff_ban'
            ],
            'role'                  => [
                'read'                  =>  'role_read',
                'create'                => 'role_create',
                'update'                =>  'role_update',
                'delete'                =>'role_delete'
            ],
            'mobile_apps'           => [
                'setting_update'        => 'api_setting_update',
                'android_setting'       => 'android_setting_update',
                'ios_setting'           => 'ios_setting_update',
                'app_config'            => 'app_config_update',
                'ads_config'            => 'ads_config_update',
                'download_link'         => 'download_link_update'
            ],
            'mobile_app_intro'      => [
                'read'                  => 'mobile_app_intro_read',
                'create'                => 'mobile_app_intro_create',
                'update'                => 'mobile_app_intro_update',
                'delete'                =>'mobile_app_intro_delete'
            ],

            'Video Shopping'        => [
                'read'                  => 'video_shopping_read',
                'create'                => 'video_shopping_create',
                'update'                => 'video_shopping_update',
                'delete'                => 'video_shopping_delete'
            ],
            'pos_system'        => [
                'read'                  => 'pos_order',
                'update'                => 'pos_config_update',
            ],

        ];

        foreach($attributes as $key => $attribute){
            $permission               = new Permission();
            $permission->attribute    = $key;
            $permission->keywords     = $attribute;
            $permission->save();
        }

    }
}

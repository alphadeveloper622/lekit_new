<?php

namespace Database\Seeders\Admin;

use App\Models\Page;
use App\Models\PageLanguage;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Page::create(['type'=> 'home_page','slug' => 'home_page','link' => 'https://onno.spagreen.net/demo/']);
        Page::create(['type'=> 'seller_policy_pages','link' => 'seller-policy']);
        Page::create(['type'=> 'refund_policy_page','link' => 'refund-policy']);
        Page::create(['type'=> 'support_policy_page','link' => 'support-policy']);
        Page::create(['type'=> 'term_conditions_page','link' => 'terms-conditions']);
        Page::create(['type'=> 'privacy_policy_page','link' => 'privacy-policy']);
        Page::create(['type'=> 'about_us_page','link' => 'about']);
        Page::create(['type'=> 'contact_us_page','link' => 'contact','email' => 'almahmud400188@gmail.com','optional_email' => 'almahmud400188@gmail.com','phone' => '+01264479846646','optional_phone' => '+01264479846646']);

//        PageLanguage::create(['page_id'=> 1,'lang' => 'en','title' => 'Home Page']);
        PageLanguage::create(['page_id'=> 1,'lang' => 'en','title' => 'Seller Policy']);
        PageLanguage::create(['page_id'=> 2,'lang' => 'en','title' => 'Refund Policy']);
        PageLanguage::create(['page_id'=> 3,'lang' => 'en','title' => 'Support Policy']);
        PageLanguage::create(['page_id'=> 4,'lang' => 'en','title' => 'Term and Conditions']);
        PageLanguage::create(['page_id'=> 5,'lang' => 'en','title' => 'Privacy Policy']);
        PageLanguage::create(['page_id'=> 6,'lang' => 'en','title' => 'About Us']);
        PageLanguage::create(['page_id'=> 7,'lang' => 'en','title' => 'Contact Us','address' => 'Concord lake city,Khilkhet,Dhaka']);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\CouponLanguage;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create(['user_id' => '1','banner_id' => '1','type' => 'product_base', 'code' => 'aut579']);
        Coupon::create(['user_id' => '2','banner_id' => '2','type' => 'product_base', 'code' => 'soluta-et515']);
        Coupon::create(['user_id' => '3','banner_id' => '3','type' => 'product_base', 'code' => 'aliquid-incidunt585']);
        Coupon::create(['user_id' => '4','banner_id' => '4','type' => 'product_base', 'code' => 'numquam-inventore532']);
        Coupon::create(['user_id' => '5','banner_id' => '5','type' => 'product_base', 'code' => 'aut579']);

        CouponLanguage::create([ 'coupon_id' => '1','title' => 'aut579','lang'=>'en']);
        CouponLanguage::create([ 'coupon_id' => '2','title' => 'aut579','lang'=>'en']);
        CouponLanguage::create([ 'coupon_id' => '3','title' => 'aut579','lang'=>'en']);
        CouponLanguage::create([ 'coupon_id' => '4','title' => 'aut579','lang'=>'en']);
        CouponLanguage::create([ 'coupon_id' => '5','title' => 'aut579','lang'=>'en']);
    }
}

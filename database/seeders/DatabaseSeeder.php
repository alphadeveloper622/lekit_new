<?php

namespace Database\Seeders;

use App\Models\DeliveryHero;
use App\Models\Product;
use App\Models\Reward;
use App\Models\Search;
use App\Models\Address;
use App\Models\Support;
use App\Models\Wishlist;
use App\Models\PickupHub;
use App\Models\Subscriber;
use App\Models\TicketReplay;
use App\Models\RewardDetails;
use App\Models\SellerProfile;
use Database\Seeders\Admin\BlogSeeder;
use Database\Seeders\Product\ProductLanguageSeeder;
use Database\Seeders\Product\ProductSeeder;
use Database\Seeders\Product\ProductStockSeeder;
use Illuminate\Database\Seeder;
use App\Models\PickupHubLanguage;
use Illuminate\Support\Facades\Cache;
use Database\Seeders\Admin\StoreFront;
use Database\Seeders\Admin\BrandSeeder;
use Database\Seeders\Admin\ColorSeeder;
use Database\Seeders\Admin\PageSeeder;
use Database\Seeders\Admin\CategorySeeder;
use Database\Seeders\Admin\CurrencySeeder;
use Database\Seeders\Admin\FlagIconSeeder;
use Database\Seeders\Admin\SupportDepartmentSeeder;
use Database\Seeders\Admin\LanguageSeeder;
use Database\Seeders\Admin\SettingsSeeder;
use Database\Seeders\Admin\TimeZoneSeeder;
use Database\Seeders\Admin\AttributeSeeder;
use Database\Seeders\Admin\BlogCategorySeeder;
use Database\Seeders\Admin\LanguageConfigSeeder;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Database\Seeders\Admin\Addon\OtpSmsTemplateSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Cache::flush();
        $this->call(PermissionSeeder::class);
//        $this->call(ImageSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(LanguageConfigSeeder::class);
        $this->call(FlagIconSeeder::class);
        $this->call(TimeZoneSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(StoreFront::class);
//        $this->call(ColorSeeder::class);
      //  $this->call(AttributeSeeder::class);
      //  $this->call(BrandSeeder::class);
//        $this->call(CategorySeeder::class);
//        $this->call(BlogCategorySeeder::class);
//        $this->call(SupportDepartmentSeeder::class);
        $this->call(PageSeeder::class);
//        $this->call(CouponSeeder::class);
//        $this->call(SliderSeeder::class);
//        $this->call(ServiceSeeder::class);
//        $this->call(ServiceLanuageSeeder::class);
//        $this->call(CampaignSeeder::class);
//        $this->call(SellerSeed::class);
//        $this->call(ProductSeeder::class);
//        $this->call(ProductLanguageSeeder::class);
//        $this->call(BlogSeeder::class);
//        $this->call(BlogLanguageSeeder::class);
//        $this->call(ProductStockSeeder::class);
//        $this->call(AddonSeeder::class);
        //factory
//        Subscriber::factory(20)->create();
//        Address::factory(20)->create();

//        $users = \App\Models\User::factory(30)->create();
//        foreach ($users as $user) {
//            if($user->user_type == 'seller'){
//                SellerProfile::factory(1)->create(['user_id' => $user->id])->first();
//                $support = Support::factory(5)->create(['user_id' => $user->id])->first();
//                TicketReplay::factory(10)->create(['support_id' => $support->id]);
//
//            }
//            if($user->user_type == 'customer'){
//
//                $product = Product::latest()->first();
//                if(!blank($product)):
////                    Order::factory(1)->create(['user_id' => $user->id,'seller_id' => $product->user_id])->first();
//
//
//                    $reward = Reward::factory(2)->create(['user_id' => $user->id])->first();
//                    RewardDetails::factory(1)->create(['product_id' => $product->id,'reward_id' => $reward->id]);
//                    Wishlist::factory(1)->create(['product_id' => $product->id]);
//
////                    Refund::factory(1)->create(['order_id' => $order->id,'seller_id' => $seller->id, 'user_id' => $user->id]);
//                endif;
//            }
//
//            if($user->user_type == 'delivery_hero'){
//                DeliveryHero::factory()->create(['user_id' => $user->id]);
//            }
//
//            $activation = Activation::create($user);
//            Activation::complete($user, $activation->code);
//        }

//        Coupon::factory(1)->create();
//        Blog::factory(10)->create();
//        PickupHub::factory(3)->create();
//        PickupHubLanguage::factory(3)->create();

//        Search::factory(5)->create();

//        CommissionHistory::factory(10)->create();

        //addon
//        $this->call(OtpSmsTemplateSeeder::class);
        $this->call(CountrySeeder::class);
//        $this->call(StateSeeder::class);
//        $this->call(CitySeeder::class);

    }
}

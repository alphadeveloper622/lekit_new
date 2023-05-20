<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'brand_id'                              => Brand::inRandomOrder()->first()->id,
            'category_id'                           => Category::inRandomOrder()->first()->id,
//            'user_id'                             => User::inRandomOrder()->first()->id,
            'created_by'                            => 1,
            'slug'                                  => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'price'                                 => rand(1000,100000),
            'special_discount'                      => rand(10,500),
            'special_discount_type'                 => $this->faker->randomElement(['Flat','Percentage']),
//          'special_discount_start'                => Carbon::now(),
//          'special_discount_end'                  => Carbon::now(),
            'purchase_cost'                         => rand(1000,100000),
            'barcode'                               => rand(500000,8000000),
            'video_provider'                        => $this->faker->randomElement(['Youtube','Vimeo','Mp4']),
            'video_url'                             => $this->faker->randomElement(['https://www.facebook.com/almahmud.dev','https://www.facebook.com/tayeb320','https://www.facebook.com/zahidhassanshaikot']),
//            'colors'                                => json_encode($this->faker->randomElement(['["2"]','["3"]'])) ,
//            'attribute_sets'                        => json_enecode(['["2"]']),
            'has_variant'                           => 1,
//            'selected_variants'                     => json_encode(['{"2":["6","7"]}']),
//            'images'                                => json_encode(['[{"storage":"local","original_image":"images\/20211219121858_original__media_47.jpg","image_40x40":"images\/20211219121858image_small_one_media_1.jpg","image_72x72":"images\/20211219121858image_small_two_media_15.jpg","image_128x128":"images\/20211219121858image_small_three_media_34.jpg","image_thumbnail":"images\/20211219121858image_thumbnail_media_4.jpg"}]']),
//            'thumbnail'                             => json_encode(['{"storage":"local","original_image":"images\/20211219121942_original__media_2.jpg","image_40x40":"images\/20211219121942image_small_one_media_29.jpg","image_72x72":"images\/20211219121942image_small_two_media_19.jpg","image_128x128":"images\/20211219121942image_small_three_media_29.jpg","image_thumbnail":"images\/20211219121942image_thumbnail_media_30.jpg"}']),
//            'thumbnail_id'                          => 16,
//            'image_ids'                             => 14,
            'current_stock'                         => rand(10,5000),
            'minimum_order_quantity'                => rand(1,10),
            'stock_notification'                    => rand(0,1),
            'low_stock_to_notify'                   => rand(10,50),
            'total_sale'                            => rand(10,1000),
            'is_featured'                           => rand(0,1),
//            'is_catalog'                            => rand(0,1),
            'external_link'                         => '',
            'is_classified'                         => 0,
            'is_wholesale'                          => rand(0,1),
            'is_digital'                            => rand(0,1),
            'todays_deal'                           => rand(0,1),
            'is_refundable'                         => rand(0,1),
            'cash_on_delivery'                      => rand(0,1),
            'rating'                                => $this->faker->randomFloat($nbMaxDecimals = 10, $min = 0, $max = 10),
            'viewed'                                => rand(0,10000),
            'shipping_type'                         => $this->faker->randomElement(["Product Base","Flat Rate","Seller Base","Area Base"]),
            'shipping_fee'                          => rand(0,500),
            'shipping_fee_depend_on_quantity'       => rand(0,1),
            'estimated_shipping_days'               => rand(0,50),
            'meta_image'                            => '',
            'reward'                                => rand(0,100),




        ];
    }
}
